<?php
App::uses('AppController', 'Controller');
/**
 * Disponibilidades Controller
 *
 * @property Disponibilidade $Disponibilidade
 * @property PaginatorComponent $Paginator
 */
class DisponibilidadesController extends AppController {

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
		$this->Disponibilidade->recursive = 0;
		$this->set('disponibilidades', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Disponibilidade->exists($id)) {
			throw new NotFoundException(__('Invalid disponibilidade'));
		}
		$options = array('conditions' => array('Disponibilidade.' . $this->Disponibilidade->primaryKey => $id));
		$this->set('disponibilidade', $this->Disponibilidade->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Disponibilidade->create();
			if ($this->Disponibilidade->save($this->request->data)) {
				$this->Session->setFlash(__('The disponibilidade has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The disponibilidade could not be saved. Please, try again.'));
			}
		}
		$restaurantes = $this->Disponibilidade->Restaurante->find('list');
		$this->set(compact('restaurantes'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Disponibilidade->exists($id)) {
			throw new NotFoundException(__('Invalid disponibilidade'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Disponibilidade->save($this->request->data)) {
				$this->Session->setFlash(__('The disponibilidade has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The disponibilidade could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Disponibilidade.' . $this->Disponibilidade->primaryKey => $id));
			$this->request->data = $this->Disponibilidade->find('first', $options);
		}
		$restaurantes = $this->Disponibilidade->Restaurante->find('list');
		$this->set(compact('restaurantes'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Disponibilidade->id = $id;
		if (!$this->Disponibilidade->exists()) {
			throw new NotFoundException(__('Invalid disponibilidade'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Disponibilidade->delete()) {
			$this->Session->setFlash(__('The disponibilidade has been deleted.'));
		} else {
			$this->Session->setFlash(__('The disponibilidade could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
