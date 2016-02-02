<?php
App::uses('AppController', 'Controller');
/**
 * Servicios Controller
 *
 * @property Servicio $Servicio
 * @property PaginatorComponent $Paginator
 */
class ServiciosController extends AppController {

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

    	$listaServicios = $this->Servicio->query("SELECT * FROM  `servicios`");

    	$servicios = array();
    	foreach ($listaServicios as $servicio) 
    	{
    		array_push($servicios, $servicio['servicios']['tipo']);
    	}

    	$result['servicios'] = $servicios;

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
		$this->Servicio->recursive = 0;
		$this->set('servicios', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Servicio->exists($id)) {
			throw new NotFoundException(__('Invalid servicio'));
		}
		$options = array('conditions' => array('Servicio.' . $this->Servicio->primaryKey => $id));
		$this->set('servicio', $this->Servicio->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Servicio->create();
			if ($this->Servicio->save($this->request->data)) {
				$this->Session->setFlash(__('The servicio has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The servicio could not be saved. Please, try again.'));
			}
		}
		$restaurantes = $this->Servicio->Restaurante->find('list');
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
		if (!$this->Servicio->exists($id)) {
			throw new NotFoundException(__('Invalid servicio'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Servicio->save($this->request->data)) {
				$this->Session->setFlash(__('The servicio has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The servicio could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Servicio.' . $this->Servicio->primaryKey => $id));
			$this->request->data = $this->Servicio->find('first', $options);
		}
		$restaurantes = $this->Servicio->Restaurante->find('list');
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
		$this->Servicio->id = $id;
		if (!$this->Servicio->exists()) {
			throw new NotFoundException(__('Invalid servicio'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Servicio->delete()) {
			$this->Session->setFlash(__('The servicio has been deleted.'));
		} else {
			$this->Session->setFlash(__('The servicio could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
