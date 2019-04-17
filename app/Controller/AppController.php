<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

 App::uses('Controller', 'Controller');
 App::uses('CakeEmail', 'Network/Email');

 App::uses('File', 'Utility');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
    	
// added the debug toolkit
// sessions support
// authorization for login and logut redirect
var $helpers = array('Form', 'Html', 'Session', 'Js', 'Usermgmt.UserAuth');
public $components = array('Session','RequestHandler', 'Usermgmt.UserAuth');
/* 
public $components = array(
    //'DebugKit.Toolbar',
    'Session','RequestHandler', 'Usermgmt.UserAuth',
    'Auth' => array(
        'loginRedirect' => array('controller' => 'Users', 'action' => 'dashboard'),
        'loginAction' => array('controller' => 'users', 'action' => 'login'),
        'authError' => 'You must be logged in to view this page.',
        'loginError' => 'Invalid Username or Password entered, please try again.',
     'authenticate' => array(
            'Form' => array(
                'fields' => array(
                  'username' => 'email', //Default is 'username' in the userModel
                  'password' => 'password'  //Default is 'password' in the userModel
                )
            )
        )
    )
   );
   */
	
	// only allow the login controllers only
	/*
        public function beforeFilter() {
            $this->Auth->allow('login');
         }
         
         */
	
	
        function beforeFilter(){
			$this->userAuth();
                      
		}
	private function userAuth(){
			$this->UserAuth->beforeFilter($this);
		}
	public function isAuthorized($user) {
		// Here is where we should verify the role and give access based on role
		
		return true;
	}
       
}