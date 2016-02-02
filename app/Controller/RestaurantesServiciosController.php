<?php
App::uses('AppController', 'Controller');
/**
 * RestaurantesServicios Controller
 *
 * @property RestaurantesServicio $RestaurantesServicio
 * @property PaginatorComponent $Paginator
 */
class RestaurantesServiciosController extends AppController {

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
		$this->RestaurantesServicio->recursive = 0;
		$this->set('restaurantesServicios', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->RestaurantesServicio->exists($id)) {
			throw new NotFoundException(__('Invalid restaurantes servicio'));
		}
		$options = array('conditions' => array('RestaurantesServicio.' . $this->RestaurantesServicio->primaryKey => $id));
		$this->set('restaurantesServicio', $this->RestaurantesServicio->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->RestaurantesServicio->create();
			if ($this->RestaurantesServicio->save($this->request->data)) {
				$this->Session->setFlash(__('The restaurantes servicio has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The restaurantes servicio could not be saved. Please, try again.'));
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
		if (!$this->RestaurantesServicio->exists($id)) {
			throw new NotFoundException(__('Invalid restaurantes servicio'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->RestaurantesServicio->save($this->request->data)) {
				$this->Session->setFlash(__('The restaurantes servicio has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The restaurantes servicio could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('RestaurantesServicio.' . $this->RestaurantesServicio->primaryKey => $id));
			$this->request->data = $this->RestaurantesServicio->find('first', $options);
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
		$this->RestaurantesServicio->id = $id;
		if (!$this->RestaurantesServicio->exists()) {
			throw new NotFoundException(__('Invalid restaurantes servicio'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->RestaurantesServicio->delete()) {
			$this->Session->setFlash(__('The restaurantes servicio has been deleted.'));
		} else {
			$this->Session->setFlash(__('The restaurantes servicio could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
