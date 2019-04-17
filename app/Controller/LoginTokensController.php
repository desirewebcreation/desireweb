<?php
App::uses('AppController', 'Controller');
/**
 * LoginTokens Controller
 *
 * @property LoginToken $LoginToken
 */
class LoginTokensController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->LoginToken->recursive = 0;
		$this->set('loginTokens', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->LoginToken->id = $id;
		if (!$this->LoginToken->exists()) {
			throw new NotFoundException(__('Invalid login token'));
		}
		$this->set('loginToken', $this->LoginToken->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->LoginToken->create();
			if ($this->LoginToken->save($this->request->data)) {
				$this->Session->setFlash(__('The login token has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The login token could not be saved. Please, try again.'));
			}
		}
		$users = $this->LoginToken->User->find('list');
		$this->set(compact('users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->LoginToken->id = $id;
		if (!$this->LoginToken->exists()) {
			throw new NotFoundException(__('Invalid login token'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->LoginToken->save($this->request->data)) {
				$this->Session->setFlash(__('The login token has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The login token could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->LoginToken->read(null, $id);
		}
		$users = $this->LoginToken->User->find('list');
		$this->set(compact('users'));
	}

/**
 * delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->LoginToken->id = $id;
		if (!$this->LoginToken->exists()) {
			throw new NotFoundException(__('Invalid login token'));
		}
		if ($this->LoginToken->delete()) {
			$this->Session->setFlash(__('Login token deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Login token was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
