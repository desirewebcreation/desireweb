<?php
App::uses('AppController', 'Controller');
/**
 * StatusProjectTypes Controller
 *
 * @property StatusProjectType $StatusProjectType
 * @property PaginatorComponent $Paginator
 */
class StatusProjectTypesController extends AppController {

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
		$this->StatusProjectType->recursive = 0;
		$this->set('statusProjectTypes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->StatusProjectType->exists($id)) {
			throw new NotFoundException(__('Invalid status project type'));
		}
		$options = array('conditions' => array('StatusProjectType.' . $this->StatusProjectType->primaryKey => $id));
		$this->set('statusProjectType', $this->StatusProjectType->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->StatusProjectType->create();
			if ($this->StatusProjectType->save($this->request->data)) {
				$this->Session->setFlash(__('The status project type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The status project type could not be saved. Please, try again.'));
			}
		}
		$leads = $this->StatusProjectType->Lead->find('list');
		$sources = $this->StatusProjectType->Source->find('list');
		$this->set(compact('leads', 'sources'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->StatusProjectType->exists($id)) {
			throw new NotFoundException(__('Invalid status project type'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->StatusProjectType->save($this->request->data)) {
				$this->Session->setFlash(__('The status project type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The status project type could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('StatusProjectType.' . $this->StatusProjectType->primaryKey => $id));
			$this->request->data = $this->StatusProjectType->find('first', $options);
		}
		$leads = $this->StatusProjectType->Lead->find('list');
		$sources = $this->StatusProjectType->Source->find('list');
		$this->set(compact('leads', 'sources'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->StatusProjectType->id = $id;
		if (!$this->StatusProjectType->exists()) {
			throw new NotFoundException(__('Invalid status project type'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->StatusProjectType->delete()) {
			$this->Session->setFlash(__('The status project type has been deleted.'));
		} else {
			$this->Session->setFlash(__('The status project type could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
