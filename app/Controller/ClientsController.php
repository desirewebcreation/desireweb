<?php
App::uses('AppController', 'Controller');
/**
 * Clients Controller
 *
 * @property Client $Client
 * @property PaginatorComponent $Paginator
 */
class ClientsController extends AppController {

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
	       
	        $ClientKeywordValue= isset ( $this->request->query ['ClientKeywordValue'] ) ? $this->request->query ['ClientKeywordValue'] : '';
	        $queryStr = array ();
	        if ($ClientKeywordValue!= "") {
			$queryStr [] = array (
					'OR' => array(
							array("Client.company_name LIKE '%" . trim ( $ClientKeywordValue) . "%'"),
							array("Client.email_address LIKE '%" . trim ( $ClientKeywordValue) . "%'") 		
					),
					  
					
			);
		}
		$this->Paginator->settings = array (
				
						'recursive'=>'0',
						'conditions' => array (
								'AND' => array (
									$queryStr
								) 
						) ,
						'order' => array('modified'=> 'desc'), 
						'limit'=> 50
				
		); 
			
		$this->set('clients', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Client->exists($id)) {
			throw new NotFoundException(__('Invalid client'));
		}
		$options = array('conditions' => array('Client.' . $this->Client->primaryKey => $id));
		$this->set('client', $this->Client->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {

	$loginid = $this->UserAuth->getUserId(); 
    $this->set('loginid',$loginid); 
		
		
		if ($this->request->is('post')) {
			$this->Client->create();
			if ($this->Client->save($this->request->data)) {
				$this->Session->setFlash(__('The client has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The client could not be saved. Please, try again.'));
			}
		}
		$countries = $this->Client->Country->find('list');
		$this->set(compact('countries'));
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
    $this->set('loginid',$loginid); 
		
		if (!$this->Client->exists($id)) {
			throw new NotFoundException(__('Invalid client'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Client->save($this->request->data)) {
				$this->Session->setFlash(__('The client has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The client could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Client.' . $this->Client->primaryKey => $id));
			$this->request->data = $this->Client->find('first', $options);
		}
		$countries = $this->Client->Country->find('list');
		$this->set(compact('countries'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Client->id = $id;
		if (!$this->Client->exists()) {
			throw new NotFoundException(__('Invalid client'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Client->delete()) {
			$this->Session->setFlash(__('The client has been deleted.'));
		} else {
			$this->Session->setFlash(__('The client could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
