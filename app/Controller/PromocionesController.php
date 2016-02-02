<?php
App::uses('AppController', 'Controller');
/**
 * Promociones Controller
 *
 * @property Promocione $Promocione
 * @property PaginatorComponent $Paginator
 */
class PromocionesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');


	public function mobile_list($restaurante_rif=null)
	{
    	$this->autoRender=	false;
    	$result = array();
    	$result['error'] = array();
    	$result['message']	=	"Exito";
    	$ready 	=	true; 

		if($restaurante_rif==null)
		{
			$ready 	=	false;
			$result['message']	=	"Fallo";
			array_push($result['error'], "No se recibio el RIF del restaurante.");
		}

		if($ready)
		{

			$promocionesList 	= $this->Promocione->findAllByRestauranteRif($restaurante_rif);
			$promociones 		= array();
			
			$this->loadModel('Post');
			foreach ($promocionesList as $promocion) 
			{
				unset($promocion['Promocione']['restaurante_rif']);
				$post = $this->Post->findAllById($promocion['Promocione']['post_id']);

				$promocionReady = array(
					'id'			=>	$promocion['Promocione']['id'],
					'fecha_inicio'	=>	$promocion['Promocione']['fecha_inicio'],
					'fecha_fin'		=>	$promocion['Promocione']['fecha_fin'],
					'post_id'		=>	$promocion['Promocione']['post_id'],
					'post_data'		=>	$post[0]['Post']
					);

				array_push($promociones, $promocionReady);
			}
			$result['promociones'] = $promociones;
		}

		$this->response->sharable(true, 61);
		$this->response->type('json');
		$this->response->body(json_encode($result));
		return $this->response;
	}

	public function mobile_view($post_id='')
	{
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

		if($ready)
		{
			$Promocion = $this->Promocione->findAllByPostId($post_id);

			if($Promocion)
			{
				$result['promocion'] = $Promocion[0]['Promocione'];
			}
			else
			{
				array_push($result['error'], "No existe una promocion asignada a ese post");
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
		$this->Promocione->recursive = 0;
		$this->set('promociones', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Promocione->exists($id)) {
			throw new NotFoundException(__('Invalid promocione'));
		}
		$options = array('conditions' => array('Promocione.' . $this->Promocione->primaryKey => $id));
		$this->set('promocione', $this->Promocione->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Promocione->create();
			if ($this->Promocione->save($this->request->data)) {
				$this->Session->setFlash(__('The promocione has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The promocione could not be saved. Please, try again.'));
			}
		}
		$posts = $this->Promocione->Post->find('list');
		$clientes = $this->Promocione->Cliente->find('list');
		$this->set(compact('posts', 'clientes'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Promocione->exists($id)) {
			throw new NotFoundException(__('Invalid promocione'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Promocione->save($this->request->data)) {
				$this->Session->setFlash(__('The promocione has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The promocione could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Promocione.' . $this->Promocione->primaryKey => $id));
			$this->request->data = $this->Promocione->find('first', $options);
		}
		$posts = $this->Promocione->Post->find('list');
		$clientes = $this->Promocione->Cliente->find('list');
		$this->set(compact('posts', 'clientes'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Promocione->id = $id;
		if (!$this->Promocione->exists()) {
			throw new NotFoundException(__('Invalid promocione'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Promocione->delete()) {
			$this->Session->setFlash(__('The promocione has been deleted.'));
		} else {
			$this->Session->setFlash(__('The promocione could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
