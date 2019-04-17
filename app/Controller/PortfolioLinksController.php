<?php
App::uses('AppController', 'Controller');
/**
 * PortfolioLinks Controller
 *
 * @property PortfolioLink $PortfolioLink
 * @property PaginatorComponent $Paginator
 * @property AclComponent $Acl
 * @property RequestHandlerComponent $RequestHandler
 * @property SessionComponent $Session
 */
class PortfolioLinksController extends AppController {

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
		$this->PortfolioLink->recursive = 0;
		$this->set('portfolioLinks', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->PortfolioLink->exists($id)) {
			throw new NotFoundException(__('Invalid portfolio link'));
		}
		$options = array('conditions' => array('PortfolioLink.' . $this->PortfolioLink->primaryKey => $id));
		$this->set('portfolioLink', $this->PortfolioLink->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
            $loginid = $this->Session->read ( 'Auth.User.id' );
		$this->set ( 'loginid', $loginid );
		if ($this->request->is('post')) {
			$this->PortfolioLink->create();
			if ($this->PortfolioLink->save($this->request->data)) {
				$this->Session->setFlash(__('The portfolio link has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The portfolio link could not be saved. Please, try again.'));
			}
		}
		$currencies = $this->PortfolioLink->Currency->find('list');
		$countries = $this->PortfolioLink->Country->find('list');
		$clients = $this->PortfolioLink->Client->find('list');
		$this->set(compact('currencies', 'countries', 'clients'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
            $loginid = $this->Session->read ( 'Auth.User.id' );
		$this->set ( 'loginid', $loginid );
		if (!$this->PortfolioLink->exists($id)) {
			throw new NotFoundException(__('Invalid portfolio link'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->PortfolioLink->save($this->request->data)) {
				$this->Session->setFlash(__('The portfolio link has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The portfolio link could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('PortfolioLink.' . $this->PortfolioLink->primaryKey => $id));
			$this->request->data = $this->PortfolioLink->find('first', $options);
		}
		$currencies = $this->PortfolioLink->Currency->find('list');
		$countries = $this->PortfolioLink->Country->find('list');
		$clients = $this->PortfolioLink->Client->find('list');
		$this->set(compact('currencies', 'countries', 'clients'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->PortfolioLink->id = $id;
		if (!$this->PortfolioLink->exists()) {
			throw new NotFoundException(__('Invalid portfolio link'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->PortfolioLink->delete()) {
			$this->Session->setFlash(__('The portfolio link has been deleted.'));
		} else {
			$this->Session->setFlash(__('The portfolio link could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
