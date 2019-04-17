<?php
App::uses('AppController', 'Controller');
/**
 * UserGroupPermissions Controller
 *
 * @property UserGroupPermission $UserGroupPermission
 */
class UserGroupPermissionsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->UserGroupPermission->recursive = 0;
		$this->set('userGroupPermissions', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->UserGroupPermission->id = $id;
		if (!$this->UserGroupPermission->exists()) {
			throw new NotFoundException(__('Invalid user group permission'));
		}
		$this->set('userGroupPermission', $this->UserGroupPermission->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->UserGroupPermission->create();
			if ($this->UserGroupPermission->save($this->request->data)) {
				$this->Session->setFlash(__('The user group permission has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user group permission could not be saved. Please, try again.'));
			}
		}
		$userGroups = $this->UserGroupPermission->UserGroup->find('list');
		$this->set(compact('userGroups'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->UserGroupPermission->id = $id;
		if (!$this->UserGroupPermission->exists()) {
			throw new NotFoundException(__('Invalid user group permission'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->UserGroupPermission->save($this->request->data)) {
				$this->Session->setFlash(__('The user group permission has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user group permission could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->UserGroupPermission->read(null, $id);
		}
		$userGroups = $this->UserGroupPermission->UserGroup->find('list');
		$this->set(compact('userGroups'));
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
		$this->UserGroupPermission->id = $id;
		if (!$this->UserGroupPermission->exists()) {
			throw new NotFoundException(__('Invalid user group permission'));
		}
		if ($this->UserGroupPermission->delete()) {
			$this->Session->setFlash(__('User group permission deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('User group permission was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
