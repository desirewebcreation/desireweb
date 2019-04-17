<?php
App::uses('AppController', 'Controller');
/**
 * LeadProjectTypes Controller
 *
 * @property LeadProjectType $LeadProjectType
 * @property PaginatorComponent $Paginator
 */
class LeadProjectTypesController extends AppController {

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
		$this->LeadProjectType->recursive = 0;
		$this->set('leadProjectTypes', $this->Paginator->paginate());
		
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->LeadProjectType->exists($id)) {
			throw new NotFoundException(__('Invalid lead project type'));
		}
		$options = array('conditions' => array('LeadProjectType.' . $this->LeadProjectType->primaryKey => $id));
		$this->set('leadProjectType', $this->LeadProjectType->find('first', $options));
		
		
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->LeadProjectType->create();
			if ($this->LeadProjectType->save($this->request->data)) {
				$this->Session->setFlash(__('The lead project type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The lead project type could not be saved. Please, try again.'));
			}
		}
		$leads = $this->LeadProjectType->Lead->find('list');
		$projectTypes = $this->LeadProjectType->ProjectType->find('list',array('fields'=>array('ProjectType.description')));
		$this->set(compact('leads', 'projectTypes'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->LeadProjectType->exists($id)) {
			throw new NotFoundException(__('Invalid lead project type'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->LeadProjectType->save($this->request->data)) {
				$this->Session->setFlash(__('The lead project type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The lead project type could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('LeadProjectType.' . $this->LeadProjectType->primaryKey => $id));
			$this->request->data = $this->LeadProjectType->find('first', $options);
		}
		$leads = $this->LeadProjectType->Lead->find('list');
		$projectTypes = $this->LeadProjectType->ProjectType->find('list',array('fields'=>array('ProjectType.description')));
		$this->set(compact('leads', 'projectTypes'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->LeadProjectType->id = $id;
		if (!$this->LeadProjectType->exists()) {
			throw new NotFoundException(__('Invalid lead project type'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->LeadProjectType->delete()) {
			$this->Session->setFlash(__('The lead project type has been deleted.'));
		} else {
			$this->Session->setFlash(__('The lead project type could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
