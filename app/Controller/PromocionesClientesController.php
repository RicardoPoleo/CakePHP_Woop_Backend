<?php
App::uses('AppController', 'Controller');
/**
 * PromocionesClientes Controller
 *
 * @property PromocionesCliente $PromocionesCliente
 * @property PaginatorComponent $Paginator
 */
class PromocionesClientesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');



	public function mobile_add($post_id=null, $cliente_correo=null, )
	{
		$SERVIDOR = "52.24.1.93";
    	$this->autoRender=	false;

    	$result = array();
    	$result['error'] = array();
    	$result['message']	=	"Exito";
    	$ready 	=	true; 

		if($post_id==null)
		{
			$ready 	=	false;
			$result['message']	=	"Fallo";
			array_push($result['error'], "No se recibio el id del post");
		}

		if($cliente_correo==null)
		{
			$ready 	=	false;
			$result['message']	=	"Fallo";
			array_push($result['error'], "No se recibio el correo del cliente.");
		}    	

		if($ready)
		{
			$this->loadModel('Cliente');
			$Cliente=$this->Cliente->findAllByCorreo($correo);
			if($Cliente)
			{
				$this->loadModel('Post');
				$Post = $this->Post->findAllById($post_id);
			
				if($Post)
				{
					$Promocion = $this->Promocion->findAllByPostId($post_id);
					if($Promocion)
					{
						$fecha_inicio 	= 	strtotime($Promocion[0]['Promocion']['fecha_inicio']);
						$fecha_fin 		= 	strtotime($Promocion[0]['Promocion']['fecha_fin']);
					
						$newPromotionAdquired = array(

							);
					}
					else
					{
						$result['message']	=	"Fallo";
						array_push($result['error'], "No existe una promocion asignada a este post");						
					}
				}
				else
				{
					$result['message']	=	"Fallo";
					array_push($result['error'], "No existe un post asignado a este id");
				}
			}
			else
			{

				$result['message']	=	"Fallo";
				array_push($result['error'], "No existe un cliente asociado a ese correo");
			}
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
		$this->PromocionesCliente->recursive = 0;
		$this->set('promocionesClientes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->PromocionesCliente->exists($id)) {
			throw new NotFoundException(__('Invalid promociones cliente'));
		}
		$options = array('conditions' => array('PromocionesCliente.' . $this->PromocionesCliente->primaryKey => $id));
		$this->set('promocionesCliente', $this->PromocionesCliente->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->PromocionesCliente->create();
			if ($this->PromocionesCliente->save($this->request->data)) {
				$this->Session->setFlash(__('The promociones cliente has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The promociones cliente could not be saved. Please, try again.'));
			}
		}
		$promociones = $this->PromocionesCliente->Promocione->find('list');
		$clientes = $this->PromocionesCliente->Cliente->find('list');
		$this->set(compact('promociones', 'clientes'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->PromocionesCliente->exists($id)) {
			throw new NotFoundException(__('Invalid promociones cliente'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->PromocionesCliente->save($this->request->data)) {
				$this->Session->setFlash(__('The promociones cliente has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The promociones cliente could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('PromocionesCliente.' . $this->PromocionesCliente->primaryKey => $id));
			$this->request->data = $this->PromocionesCliente->find('first', $options);
		}
		$promociones = $this->PromocionesCliente->Promocione->find('list');
		$clientes = $this->PromocionesCliente->Cliente->find('list');
		$this->set(compact('promociones', 'clientes'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->PromocionesCliente->id = $id;
		if (!$this->PromocionesCliente->exists()) {
			throw new NotFoundException(__('Invalid promociones cliente'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->PromocionesCliente->delete()) {
			$this->Session->setFlash(__('The promociones cliente has been deleted.'));
		} else {
			$this->Session->setFlash(__('The promociones cliente could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
