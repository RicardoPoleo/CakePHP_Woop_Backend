<?php
App::uses('AppController', 'Controller');
/**
 * RestaurantesComidas Controller
 *
 * @property RestaurantesComida $RestaurantesComida
 * @property PaginatorComponent $Paginator
 */
class RestaurantesComidasController extends AppController {

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
		$this->RestaurantesComida->recursive = 0;
		$this->set('restaurantesComidas', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->RestaurantesComida->exists($id)) {
			throw new NotFoundException(__('Invalid restaurantes comida'));
		}
		$options = array('conditions' => array('RestaurantesComida.' . $this->RestaurantesComida->primaryKey => $id));
		$this->set('restaurantesComida', $this->RestaurantesComida->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->RestaurantesComida->create();
			if ($this->RestaurantesComida->save($this->request->data)) {
				$this->Session->setFlash(__('The restaurantes comida has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The restaurantes comida could not be saved. Please, try again.'));
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
		if (!$this->RestaurantesComida->exists($id)) {
			throw new NotFoundException(__('Invalid restaurantes comida'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->RestaurantesComida->save($this->request->data)) {
				$this->Session->setFlash(__('The restaurantes comida has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The restaurantes comida could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('RestaurantesComida.' . $this->RestaurantesComida->primaryKey => $id));
			$this->request->data = $this->RestaurantesComida->find('first', $options);
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
		$this->RestaurantesComida->id = $id;
		if (!$this->RestaurantesComida->exists()) {
			throw new NotFoundException(__('Invalid restaurantes comida'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->RestaurantesComida->delete()) {
			$this->Session->setFlash(__('The restaurantes comida has been deleted.'));
		} else {
			$this->Session->setFlash(__('The restaurantes comida could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
