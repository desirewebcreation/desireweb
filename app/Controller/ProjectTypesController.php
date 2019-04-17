<?php
App::uses('AppController', 'Controller');
/**
 * ProjectTypes Controller
 *
 * @property ProjectType $ProjectType
 * @property PaginatorComponent $Paginator
 */
class ProjectTypesController extends AppController {

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
		$this->ProjectType->recursive = 0;
		$this->set('projectTypes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ProjectType->exists($id)) {
			throw new NotFoundException(__('Invalid project type'));
		}
		$options = array('conditions' => array('ProjectType.' . $this->ProjectType->primaryKey => $id));
		$this->set('projectType', $this->ProjectType->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ProjectType->create();
			if ($this->ProjectType->save($this->request->data)) {
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
		if (!$this->ProjectType->exists($id)) {
			throw new NotFoundException(__('Invalid project type'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ProjectType->save($this->request->data)) {
				$this->Session->setFlash(__('The project type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The project type could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ProjectType.' . $this->ProjectType->primaryKey => $id));
			$this->request->data = $this->ProjectType->find('first', $options);
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
		$this->ProjectType->id = $id;
		if (!$this->ProjectType->exists()) {
			throw new NotFoundException(__('Invalid project type'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->ProjectType->delete()) {
			$this->Session->setFlash(__('The project type has been deleted.'));
		} else {
			$this->Session->setFlash(__('The project type could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
