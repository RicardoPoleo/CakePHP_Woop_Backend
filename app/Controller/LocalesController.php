<?php
App::uses('AppController', 'Controller');
/**
 * Locales Controller
 *
 * @property Locale $Locale
 * @property PaginatorComponent $Paginator
 */
class LocalesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');


	/**
		Registro Locales

		Permite el registro del Local asignado a un Restaurante

		@param restaurantes_rif String 	El Rif del Restaurante  								No Puede ser Null
		@param estado			String 	El Estado donde se encuentra el Local  					No Puede ser Null
		@param ciudad			String 	La Ciudad donde se encuentra el Local  					No Puede ser Null
		@param zona				String 	La Zona donde se encuentra el Local 					No Puede ser Null
		@param direccion		String 	La completa donde se encuentra el Local  				No Puede ser Null
		@param coordenada_x		Float 	La coordenada X  donde se encuentra el Local en GMaps 	Si Puede Ser Null


		@return result 			JSON 	La respuesta contine un JSON que consta de dos variables: 
											'message'	: 	Que contiene un STRING con los valores "Exito" o "Fallo" dependiendo de si el registro fue exitoso.
											'error'		:	Que contiene un ARRAY que puede venir vacio si no hubo ningun error o con una lista de mensajes de los errores.

		Ejemplo result exitoso:
		
		Ejemplo result con errores:

	*/
	public function foo($par=null)
	{
    	$this->autoRender=	false;

    	$result = array();
    	$result['error'] = array();
    	$result['message']	=	"Exito";
    	$ready 	=	true; 		
	
		if($par==null)
		{
			$ready 	=	false;
			$result['message']	=	"Fallo";
			array_push($result['error'], "No se recibio el PAR");
		}

		$this->response->sharable(true, 61);
		$this->response->type('json');
		$this->response->body(json_encode($result));
		return $this->response;
	}



	/**
		Registro Locales

		Permite el registro del Local asignado a un Restaurante

		@param restaurantes_rif String 	El Rif del Restaurante  								No Puede ser Null
		@param estado			String 	El Estado donde se encuentra el Local  					No Puede ser Null
		@param ciudad			String 	La Ciudad donde se encuentra el Local  					No Puede ser Null
		@param zona				String 	La Zona donde se encuentra el Local 					No Puede ser Null
		@param direccion		String 	La completa donde se encuentra el Local  				No Puede ser Null

		@return result 			JSON 	La respuesta contine un JSON que consta de dos variables: 
											'message'	: 	Que contiene un STRING con los valores "Exito" o "Fallo" dependiendo de si el registro fue exitoso.
											'error'		:	Que contiene un ARRAY que puede venir vacio si no hubo ningun error o con una lista de mensajes de los errores.

		Ejemplo result exitoso:
		
		Ejemplo result con errores:

	*/
	public function mobile_add($restaurantes_rif = null, $estado =null, $ciudad = null, $zona= null, $direccion= null)
	{
    	$this->autoRender=	false;

    	$result = array();
    	$result['error'] = array();
    	$result['message']	=	"Exito";
    	$ready 	=	true; 		
	

		if($restaurantes_rif==null)
		{
			$ready 	=	false;
			$result['message']	=	"Fallo";
			array_push($result['error'], "No se recibio el rif del Restaurante");
		}

		if($estado==null)
		{
			$ready 	=	false;
			$result['message']	=	"Fallo";
			array_push($result['error'], "No se recibio el estado");
		}

		if($ciudad==null)
		{
			$ready 	=	false;
			$result['message']	=	"Fallo";
			array_push($result['error'], "No se recibio la ciudad");
		}		

		if($zona==null)
		{
			$ready 	=	false;
			$result['message']	=	"Fallo";
			array_push($result['error'], "No se recibio la zona");
		}		

		if($direccion==null)
		{
			$ready 	=	false;
			$result['message']	=	"Fallo";
			array_push($result['error'], "No se recibio la direccion");
		}

		if($ready)
		{
			$restauranteExistente = $this->Restaurante->findAllByRif($restaurantes_rif);

			if(!$restauranteExistente)
			{
				$result['message']	=	"Fallo";
				array_push($result['error'], "No existe un restaurante con ese RIF.");
			}
			else
			{
				$localNuevo = array(
						'Local'	=>	array(
								'restaurantes_rif' 	=> 	$RIF,
								'estado'			=>	$estado,
								'ciudad'			=>	$ciudad,
								'zona'				=>	$zona,
								'direccion'			=>	$direccion,
								'coordenada_y'		=>	null,
								'coordenada_x'		=> 	null
							)
					);

				$this->Local->save($localNuevo);				
			}
		}		

		$this->response->sharable(true, 61);
		$this->response->type('json');
		$this->response->body(json_encode($result));
		return $this->response;
	}	

	/**
		Registro Locales (Con coordenadas)

		Permite el registro del Local asignado a un Restaurante

		@param restaurantes_rif String 	El Rif del Restaurante  								No Puede ser Null
		@param estado			String 	El Estado donde se encuentra el Local  					No Puede ser Null
		@param ciudad			String 	La Ciudad donde se encuentra el Local  					No Puede ser Null
		@param zona				String 	La Zona donde se encuentra el Local 					No Puede ser Null
		@param direccion		String 	La completa donde se encuentra el Local  				No Puede ser Null
		@param coordenada_x		Float 	La completa donde se encuentra el Local  				Puede ser Null
		@param coordenada_y		Float 	La completa donde se encuentra el Local  				Puede ser Null

		@return result 			JSON 	La respuesta contine un JSON que consta de dos variables: 
											'message'	: 	Que contiene un STRING con los valores "Exito" o "Fallo" dependiendo de si el registro fue exitoso.
											'error'		:	Que contiene un ARRAY que puede venir vacio si no hubo ningun error o con una lista de mensajes de los errores.

		Ejemplo result exitoso:
		
		Ejemplo result con errores:

	*/
	public function mobile_addWithCoordenates($restaurantes_rif = null, $estado =null, $ciudad = null, $zona= null, $direccion= null, $coordenada_y=null, $coordenada_x=null)
	{
    	$this->autoRender=	false;

    	$result = array();
    	$result['error'] = array();
    	$result['message']	=	"Exito";
    	$ready 	=	true; 		
	

		if($restaurantes_rif==null)
		{
			$ready 	=	false;
			$result['message']	=	"Fallo";
			array_push($result['error'], "No se recibio el rif del Restaurante");
		}

		if($estado==null)
		{
			$ready 	=	false;
			$result['message']	=	"Fallo";
			array_push($result['error'], "No se recibio el estado");
		}

		if($ciudad==null)
		{
			$ready 	=	false;
			$result['message']	=	"Fallo";
			array_push($result['error'], "No se recibio la ciudad");
		}		

		if($zona==null)
		{
			$ready 	=	false;
			$result['message']	=	"Fallo";
			array_push($result['error'], "No se recibio la zona");
		}		

		if($direccion==null)
		{
			$ready 	=	false;
			$result['message']	=	"Fallo";
			array_push($result['error'], "No se recibio la direccion");
		}
		
		if($coordenada_x==null)
		{
			$ready 	=	false;
			$result['message']	=	"Fallo";
			array_push($result['error'], "No se recibio la coordenada x");
		}
		
		if($coordenada_y==null)
		{
			$ready 	=	false;
			$result['message']	=	"Fallo";
			array_push($result['error'], "No se recibio la coordenada y");
		}

		if($ready)
		{
			$restauranteExistente = $this->Restaurante->findAllByRif($restaurantes_rif);

			if(!$restauranteExistente)
			{
				$result['message']	=	"Fallo";
				array_push($result['error'], "No existe un restaurante con ese RIF.");
			}
			else
			{
				$localNuevo = array(
						'Local'	=>	array(
								'restaurantes_rif' 	=> 	$RIF,
								'estado'			=>	$estado,
								'ciudad'			=>	$ciudad,
								'zona'				=>	$zona,
								'direccion'			=>	$direccion,
								'coordenada_y'		=>	$coordenada_y,
								'coordenada_x'		=> 	$coordenada_x
							)
					);

				$this->Local->save($localNuevo);				
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
		$this->Locale->recursive = 0;
		$this->set('locales', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Locale->exists($id)) {
			throw new NotFoundException(__('Invalid locale'));
		}
		$options = array('conditions' => array('Locale.' . $this->Locale->primaryKey => $id));
		$this->set('locale', $this->Locale->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Locale->create();
			if ($this->Locale->save($this->request->data)) {
				$this->Session->setFlash(__('The locale has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The locale could not be saved. Please, try again.'));
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
		if (!$this->Locale->exists($id)) {
			throw new NotFoundException(__('Invalid locale'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Locale->save($this->request->data)) {
				$this->Session->setFlash(__('The locale has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The locale could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Locale.' . $this->Locale->primaryKey => $id));
			$this->request->data = $this->Locale->find('first', $options);
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
		$this->Locale->id = $id;
		if (!$this->Locale->exists()) {
			throw new NotFoundException(__('Invalid locale'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Locale->delete()) {
			$this->Session->setFlash(__('The locale has been deleted.'));
		} else {
			$this->Session->setFlash(__('The locale could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
