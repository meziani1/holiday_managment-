<?php
class UsersController extends AppController
{
    public $name = "Users";
    


    public function beforeFilter()
{
    parent::beforeFilter();
    $this->loadModel('User'); // Ensure the User model is loaded

    $this->Auth->allow('login','add'); // Allow unauthenticated users to access the login action

   
}

public function login()
{
    $this->layout = 'default';
    if ($this->request->is('post')) {
        // Attempt to login the user
        if ($this->Auth->login()) {
            // Redirect to the user's dashboard or desired page after login
            return $this->redirect($this->Auth->redirectUrl());
        } else {
            // Display an error message
            $this->Session->setFlash(__('Invalid username or password, try again.'));
        }
    }
}

public function logout() {
    // debug($this->Auth->logout());
     return $this->redirect($this->Auth->logout());
 }



    public function index()
    {
          // Configure pagination settings
          $this->Paginator->settings = array(
            'limit' => 10, // Number of records per 
            'order' => array('User.created' => 'desc') // Sorting order
        );

        // Fetch paginated posts
        $users = $this->Paginator->paginate('User');
        $this->set("users", $users);
    }

    public function view($id = null)
    {

        if (!$id) {
            throw new NotFoundException(__('Employé invalide'));
        }
        $user = $this->User->findById($id);
        if (!$user) {
            throw new NotFoundException(__('Employé non trouvé'));
        }
        $this->set('user', $user);

    }
    public function add() {
        if ($this->request->is('post')) {
            
    
            $this->User->create(); // Create a new User record
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__("Employé enregistré "));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__("Impossible d'enregistrer l'employé"));
        }
    }

    public function edit($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid user'));
        }
    
        // Fetch the user data by ID
        $user = $this->User->findById($id);
        if (!$user) {
            throw new NotFoundException(__('Invalid user'));
        }
    
        // Check if the form is submitted (POST or PUT request)
        if ($this->request->is(array('post', 'put'))) {
            $this->User->id = $id; // Set the user ID to be updated
            
            // Attempt to save the updated user data
            if ($this->User->save($this->request->data)) {
        
                $this->Session->setFlash(__('The user has been updated.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(__('Unable to update the user.'));
        }
    
        // Set the current user data to prefill the form fields
        if (!$this->request->data) {
            $this->request->data = $user;
        }
    
        // Pass the user data to the view
        $this->set('user', $user);
    }
    

    public function delete($id = null)
    {
        // Allow only POST requests to delete
        //$this->request->onlyAllow('post');

        if (!$id) {
            throw new NotFoundException(__('Employé invalide'));
        }

        if ($this->User->delete($id)) {
            $this->Session->setFlash(__('Employé supprimé'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__("l'employé n'a pas été supprimé"));
        return $this->redirect(array('action' => 'index'));
    }
}
?>
