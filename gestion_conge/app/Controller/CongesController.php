<?php
class CongesController extends AppController
{
    public $helpers = array('Html', 'Form');
    public $components = array('Session');


    public function home()
    {
        // Fetch the list of users
        $this->loadModel('User');
        $this->loadModel('Certificat');
        $users = $this->User->find('all');
        $userCount = $this->User->find('count'); // Count the number of users
        
      


        $conges = $this->Conge->find('all');
        $congesCount = $this->Conge->find('count'); // Count the number of users

        $certificats = $this->Certificat->find('all');
        $certificatsCount = $this->Certificat->find('count'); // Count the number of users

          // Pass both the list of users and the user count to the view
          $this->set(compact('users', 'userCount','congesCount','certificatsCount')); // Corrected here


    }

    public function index() {
        $this->Conge->recursive = 0;
    
        // Initialize the conditions array
        $conditions = array();
    
        // Check if a search term is provided
        if ($this->request->is('post') || $this->request->is('get')) {
            $searchImmatriculation = $this->request->query('search_immatriculation');
            if (!empty($searchImmatriculation)) {
                $this->Conge->bindModel(array(
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
    $conges = $this->Paginator->paginate('Conge');
     // Parcourir les congés pour calculer les jours restants
     foreach ($conges as &$conge) {
        $conge['Conge']['days_remaining'] = $this->Conge->calculateDaysRemaining($conge['Conge']['date_fin']);
    }

    $this->set('conges', $conges);

    }

    public function viewLast($id = null)
    {
        $this->Conge->recursive = 0;
        $this->Conge->unbindModel(array('belongsTo' => array('User')));
        $this->Conge->bindModel(array(
            'belongsTo' => array(
                'User' => array(
                    'className' => 'User',
                    'foreignKey' => 'user_id',
                    'fields' => array('User.id', 'User.name')
                )
            )
        ));
        if (!$id) {
            throw new NotFoundException(__('Invalid conge'));
        }

        $conge = $this->Conge->findById($id);
        if (!$conge) {
            throw new NotFoundException(__('Invalid conge'));
        }
        $this->set('conge', $conge);
    }


    public function view($id = null) {
        $this->loadModel('Conge');
        $this->Conge->recursive = 0;
        $this->Conge->unbindModel(array('belongsTo' => array('User')));
        $this->Conge->bindModel(array(
            'belongsTo' => array(
                'User' => array(
                    'className' => 'User',
                    'foreignKey' => 'user_id',
                    'fields' => array('User.id', 'User.name')
                )
            )
        ));
        if (!$id) {
            throw new NotFoundException(__('Invalid conge'));
        }
        // Trouver les informations de l'utilisateur en fonction du congé sélectionné
        if (!$this->Conge->exists($id)) {
            throw new NotFoundException(__('Congé invalide'));
        }

        // Récupérer le congé spécifié
        $conge = $this->Conge->findById($id);

        // Récupérer tous les congés associés à cet utilisateur
        $userId = $conge['Conge']['user_id'];
        $conges = $this->Conge->find('all', array(
            'conditions' => array('Conge.user_id' => $userId),
            'order' => array('Conge.date_debut' => 'ASC')
        ));

        $this->set(compact('conge', 'conges'));
    }


    public function add()
    {
        // Fetch the list of users
        $this->loadModel('User');
        $users = $this->User->find('list', array(
            'fields' => array('User.id', 'User.name')
        ));
        $this->set(compact('users'));
        if ($this->request->is('post')) {
            $this->Conge->create();
            if ($this->Conge->save($this->request->data)) {
                $this->Session->setFlash(__('le congé est enregistré.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__("Incapable d'enregistrer ce congé"));
        }
    }

    public function edit($id = null)
    {
        // Fetch the list of users
        $this->loadModel('User');
        $users = $this->User->find('list', array(
            'fields' => array('User.id', 'User.name')
        ));
        $this->set(compact('users'));
        if (!$id) {
            throw new NotFoundException(__('Invalid conge'));
        }

        $conge = $this->Conge->findById($id);
        if (!$conge) {
            throw new NotFoundException(__('Invalid conge'));
        }

        if ($this->request->is(array('post', 'put'))) {
            $this->Conge->id = $id;
            if ($this->Conge->save($this->request->data)) {
                $this->Session->setFlash(__('Le congé a été modifié.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Incapable de modifier le congé.'));
        }

        if (!$this->request->data) {
            $this->request->data = $conge;
        }
    }

    public function delete($id)
    {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        $this->Conge->recursive = 0;
        $this->Conge->unbindModel(array('belongsTo' => array('User')));
        $this->Conge->bindModel(array(
            'belongsTo' => array(
                'User' => array(
                    'className' => 'User',
                    'foreignKey' => 'user_id',
                    'fields' => array('User.id', 'User.name')
                )
            )
        ));
        if (!$id) {
            throw new NotFoundException(__('Invalid conge'));
        }

        $conge = $this->Conge->findById($id);

        if ($this->Conge->delete($id)) {
            $this->Session->setFlash(__('Le congé de: %s est supprimé.', h($conge['User']['name'])));
            return $this->redirect(array('action' => 'index'));
        }
    }

    public function search()
    {

        $this->Conge->recursive = 0;

        // Initialize the conditions array
        $conditions = array();

        // Check if a search term is provided
        if ($this->request->is('post') || $this->request->is('get')) {
            $searchImmatriculation = $this->request->query('search_immatriculation');
            // Supprimer les espaces de début et de fin
            $searchImmatriculation = trim($searchImmatriculation);
            if (!empty($searchImmatriculation)) {
                $this->Conge->bindModel(array(
                    'belongsTo' => array(
                        'User' => array(
                            'className' => 'User',
                            'foreignKey' => 'user_id',
                            'fields' => array('User.id', 'User.name', 'User.Immatriculation')
                        )
                    )
                ));
                $conditions['User.Immatriculation LIKE'] = '%' . $searchImmatriculation . '%';
            }
        }

        $conges = $this->Conge->find('all', array('conditions' => $conditions));
        $this->set('conges', $conges);
    }
}
