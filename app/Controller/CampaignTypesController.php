<?php
App::uses('AppController', 'Controller');
/**
 * CampaignTypes Controller
 *
 * @property CampaignType $CampaignType
 * @property PaginatorComponent $Paginator
 */
class CampaignTypesController extends AppController {

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
		$this->CampaignType->recursive = 0;
		$this->set('campaignTypes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->CampaignType->exists($id)) {
			throw new NotFoundException(__('Invalid campaign type'));
		}
		$options = array('conditions' => array('CampaignType.' . $this->CampaignType->primaryKey => $id));
		$this->set('campaignType', $this->CampaignType->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->CampaignType->create();
			if ($this->CampaignType->save($this->request->data)) {
				$this->Session->setFlash(__('The campaign type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The campaign type could not be saved. Please, try again.'));
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
		if (!$this->CampaignType->exists($id)) {
			throw new NotFoundException(__('Invalid campaign type'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->CampaignType->save($this->request->data)) {
				$this->Session->setFlash(__('The campaign type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The campaign type could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('CampaignType.' . $this->CampaignType->primaryKey => $id));
			$this->request->data = $this->CampaignType->find('first', $options);
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
		$this->CampaignType->id = $id;
		if (!$this->CampaignType->exists()) {
			throw new NotFoundException(__('Invalid campaign type'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->CampaignType->delete()) {
			$this->Session->setFlash(__('The campaign type has been deleted.'));
		} else {
			$this->Session->setFlash(__('The campaign type could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
