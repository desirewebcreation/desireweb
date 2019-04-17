<?php
App::uses('AppController', 'Controller');
/**
 * MasterDocs Controller
 *
 * @property MasterDoc $MasterDoc
 * @property PaginatorComponent $Paginator
 * @property AclComponent $Acl
 * @property SecurityComponent $Security
 * @property RequestHandlerComponent $RequestHandler
 * @property PaginationComponent $Pagination
 * @property SessionComponent $Session
 */
class MasterDocsController extends AppController {

/**
 * Helpers
 *
 * @var array
 */
	//public $helpers = array('Js');

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Acl', 'Security', 'RequestHandler', 'Session');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->MasterDoc->recursive = 0;
		$this->set('masterDocs', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->MasterDoc->exists($id)) {
			throw new NotFoundException(__('Invalid master doc'));
		}
		$options = array('conditions' => array('MasterDoc.' . $this->MasterDoc->primaryKey => $id));
		$this->set('masterDoc', $this->MasterDoc->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	/**
 /**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->MasterDoc->create();
			if ($this->MasterDoc->save($this->request->data)) {
				$this->Session->setFlash(__('The master doc has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The master doc could not be saved. Please, try again.'));
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
		if (!$this->MasterDoc->exists($id)) {
			throw new NotFoundException(__('Invalid master doc'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->MasterDoc->save($this->request->data)) {
				$this->Session->setFlash(__('The master doc has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The master doc could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('MasterDoc.' . $this->MasterDoc->primaryKey => $id));
			$this->request->data = $this->MasterDoc->find('first', $options);
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
		$this->MasterDoc->id = $id;
		if (!$this->MasterDoc->exists()) {
			throw new NotFoundException(__('Invalid master doc'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->MasterDoc->delete()) {
			$this->Session->setFlash(__('The master doc has been deleted.'));
		} else {
			$this->Session->setFlash(__('The master doc could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
