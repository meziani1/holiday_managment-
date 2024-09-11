<?php
class CertificatsController extends AppController {
    public $helpers = array('Html', 'Form');
    public $components = array('Session');

    public function index() {
        $this->Certificat->recursive = 0;
    
        // Initialize the conditions array
        $conditions = array();
    
        // Check if a search term is provided
        if ($this->request->is('post') || $this->request->is('get')) {
            $searchImmatriculation = $this->request->query('search_immatriculation');
            if (!empty($searchImmatriculation)) {
                $this->Certificat->bindModel(array(
                    'belongsTo' => array(
                        'User' => array(
                            'className' => 'User',
                            'foreignKey' => 'user_id',
                            'fields' => array('User.id', 'User.name', 'User.Immatriculation')
                        )
                    )
                ));
                $conditions['User.Immatriculation'] = $searchImmatriculation;

            }
        }
    
        // Set up the pagination settings
    $this->Paginator->settings = array(
        'conditions' => $conditions,
        'limit' => 10,  // Number of records per page
        'order' => array('Certificat.id' => 'desc') // Adjust the order as needed
    );

    // Use the Paginator to get paginated results
    $certificats = $this->Paginator->paginate('Certificat');
     // Parcourir les congés pour calculer les jours restants
     foreach ($certificats as &$certificat) {
        $certificat['Certificat']['days_remaining'] = $this->Certificat->calculateDaysRemaining($certificat['Certificat']['date_fin']);
    }
    $this->set('certificats', $certificats);

    }
    
    
   public function viewLast($id = null) {
        $this->Certificat->recursive = 0;
        $this->Certificat->unbindModel(array('belongsTo' => array('User')));
        $this->Certificat->bindModel(array(
            'belongsTo' => array(
                'User' => array(
                    'className' => 'User',
                    'foreignKey' => 'user_id',
                    'fields' => array('User.id', 'User.name')
                )
            )
        ));
        if (!$id) {
            throw new NotFoundException(__('Invalid certificat'));
        }

        $certificat = $this->Certificat->findById($id);
        if (!$certificat) {
            throw new NotFoundException(__('Invalid certificat'));
        }
        $this->set('certificat', $certificat);
    }

    public function view($id = null) {
        $this->loadModel('Certificat');
        $this->Certificat->recursive = 0;
        $this->Certificat->unbindModel(array('belongsTo' => array('User')));
        $this->Certificat->bindModel(array(
            'belongsTo' => array(
                'User' => array(
                    'className' => 'User',
                    'foreignKey' => 'user_id',
                    'fields' => array('User.id', 'User.name')
                )
            )
        ));
        if (!$id) {
            throw new NotFoundException(__('Invalid Certificat'));
        }
        // Trouver les informations de l'utilisateur en fonction du congé sélectionné
        if (!$this->Certificat->exists($id)) {
            throw new NotFoundException(__('CCertificat invalide'));
        }

        // Récupérer le congé spécifié
        $certificat = $this->Certificat->findById($id);

        // Récupérer tous les congés associés à cet utilisateur
        $userId = $certificat['Certificat']['user_id'];
        $certificats = $this->Certificat->find('all', array(
            'conditions' => array('Certificat.user_id' => $userId),
            'order' => array('Certificat.date_debut' => 'ASC')
        ));

        $this->set(compact('certificat', 'certificats'));
    }

    public function add() {
         // Fetch the list of users
    $this->loadModel('User');
    $users = $this->User->find('list', array(
        'fields' => array('User.id', 'User.name')
    ));
    $this->set(compact('users'));
        if ($this->request->is('post')) {
            $this->Certificat->create();
            if ($this->Certificat->save($this->request->data)) {
                $this->Session->setFlash(__("l'opération est enregistré."));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__("Incapable d'enregistrer cette opération"));
        }
    }

    public function edit($id = null) {
        // Fetch the list of users
    $this->loadModel('User');
    $users = $this->User->find('list', array(
        'fields' => array('User.id', 'User.name')
    ));
    $this->set(compact('users'));
        if (!$id) {
            throw new NotFoundException(__('Invalid certificat'));
        }

        $certificat = $this->Certificat->findById($id);
        if (!$certificat) {
            throw new NotFoundException(__('Invalid certificat'));
        }

        if ($this->request->is(array('post', 'put'))) {
            $this->Certificat->id = $id;
            if ($this->Certificat->save($this->request->data)) {
                $this->Session->setFlash(__(' certificat médical a été modifié.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Incapable de modifier le certificat médical.'));
        }

        if (!$this->request->data) {
            $this->request->data = $certificat;
        }
    }

    public function delete($id) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        $this->Certificat->recursive = 0;
        $this->Certificat->unbindModel(array('belongsTo' => array('User')));
        $this->Certificat->bindModel(array(
            'belongsTo' => array(
                'User' => array(
                    'className' => 'User',
                    'foreignKey' => 'user_id',
                    'fields' => array('User.id', 'User.name')
                )
            )
        ));
        if (!$id) {
            throw new NotFoundException(__('Invalid certificat'));
        }

        $certificat = $this->Certificat->findById($id);

        if ($this->Certificat->delete($id)) {
            $this->Session->setFlash(__('Le certificat de: %s est supprimé.', h($certificat['User']['name'])));
            return $this->redirect(array('action' => 'index'));
        }
    }
}
?>
