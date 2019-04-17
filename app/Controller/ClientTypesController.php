<?php
App::uses('AppController', 'Controller');
/**
 * ClientTypes Controller
 *
 * @property ClientType $ClientType
 * @property PaginatorComponent $Paginator
 * @property AclComponent $Acl
 * @property RequestHandlerComponent $RequestHandler
 * @property SessionComponent $Session
 */
class ClientTypesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Acl', 'RequestHandler', 'Session');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->ClientType->recursive = 0;
		$this->set('clientTypes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ClientType->exists($id)) {
			throw new NotFoundException(__('Invalid client type'));
		}
		$options = array('conditions' => array('ClientType.' . $this->ClientType->primaryKey => $id));
		$this->set('clientType', $this->ClientType->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ClientType->create();
			if ($this->ClientType->save($this->request->data)) {
				$this->Session->setFlash(__('The client type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The client type could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->ClientType->exists($id)) {
			throw new NotFoundException(__('Invalid client type'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ClientType->save($this->request->data)) {
				$this->Session->setFlash(__('The client type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The client type could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ClientType.' . $this->ClientType->primaryKey => $id));
			$this->request->data = $this->ClientType->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->ClientType->id = $id;
		if (!$this->ClientType->exists()) {
			throw new NotFoundException(__('Invalid client type'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->ClientType->delete()) {
			$this->Session->setFlash(__('The client type has been deleted.'));
		} else {
			$this->Session->setFlash(__('The client type could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
