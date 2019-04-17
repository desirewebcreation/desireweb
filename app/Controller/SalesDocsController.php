<?php
App::uses('AppController', 'Controller');
/**
 * SalesDocs Controller
 *
 * @property SalesDoc $SalesDoc
 * @property PaginatorComponent $Paginator
 * @property AclComponent $Acl
 * @property RequestHandlerComponent $RequestHandler
 * @property SessionComponent $Session
 */
class SalesDocsController extends AppController {

/**
 * Helpers
 *
 * @var array
 */
	//public $helpers = array('Text');
    public $uses = array (			
			'SalesDoc',
                        'User',
                        'Currency',
                        'MasterDoc'		
	);

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
		$this->SalesDoc->recursive = 0;
		$this->set('salesDocs', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->SalesDoc->exists($id)) {
			throw new NotFoundException(__('Invalid sales doc'));
		}
		$options = array('conditions' => array('SalesDoc.' . $this->SalesDoc->primaryKey => $id));
		$this->set('salesDoc', $this->SalesDoc->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
                $loginid = $this->UserAuth->getUserId();		
		$this->set ( 'loginid', $loginid );
		if ($this->request->is('post')) {
			$this->SalesDoc->create();
			if ($this->SalesDoc->save($this->request->data)) {
				$this->Session->setFlash(__('The sales doc has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The sales doc could not be saved. Please, try again.'));
			}
		}
		$currencies = $this->Currency->find('list');
		$masterDocs = $this->MasterDoc->find('list');
		$this->set(compact('currencies', 'masterDocs'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
            $loginid = $this->UserAuth->getUserId();	
		$this->set ( 'loginid', $loginid );
		if (!$this->SalesDoc->exists($id)) {
			throw new NotFoundException(__('Invalid sales doc'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->SalesDoc->save($this->request->data)) {
				$this->Session->setFlash(__('The sales doc has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The sales doc could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('SalesDoc.' . $this->SalesDoc->primaryKey => $id));
			$this->request->data = $this->SalesDoc->find('first', $options);
		}
		$currencies = $this->Currency->find('list');
		$masterDocs = $this->MasterDoc->find('list');                
		$this->set(compact('currencies', 'masterDocs'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->SalesDoc->id = $id;
		if (!$this->SalesDoc->exists()) {
			throw new NotFoundException(__('Invalid sales doc'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->SalesDoc->delete()) {
			$this->Session->setFlash(__('The sales doc has been deleted.'));
		} else {
			$this->Session->setFlash(__('The sales doc could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
         
}
