<?php
App::uses('AppController', 'Controller');
/**
 * Reqs Controller
 *
 * @property Req $Req
 * @property PaginatorComponent $Paginator
 */
class ReqsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Req->recursive = 0;
		$this->set('reqs', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Req->exists($id)) {
			throw new NotFoundException(__('Invalid Req'));
		}
		$options = array('conditions' => array('Req.' . $this->Req->primaryKey => $id));
		$this->set('req', $this->Req->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Req->create();
			if ($this->Req->save($this->request->data)) {
				$this->Session->setFlash(__('The Req has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Req could not be saved. Please, try again.'));
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
		if (!$this->Req->exists($id)) {
			throw new NotFoundException(__('Invalid Req'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Req->save($this->request->data)) {
				$this->Session->setFlash(__('The Req has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Req could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Req.' . $this->Req->primaryKey => $id));
			$this->request->data = $this->Req->find('first', $options);
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
		$this->Req->id = $id;
		if (!$this->Req->exists()) {
			throw new NotFoundException(__('Invalid Req'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Req->delete()) {
			$this->Session->setFlash(__('The Req has been deleted.'));
		} else {
			$this->Session->setFlash(__('The Req could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
