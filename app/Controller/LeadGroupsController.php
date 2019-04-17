<?php
App::uses('AppController', 'Controller');
/**
 * LeadGroups Controller
 *
 * @property LeadGroup $LeadGroup
 * @property PaginatorComponent $Paginator
 */
class LeadGroupsController extends AppController {

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
		$this->LeadGroup->recursive = 0;
		$this->set('leadGroups', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->LeadGroup->exists($id)) {
			throw new NotFoundException(__('Invalid project type'));
		}
		$options = array('conditions' => array('LeadGroup.' . $this->LeadGroup->primaryKey => $id));
		$this->set('LeadGroup', $this->LeadGroup->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->LeadGroup->create();
			if ($this->LeadGroup->save($this->request->data)) {
				$this->Session->setFlash(__('The project type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The project type could not be saved. Please, try again.'));
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
		if (!$this->LeadGroup->exists($id)) {
			throw new NotFoundException(__('Invalid project type'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->LeadGroup->save($this->request->data)) {
				$this->Session->setFlash(__('The project type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The project type could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('LeadGroup.' . $this->LeadGroup->primaryKey => $id));
			$this->request->data = $this->LeadGroup->find('first', $options);
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
		$this->LeadGroup->id = $id;
		if (!$this->LeadGroup->exists()) {
			throw new NotFoundException(__('Invalid project type'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->LeadGroup->delete()) {
			$this->Session->setFlash(__('The project type has been deleted.'));
		} else {
			$this->Session->setFlash(__('The project type could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
