<?php
App::uses('AppController', 'Controller');
/**
 * Amistades Controller
 *
 * @property Amistade $Amistade
 * @property PaginatorComponent $Paginator
 */
class AmistadesController extends AppController {

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
		$this->Amistade->recursive = 0;
		$this->set('amistades', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Amistade->exists($id)) {
			throw new NotFoundException(__('Invalid amistade'));
		}
		$options = array('conditions' => array('Amistade.' . $this->Amistade->primaryKey => $id));
		$this->set('amistade', $this->Amistade->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Amistade->create();
			if ($this->Amistade->save($this->request->data)) {
				$this->Session->setFlash(__('The amistade has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The amistade could not be saved. Please, try again.'));
			}
		}
		$amigos = $this->Amistade->Amigo->find('list');
		$this->set(compact('amigos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Amistade->exists($id)) {
			throw new NotFoundException(__('Invalid amistade'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Amistade->save($this->request->data)) {
				$this->Session->setFlash(__('The amistade has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The amistade could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Amistade.' . $this->Amistade->primaryKey => $id));
			$this->request->data = $this->Amistade->find('first', $options);
		}
		$amigos = $this->Amistade->Amigo->find('list');
		$this->set(compact('amigos'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Amistade->id = $id;
		if (!$this->Amistade->exists()) {
			throw new NotFoundException(__('Invalid amistade'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Amistade->delete()) {
			$this->Session->setFlash(__('The amistade has been deleted.'));
		} else {
			$this->Session->setFlash(__('The amistade could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
