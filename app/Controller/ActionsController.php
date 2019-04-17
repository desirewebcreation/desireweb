<?php
App::uses('AppController', 'Controller');
/**
 * Sources Controller
 *
 * @property Source $Source
 * @property PaginatorComponent $Paginator
 */
class ActionsController extends AppController {

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
		$this->Action->recursive = 0;
		$this->set('actions', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Source->exists($id)) {
			throw new NotFoundException(__('Invalid source'));
		}
		$options = array('conditions' => array('Action.' . $this->Source->primaryKey => $id));
		$this->set('action', $this->Action->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Action->create();
			if ($this->Action->save($this->request->data)) {
				$this->Session->setFlash(__('The Action has been added.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The action could not be added. Please, try again.'));
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
		if (!$this->Action->exists($id)) {
			throw new NotFoundException(__('Invalid source'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Action->save($this->request->data)) {
				$this->Session->setFlash(__('The Action has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Action could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Action.' . $this->Action->primaryKey => $id));
			$this->request->data = $this->Action->find('first', $options);
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
		$this->Action->id = $id;
		if (!$this->Action->exists()) {
			throw new NotFoundException(__('Invalid action'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Action->delete()) {
			$this->Session->setFlash(__('The action has been deleted.'));
		} else {
			$this->Session->setFlash(__('The action could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
