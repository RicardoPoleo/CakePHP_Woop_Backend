<?php
App::uses('AppController', 'Controller');
/**
 * ClientesSeguimientos Controller
 *
 * @property ClientesSeguimiento $ClientesSeguimiento
 * @property PaginatorComponent $Paginator
 */
class ClientesSeguimientosController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
	███╗   ███╗ ██████╗ ██████╗ ██╗██╗     ███████╗    ███████╗ ██████╗ ██╗     ██╗      ██████╗ ██╗    ██╗███████╗██████╗ ███████╗
	████╗ ████║██╔═══██╗██╔══██╗██║██║     ██╔════╝    ██╔════╝██╔═══██╗██║     ██║     ██╔═══██╗██║    ██║██╔════╝██╔══██╗██╔════╝
	██╔████╔██║██║   ██║██████╔╝██║██║     █████╗      █████╗  ██║   ██║██║     ██║     ██║   ██║██║ █╗ ██║█████╗  ██████╔╝███████╗
	██║╚██╔╝██║██║   ██║██╔══██╗██║██║     ██╔══╝      ██╔══╝  ██║   ██║██║     ██║     ██║   ██║██║███╗██║██╔══╝  ██╔══██╗╚════██║
	██║ ╚═╝ ██║╚██████╔╝██████╔╝██║███████╗███████╗    ██║     ╚██████╔╝███████╗███████╗╚██████╔╝╚███╔███╔╝███████╗██║  ██║███████║
	╚═╝     ╚═╝ ╚═════╝ ╚═════╝ ╚═╝╚══════╝╚══════╝    ╚═╝      ╚═════╝ ╚══════╝╚══════╝ ╚═════╝  ╚══╝╚══╝ ╚══════╝╚═╝  ╚═╝╚══════╝
*/
	public function mobile_followers($correo=null)
	{
   		$this->autoRender=	false;

    	$result = array();
    	$result['error'] 	= array();
    	$result['message']	=	"Exito";
    	$ready 	=	true;

    	if($correo==null)
    	{
			$ready 	=	false;
			$result['message']	=	"Fallo";
			array_push($result['error'], "No se recibio el correo del cliente.");
    	}

    	if($ready)
    	{
    		$this->loadModel('Cliente');
    		$cliente = $this->Cliente->findAllByCorreo($correo);

    		if($cliente)
    		{
    			$SQL ="SELECT * FROM  `clientes_seguimientos` WHERE  `seguimiento_id` LIKE  '".$cliente[0]['Cliente']['id']."'";
    			$seguimientosList = $this->ClientesSeguimiento->query($SQL);
 
    			$seguimientos = array();
    			foreach ($seguimientosList as $seguimiento) 
    			{
    				if($seguimiento['clientes_seguimientos']['seguimiento_tipo'] == "Cliente")
    				{
	    				//ID de quien sigo.
	    				$clienteSeguido 						= 	$this->Cliente->findAllById($seguimiento['clientes_seguimientos']['cliente_id']);
	    				$clienteSeguido[0]['Cliente']['tipo'] 	= 	$seguimiento['clientes_seguimientos']['seguimiento_tipo'];
	    				
	    				unset($clienteSeguido[0]['Cliente']['dispositivo']);
	    				unset($clienteSeguido[0]['Cliente']['huella']);
	    				unset($clienteSeguido[0]['Cliente']['clave']);
	    				unset($clienteSeguido[0]['Cliente']['estatus']);
	    				unset($clienteSeguido[0]['Cliente']['nacimiento']);

						array_push($seguimientos, $clienteSeguido[0]['Cliente']);
    				}
    				else
    				{
    					$restauranteSeguido = $this->Restaurante->findAllByRIF($seguimiento['clientes_seguimientos']['cliente_id']);

    					$restauranteSeguido[0]['Restaurante']['tipo'] = 'Restaurante';
						array_push($seguimientos, $clienteSeguido[0]['Restaurante']);
    				}

    			}

    			$result['seguimientos'] = $seguimientos;
    		} 
    		else
    		{
				$ready 	=	false;
				$result['message']	=	"Fallo";
				array_push($result['error'], "No existe un cliente asociado a ese correo.");    				
    		}

    		$this->ClientesSeguimiento->findAllByCorreo();
    	}

		$this->response->sharable(true, 61);
		$this->response->type('json');
		$this->response->body(json_encode($result));
		return $this->response;
	}

	/**
	███╗   ███╗ ██████╗ ██████╗ ██╗██╗     ███████╗    ███████╗ ██████╗ ██╗     ██╗      ██████╗ ██╗    ██╗██╗███╗   ██╗ ██████╗ 
	████╗ ████║██╔═══██╗██╔══██╗██║██║     ██╔════╝    ██╔════╝██╔═══██╗██║     ██║     ██╔═══██╗██║    ██║██║████╗  ██║██╔════╝ 
	██╔████╔██║██║   ██║██████╔╝██║██║     █████╗      █████╗  ██║   ██║██║     ██║     ██║   ██║██║ █╗ ██║██║██╔██╗ ██║██║  ███╗
	██║╚██╔╝██║██║   ██║██╔══██╗██║██║     ██╔══╝      ██╔══╝  ██║   ██║██║     ██║     ██║   ██║██║███╗██║██║██║╚██╗██║██║   ██║
	██║ ╚═╝ ██║╚██████╔╝██████╔╝██║███████╗███████╗    ██║     ╚██████╔╝███████╗███████╗╚██████╔╝╚███╔███╔╝██║██║ ╚████║╚██████╔╝
	╚═╝     ╚═╝ ╚═════╝ ╚═════╝ ╚═╝╚══════╝╚══════╝    ╚═╝      ╚═════╝ ╚══════╝╚══════╝ ╚═════╝  ╚══╝╚══╝ ╚═╝╚═╝  ╚═══╝ ╚═════╝                                                                                                                     
	*/
	public function mobile_following($correo=null)
	{
   		$this->autoRender=	false;

    	$result = array();
    	$result['error'] 	= array();
    	$result['message']	=	"Exito";
    	$ready 	=	true;

    	if($correo==null)
    	{
			$ready 	=	false;
			$result['message']	=	"Fallo";
			array_push($result['error'], "No se recibio el correo del cliente.");
    	}

    	if($ready)
    	{
    		$this->loadModel('Cliente');
    		$cliente = $this->Cliente->findAllByCorreo($correo);

    		if($cliente)
    		{
    			$SQL ="SELECT * FROM  `clientes_seguimientos` WHERE  `cliente_id` LIKE  '".$cliente[0]['Cliente']['id']."'";
    			$seguimientosList = $this->ClientesSeguimiento->query($SQL);
 
    			$seguimientos = array();
    			foreach ($seguimientosList as $seguimiento) 
    			{
    				if($seguimiento['clientes_seguimientos']['seguimiento_tipo'] == "Cliente")
    				{
	    				//ID de quien sigo.
	    				$clienteSeguido = $this->Cliente->findAllById($seguimiento['clientes_seguimientos']['seguimiento_id']);
	    				$clienteSeguido[0]['Cliente']['tipo'] = "Cliente";

	    				unset($clienteSeguido[0]['Cliente']['dispositivo']);
	    				unset($clienteSeguido[0]['Cliente']['huella']);
	    				unset($clienteSeguido[0]['Cliente']['clave']);
	    				unset($clienteSeguido[0]['Cliente']['estatus']);
	    				unset($clienteSeguido[0]['Cliente']['nacimiento']);

						array_push($seguimientos, $clienteSeguido[0]['Cliente']);
					}
    				else
    				{
    					$this->loadModel('Restaurante');
    					$restauranteSeguido = $this->Restaurante->findAllByRif($seguimiento['clientes_seguimientos']['seguimiento_id']);
    					//var_dump($restauranteSeguido[0]['Restaurante']);
    					unset($restauranteSeguido[0]['Restaurante']['clave']);
    					$restauranteSeguido[0]['Restaurante']['tipo'] 	= 'Restaurante';
    					$restauranteSeguido[0]['Restaurante']['imagen'] = 'http://52.24.1.93/img/Avatar/'.$restauranteSeguido[0]['Restaurante']['RIF'].'.jpg';;

						array_push($seguimientos, $restauranteSeguido[0]['Restaurante']);
    				}
    			}

    			$result['seguimientos'] = $seguimientos;
    		} 
    		else
    		{
				$ready 	=	false;
				$result['message']	=	"Fallo";
				array_push($result['error'], "No existe un cliente asociado a ese correo.");    				
    		}

    		$this->ClientesSeguimiento->findAllByCorreo();
    	}

		$this->response->sharable(true, 61);
		$this->response->type('json');
		$this->response->body(json_encode($result));
		return $this->response;
	}


	public function mobile_notification()
	{
		/*
		array(5) 
		{
		  ["cliente_id"]=>
		  string(1) "1"
		  ["evento_receptor_id"]=>
		  string(1) "6"
		  ["evento_receptor_tipo"]=>
		  string(7) "Cliente"
		  ["evento_tipo"]=>
		  string(11) "Seguimiento"
		  ["evento_desencadenante_id"]=>
		  string(2) "14"
		}
		*/

	}

	/**
	███╗   ███╗ ██████╗ ██████╗ ██╗██╗     ███████╗     █████╗ ██████╗ ██████╗ 
	████╗ ████║██╔═══██╗██╔══██╗██║██║     ██╔════╝    ██╔══██╗██╔══██╗██╔══██╗
	██╔████╔██║██║   ██║██████╔╝██║██║     █████╗      ███████║██║  ██║██║  ██║
	██║╚██╔╝██║██║   ██║██╔══██╗██║██║     ██╔══╝      ██╔══██║██║  ██║██║  ██║
	██║ ╚═╝ ██║╚██████╔╝██████╔╝██║███████╗███████╗    ██║  ██║██████╔╝██████╔╝
	╚═╝     ╚═╝ ╚═════╝ ╚═════╝ ╚═╝╚══════╝╚══════╝    ╚═╝  ╚═╝╚═════╝ ╚═════╝ 

	*/

	public function mobile_add()
	{
   		$this->autoRender=	false;

    	$result = array();
    	$result['error'] 	= array();
    	$result['message']	=	"Exito";
    	$ready 	=	true;

    	if(isset($_POST['seguir']))
    	{
    		$datos = json_decode($_POST['seguir'],true);

    		if(!isset($datos['cliente_correo']))
    		{
				$ready 	=	false;
				$result['message']	=	"Fallo";
				array_push($result['error'], "No se recibio el correo del cliente.");
    		}    		

    		if(!isset($datos['seguimiento_tipo']))
    		{
				$ready 	=	false;
				$result['message']	=	"Fallo";
				array_push($result['error'], "No se recibio el tipo de seguimiento."); //Si se sigue a un Cliente o a un Restaurante
    		}

    		if(!isset($datos['seguimiento_id']))
    		{
				$ready 	=	false;
				$result['message']	=	"Fallo";
				array_push($result['error'], "No se recibio el RIF/Correo de quien se sigue."); //Correo o RIF respectivamente
    		}    		    		

    		if($ready)
    		{
    			$this->loadModel('Cliente');
    			$cliente = $this->Cliente->findAllByCorreo($datos['cliente_correo']);

    			if($cliente)
    			{
    				//date_default_timezone_set('America/Panama');
	    			date_default_timezone_set('America/Caracas');
	    			$date = new DateTime();

	    			$clienteSeguido = "";

	    			if($datos['seguimiento_tipo']=="Cliente")
	    			{
	    				$this->loadModel('Cliente');
		    			$clienteSeguido = $this->Cliente->findAllByCorreo($datos['seguimiento_id']);
	    				if($clienteSeguido)
	    				{
	    					$datos['seguimiento_id'] = $clienteSeguido[0]['Cliente']['id']; 
	    				}
	    			}
	    			else
	    			{
	    				$this->loadModel('Restaurante');
	    				$clienteSeguido = $this->Restaurante->findAllByRif($datos['seguimiento_id']);
	    				if($clienteSeguido)
	    				{
	    					$datos['seguimiento_id'] = $clienteSeguido[0]['Restaurante']['RIF']; 
	    				}
	    			}

	    			if($clienteSeguido)
	   				{
		    			//Tipo de Seguimiento debe ser: Restaurante o Cliente
		    			$SQL =  "SELECT * FROM  `clientes_seguimientos`";
		    			$SQL .=  " WHERE  `cliente_id` LIKE  '".$cliente[0]['Cliente']['id']."'";
		    			$SQL .=  " AND  `seguimiento_tipo` LIKE  '".$datos['seguimiento_tipo']."'";
		    			$SQL .=  " AND  `seguimiento_id` LIKE  '".$datos['seguimiento_id']."'";

		    			$loSigue = $this->ClientesSeguimiento->query($SQL);

		    			if(!$loSigue)
		    			{

		    				if($ready)
		    				{
								$nuevoSeguimiento = array(
										    				'cliente_id' 		=> 	$cliente[0]['Cliente']['id'],
										    				'seguimiento_tipo' 	=>	$datos['seguimiento_tipo'],
										    				'seguimiento_id'	=> 	$datos['seguimiento_id'],
										    				'creacion'			=>	$date->format('Y-m-d H:i:s')	
										    			);

								$resultado = $this->ClientesSeguimiento->save($nuevoSeguimiento);

								if($resultado)
								{
									$this->loadModel('Notificacione');

									$newNotificacion = array(
													'cliente_id'				=>	$datos['seguimiento_id'],
													'evento_receptor_id'		=>	$cliente[0]['Cliente']['id'],
													'evento_receptor_tipo'		=>	$datos['seguimiento_tipo'],
													'evento_tipo'				=>	"Seguimiento",
													'evento_desencadenante_id'	=>	$this->ClientesSeguimiento->id
										);
									/*
									//Asi estaba antes
									$newNotificacion = array(
													'cliente_id'				=>	$cliente[0]['Cliente']['id'],
													'evento_receptor_id'		=>	$datos['seguimiento_id'],
													'evento_receptor_tipo'		=>	$datos['seguimiento_tipo'],
													'evento_tipo'				=>	"Seguimiento",
													'evento_desencadenante_id'	=>	$this->ClientesSeguimiento->id
										);
									*/
									$resultado = $this->Notificacione->save($newNotificacion);
								}
		    				}

		    			} 
		    			else
		    			{
							$ready 	=	false;
							$result['message']	=	"Fallo";
							array_push($result['error'], "Ya se sigue a este usuario.");	    				
		    			}

	    			}
	    			else
	  				{
						$ready 	=	false;
						$result['message']	=	"Fallo";
						array_push($result['error'], "No existe un cliente asociado a ese correo que tratas de seguir.");  	    						
					}
    				
    			}
    			else
    			{
					$ready 	=	false;
					$result['message']	=	"Fallo";
					array_push($result['error'], "No existe un cliente asociado a ese correo.");    				
    			}    			
    		}
    	}
    	else
    	{
			$ready 	=	false;
			$result['message']	=	"Fallo";
			array_push($result['error'], "El request no contiene datos en el campo 'seguir'");    		
    	}

		$this->response->sharable(true, 61);
		$this->response->type('json');
		$this->response->body(json_encode($result));
		return $this->response;  

	}


	/**
	████████╗██████╗  █████╗ ███████╗██╗  ██╗    ███╗   ███╗███████╗████████╗██╗  ██╗ ██████╗ ██████╗ ███████╗
	╚══██╔══╝██╔══██╗██╔══██╗██╔════╝██║  ██║    ████╗ ████║██╔════╝╚══██╔══╝██║  ██║██╔═══██╗██╔══██╗██╔════╝
	   ██║   ██████╔╝███████║███████╗███████║    ██╔████╔██║█████╗     ██║   ███████║██║   ██║██║  ██║███████╗
	   ██║   ██╔══██╗██╔══██║╚════██║██╔══██║    ██║╚██╔╝██║██╔══╝     ██║   ██╔══██║██║   ██║██║  ██║╚════██║
	   ██║   ██║  ██║██║  ██║███████║██║  ██║    ██║ ╚═╝ ██║███████╗   ██║   ██║  ██║╚██████╔╝██████╔╝███████║
	   ╚═╝   ╚═╝  ╚═╝╚═╝  ╚═╝╚══════╝╚═╝  ╚═╝    ╚═╝     ╚═╝╚══════╝   ╚═╝   ╚═╝  ╚═╝ ╚═════╝ ╚═════╝ ╚══════╝
	                                                                                                          
	*/

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->ClientesSeguimiento->recursive = 0;
		$this->set('clientesSeguimientos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ClientesSeguimiento->exists($id)) {
			throw new NotFoundException(__('Invalid clientes seguimiento'));
		}
		$options = array('conditions' => array('ClientesSeguimiento.' . $this->ClientesSeguimiento->primaryKey => $id));
		$this->set('clientesSeguimiento', $this->ClientesSeguimiento->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ClientesSeguimiento->create();
			if ($this->ClientesSeguimiento->save($this->request->data)) {
				$this->Session->setFlash(__('The clientes seguimiento has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The clientes seguimiento could not be saved. Please, try again.'));
			}
		}
		$clientes = $this->ClientesSeguimiento->Cliente->find('list');
		$seguimientos = $this->ClientesSeguimiento->Seguimiento->find('list');
		$this->set(compact('clientes', 'seguimientos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->ClientesSeguimiento->exists($id)) {
			throw new NotFoundException(__('Invalid clientes seguimiento'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ClientesSeguimiento->save($this->request->data)) {
				$this->Session->setFlash(__('The clientes seguimiento has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The clientes seguimiento could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ClientesSeguimiento.' . $this->ClientesSeguimiento->primaryKey => $id));
			$this->request->data = $this->ClientesSeguimiento->find('first', $options);
		}
		$clientes = $this->ClientesSeguimiento->Cliente->find('list');
		$seguimientos = $this->ClientesSeguimiento->Seguimiento->find('list');
		$this->set(compact('clientes', 'seguimientos'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->ClientesSeguimiento->id = $id;
		if (!$this->ClientesSeguimiento->exists()) {
			throw new NotFoundException(__('Invalid clientes seguimiento'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->ClientesSeguimiento->delete()) {
			$this->Session->setFlash(__('The clientes seguimiento has been deleted.'));
		} else {
			$this->Session->setFlash(__('The clientes seguimiento could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
