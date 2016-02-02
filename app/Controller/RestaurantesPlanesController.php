<?php
App::uses('AppController', 'Controller');
/**
 * RestaurantesPlanes Controller
 *
 * @property RestaurantesPlane $RestaurantesPlane
 * @property PaginatorComponent $Paginator
 */
class RestaurantesPlanesController extends AppController {

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
		$this->RestaurantesPlane->recursive = 0;
		$this->set('restaurantesPlanes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->RestaurantesPlane->exists($id)) {
			throw new NotFoundException(__('Invalid restaurantes plane'));
		}
		$options = array('conditions' => array('RestaurantesPlane.' . $this->RestaurantesPlane->primaryKey => $id));
		$this->set('restaurantesPlane', $this->RestaurantesPlane->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->RestaurantesPlane->create();
			if ($this->RestaurantesPlane->save($this->request->data)) {
				$this->Session->setFlash(__('The restaurantes plane has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The restaurantes plane could not be saved. Please, try again.'));
			}
		}
		$plans = $this->RestaurantesPlane->Plan->find('list');
		$restaurantes = $this->RestaurantesPlane->Restaurante->find('list');
		$pagos = $this->RestaurantesPlane->Pago->find('list');
		$this->set(compact('plans', 'restaurantes', 'pagos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->RestaurantesPlane->exists($id)) {
			throw new NotFoundException(__('Invalid restaurantes plane'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->RestaurantesPlane->save($this->request->data)) {
				$this->Session->setFlash(__('The restaurantes plane has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The restaurantes plane could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('RestaurantesPlane.' . $this->RestaurantesPlane->primaryKey => $id));
			$this->request->data = $this->RestaurantesPlane->find('first', $options);
		}
		$plans = $this->RestaurantesPlane->Plan->find('list');
		$restaurantes = $this->RestaurantesPlane->Restaurante->find('list');
		$pagos = $this->RestaurantesPlane->Pago->find('list');
		$this->set(compact('plans', 'restaurantes', 'pagos'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->RestaurantesPlane->id = $id;
		if (!$this->RestaurantesPlane->exists()) {
			throw new NotFoundException(__('Invalid restaurantes plane'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->RestaurantesPlane->delete()) {
			$this->Session->setFlash(__('The restaurantes plane has been deleted.'));
		} else {
			$this->Session->setFlash(__('The restaurantes plane could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
