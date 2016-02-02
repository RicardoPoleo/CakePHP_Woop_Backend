<?php
App::uses('AppController', 'Controller');
/**
 * Planes Controller
 *
 * @property Plane $Plane
 * @property PaginatorComponent $Paginator
 */
class PlanesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');



/**
	███╗   ███╗ ██████╗ ██████╗ ██╗██╗     ███████╗    ██╗     ██╗███████╗████████╗
	████╗ ████║██╔═══██╗██╔══██╗██║██║     ██╔════╝    ██║     ██║██╔════╝╚══██╔══╝
	██╔████╔██║██║   ██║██████╔╝██║██║     █████╗      ██║     ██║███████╗   ██║   
	██║╚██╔╝██║██║   ██║██╔══██╗██║██║     ██╔══╝      ██║     ██║╚════██║   ██║   
	██║ ╚═╝ ██║╚██████╔╝██████╔╝██║███████╗███████╗    ███████╗██║███████║   ██║   
	╚═╝     ╚═╝ ╚═════╝ ╚═════╝ ╚═╝╚══════╝╚══════╝    ╚══════╝╚═╝╚══════╝   ╚═╝   
	                                                                               
*/
	public function mobile_list()
	{
   		$this->autoRender=	false;

    	$result = array();
    	$result['error'] 	= array();
    	$result['message']	=	"Exito";
    	$ready 	=	true;

		if($ready)
		{
			$planesList 	= 	$this->Plane->find('all');
			$planes 		= 	array();

			foreach ($planesList as $plan) 
			{
				array_push($planes, $plan['Plane']);
			}

			$result['planes'] = $planes;
		}

		$this->response->sharable(true, 61);
		$this->response->type('json');
		$this->response->body(json_encode($result));
		return $this->response;    	 
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Plane->recursive = 0;
		$this->set('planes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Plane->exists($id)) {
			throw new NotFoundException(__('Invalid plane'));
		}
		$options = array('conditions' => array('Plane.' . $this->Plane->primaryKey => $id));
		$this->set('plane', $this->Plane->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Plane->create();
			if ($this->Plane->save($this->request->data)) {
				$this->Session->setFlash(__('The plane has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The plane could not be saved. Please, try again.'));
			}
		}
		$restaurantes = $this->Plane->Restaurante->find('list');
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
		if (!$this->Plane->exists($id)) {
			throw new NotFoundException(__('Invalid plane'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Plane->save($this->request->data)) {
				$this->Session->setFlash(__('The plane has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The plane could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Plane.' . $this->Plane->primaryKey => $id));
			$this->request->data = $this->Plane->find('first', $options);
		}
		$restaurantes = $this->Plane->Restaurante->find('list');
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
		$this->Plane->id = $id;
		if (!$this->Plane->exists()) {
			throw new NotFoundException(__('Invalid plane'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Plane->delete()) {
			$this->Session->setFlash(__('The plane has been deleted.'));
		} else {
			$this->Session->setFlash(__('The plane could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
