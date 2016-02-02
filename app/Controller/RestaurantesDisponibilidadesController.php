<?php
App::uses('AppController', 'Controller');
/**
 * RestaurantesDisponibilidades Controller
 *
 * @property RestaurantesDisponibilidade $RestaurantesDisponibilidade
 * @property PaginatorComponent $Paginator
 */
class RestaurantesDisponibilidadesController extends AppController {

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
		$this->RestaurantesDisponibilidade->recursive = 0;
		$this->set('restaurantesDisponibilidades', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->RestaurantesDisponibilidade->exists($id)) {
			throw new NotFoundException(__('Invalid restaurantes disponibilidade'));
		}
		$options = array('conditions' => array('RestaurantesDisponibilidade.' . $this->RestaurantesDisponibilidade->primaryKey => $id));
		$this->set('restaurantesDisponibilidade', $this->RestaurantesDisponibilidade->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->RestaurantesDisponibilidade->create();
			if ($this->RestaurantesDisponibilidade->save($this->request->data)) {
				$this->Session->setFlash(__('The restaurantes disponibilidade has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The restaurantes disponibilidade could not be saved. Please, try again.'));
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
		if (!$this->RestaurantesDisponibilidade->exists($id)) {
			throw new NotFoundException(__('Invalid restaurantes disponibilidade'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->RestaurantesDisponibilidade->save($this->request->data)) {
				$this->Session->setFlash(__('The restaurantes disponibilidade has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The restaurantes disponibilidade could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('RestaurantesDisponibilidade.' . $this->RestaurantesDisponibilidade->primaryKey => $id));
			$this->request->data = $this->RestaurantesDisponibilidade->find('first', $options);
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
		$this->RestaurantesDisponibilidade->id = $id;
		if (!$this->RestaurantesDisponibilidade->exists()) {
			throw new NotFoundException(__('Invalid restaurantes disponibilidade'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->RestaurantesDisponibilidade->delete()) {
			$this->Session->setFlash(__('The restaurantes disponibilidade has been deleted.'));
		} else {
			$this->Session->setFlash(__('The restaurantes disponibilidade could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
