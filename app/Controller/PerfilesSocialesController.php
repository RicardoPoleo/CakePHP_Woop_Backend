<?php
App::uses('AppController', 'Controller');
/**
 * PerfilesSociales Controller
 *
 * @property PerfilesSociale $PerfilesSociale
 * @property PaginatorComponent $Paginator
 */
class PerfilesSocialesController extends AppController {

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
		$this->PerfilesSociale->recursive = 0;
		$this->set('perfilesSociales', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->PerfilesSociale->exists($id)) {
			throw new NotFoundException(__('Invalid perfiles sociale'));
		}
		$options = array('conditions' => array('PerfilesSociale.' . $this->PerfilesSociale->primaryKey => $id));
		$this->set('perfilesSociale', $this->PerfilesSociale->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->PerfilesSociale->create();
			if ($this->PerfilesSociale->save($this->request->data)) {
				$this->Session->setFlash(__('The perfiles sociale has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The perfiles sociale could not be saved. Please, try again.'));
			}
		}
		$clienteSocials = $this->PerfilesSociale->ClienteSocial->find('list');
		$this->set(compact('clienteSocials'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->PerfilesSociale->exists($id)) {
			throw new NotFoundException(__('Invalid perfiles sociale'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->PerfilesSociale->save($this->request->data)) {
				$this->Session->setFlash(__('The perfiles sociale has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The perfiles sociale could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('PerfilesSociale.' . $this->PerfilesSociale->primaryKey => $id));
			$this->request->data = $this->PerfilesSociale->find('first', $options);
		}
		$clienteSocials = $this->PerfilesSociale->ClienteSocial->find('list');
		$this->set(compact('clienteSocials'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->PerfilesSociale->id = $id;
		if (!$this->PerfilesSociale->exists()) {
			throw new NotFoundException(__('Invalid perfiles sociale'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->PerfilesSociale->delete()) {
			$this->Session->setFlash(__('The perfiles sociale has been deleted.'));
		} else {
			$this->Session->setFlash(__('The perfiles sociale could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
