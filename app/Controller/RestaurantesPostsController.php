<?php
App::uses('AppController', 'Controller');
/**
 * RestaurantesPosts Controller
 *
 * @property RestaurantesPost $RestaurantesPost
 * @property PaginatorComponent $Paginator
 */
class RestaurantesPostsController extends AppController {

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
		$this->RestaurantesPost->recursive = 0;
		$this->set('restaurantesPosts', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->RestaurantesPost->exists($id)) {
			throw new NotFoundException(__('Invalid restaurantes post'));
		}
		$options = array('conditions' => array('RestaurantesPost.' . $this->RestaurantesPost->primaryKey => $id));
		$this->set('restaurantesPost', $this->RestaurantesPost->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->RestaurantesPost->create();
			if ($this->RestaurantesPost->save($this->request->data)) {
				$this->Session->setFlash(__('The restaurantes post has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The restaurantes post could not be saved. Please, try again.'));
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
		if (!$this->RestaurantesPost->exists($id)) {
			throw new NotFoundException(__('Invalid restaurantes post'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->RestaurantesPost->save($this->request->data)) {
				$this->Session->setFlash(__('The restaurantes post has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The restaurantes post could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('RestaurantesPost.' . $this->RestaurantesPost->primaryKey => $id));
			$this->request->data = $this->RestaurantesPost->find('first', $options);
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
		$this->RestaurantesPost->id = $id;
		if (!$this->RestaurantesPost->exists()) {
			throw new NotFoundException(__('Invalid restaurantes post'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->RestaurantesPost->delete()) {
			$this->Session->setFlash(__('The restaurantes post has been deleted.'));
		} else {
			$this->Session->setFlash(__('The restaurantes post could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
