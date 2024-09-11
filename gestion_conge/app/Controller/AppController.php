<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		https://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
   
    public $layout = 'adminlte';

    public $components = array('DebugKit.Toolbar',
        'Session',
        'Paginator',
        'Auth' => array(
            'authenticate' => array(
                'Form' => array(
                    'userModel' => 'User',
                    'fields' => array('username' => 'name', 'password' => 'password')
                )
            ),
            'loginAction' => array('controller' => 'users', 'action' => 'login'),
            'logoutRedirect' => array('controller' => 'users', 'action' => 'login'),
            'loginRedirect' => array('controller' => 'conges', 'action' => 'home'),
            'unauthorizedRedirect' => array('controller' => 'users', 'action' => 'login'),
            'authError' => 'Did you really think you are allowed to see that?',
            'flash' => array(
                'element' => 'default',
                'key' => 'auth',
                'params' => array()
            )
        )
    );

    public function beforeFilter() {
        parent::beforeFilter();

        // Récupérer les informations de l'utilisateur authentifié
        $user = $this->Auth->user();

        // Vérifier si l'utilisateur est authentifié et définir la variable pour la vue
        if ($user) {
            $this->set('authUser', $user);
        }
    }
    

    
}
