<?php
App::uses('AppController', 'Controller');
/**
 * ClientesComidas Controller
 *
 * @property ClientesComida $ClientesComida
 * @property PaginatorComponent $Paginator
 */
class ClientesComidasController extends AppController {

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
		$this->ClientesComida->recursive = 0;
		$this->set('clientesComidas', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ClientesComida->exists($id)) {
			throw new NotFoundException(__('Invalid clientes comida'));
		}
		$options = array('conditions' => array('ClientesComida.' . $this->ClientesComida->primaryKey => $id));
		$this->set('clientesComida', $this->ClientesComida->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ClientesComida->create();
			if ($this->ClientesComida->save($this->request->data)) {
				$this->Session->setFlash(__('The clientes comida has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The clientes comida could not be saved. Please, try again.'));
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
		if (!$this->ClientesComida->exists($id)) {
			throw new NotFoundException(__('Invalid clientes comida'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ClientesComida->save($this->request->data)) {
				$this->Session->setFlash(__('The clientes comida has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The clientes comida could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ClientesComida.' . $this->ClientesComida->primaryKey => $id));
			$this->request->data = $this->ClientesComida->find('first', $options);
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
		$this->ClientesComida->id = $id;
		if (!$this->ClientesComida->exists()) {
			throw new NotFoundException(__('Invalid clientes comida'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->ClientesComida->delete()) {
			$this->Session->setFlash(__('The clientes comida has been deleted.'));
		} else {
			$this->Session->setFlash(__('The clientes comida could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
