<?php
App::uses('AppController', 'Controller');
/**
 * Sources Controller
 *
 * @property Bug $Bug
 * @property PaginatorComponent $Paginator
 */
class BugsController extends AppController {

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
		$this->Bug->recursive = 0;
		$this->set('bugs', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Bug->exists($id)) {
			throw new NotFoundException(__('Invalid source'));
		}
		$options = array('conditions' => array('Bug.' . $this->Bug->primaryKey => $id));
		$this->set('bug', $this->Bug->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Bug->create();
			$this->request->data['Bug']['status']='Open'; 
			$loginid = $this->UserAuth->getUserId();
			$this->request->data['Bug']['created_by']=$loginid;
			$this->request->data['Bug']['modified_by']=$loginid;
			
			if ($this->Bug->save($this->request->data)) {
				$this->Session->setFlash(__('The bug has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The bug could not be saved. Please, try again.'));
			}
		}
	}
	
	/**
	 * add method
	 *
	 * @return void
	 */
	public function quickAdd() {
		if ($this->request->is('post')) {
			$this->Bug->create();
			$this->request->data['Bug']['status']='Open';
			$loginid = $this->UserAuth->getUserId();
			$this->request->data['Bug']['created_by']=$loginid;
			$this->request->data['Bug']['modified_by']=$loginid;
			
			$this->autoRender = false;
			
			if ($this->Bug->save($this->request->data)) {
				$this->Session->setFlash(__('The bug has been saved.'));
				return $this->redirect(array('controller'=>'Users', 'action' =>'dashboard'));
					
				
					} else {
				$this->Session->setFlash(__('The bug could not be saved. Please, try again.'));
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
		if (!$this->Bug->exists($id)) {
			throw new NotFoundException(__('Invalid bug'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$loginid = $this->UserAuth->getUserId();
			$this->request->data['Bug']['modified_by']=$loginid;
				
			if ($this->Bug->save($this->request->data)) {
				$this->Session->setFlash(__('The bug has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The bug could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Bug.' . $this->Bug->primaryKey => $id));
			$this->request->data = $this->Bug->find('first', $options);
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
		$this->Bug->id = $id;
		if (!$this->Bug->exists()) {
			throw new NotFoundException(__('Invalid source'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Bug->delete()) {
			$this->Session->setFlash(__('The Bug has been deleted.'));
		} else {
			$this->Session->setFlash(__('The Bug could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
