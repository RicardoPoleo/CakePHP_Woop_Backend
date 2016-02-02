<?php
App::uses('AppController', 'Controller');
/**
 * Notificaciones Controller
 *
 * @property Notificacione $Notificacione
 * @property PaginatorComponent $Paginator
 */
class NotificacionesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');



	public function mobile_list2($tipo=null, $id=null)
	{
   		$this->autoRender=	false;

    	$result = array();
    	$result['error'] 	= array();
    	$result['message']	=	"Exito";
    	$ready 	=	true;

    	if($tipo==null)
    	{
			$ready 	=	false;
			$result['message']	=	"Fallo";
			array_push($result['error'], "No se recibio el tipo de perfil.");
    	}

    	if($id==null)
    	{
			$ready 	=	false;
			$result['message']	=	"Fallo";
			array_push($result['error'], "No se recibio el id del perfil.");
    	}

    	if($ready)
    	{
    		if($tipo=="Cliente")
    		{
    			$this->loadModel('Cliente');
	    		$cliente = $this->Cliente->findAllByCorreo($id);

	    		if($cliente)
	    		{
	    			$notificacionesList	=	$this->Notificacione->findAllByClienteId($cliente[0]['Cliente']['id']);

	    			$notificaciones = array();
	    			foreach ($notificacionesList as $notificacion) 
	    			{


	    				$notificacionDatos 	= array();
	    				$notificacionTexto 	= "";
	    				$testingSafe 		= true;

	    				//var_dump($notificacion);

	    				if($notificacion['Notificacione']['evento_tipo']=="Seguimiento")
	    				{
	    					//var_dump($notificacion['Notificacione']['evento_receptor_id']);
	    					$Cliente = $this->Cliente->findAllById($notificacion['Notificacione']['evento_receptor_id']);
	    					$notificacionTexto = "El usuario ".$notificacion['Notificacione']['evento_receptor_id']." te esta siguiendo.";
	    					unset($Cliente[0]['Cliente']['clave']);
	    					unset($Cliente[0]['Cliente']['huella']);
	    					//var_dump($Cliente);
	    					$id = $Cliente[0]['Cliente']['id'];
	    					$Cliente[0]['Cliente']['image'] = "http://52.24.1.93/img/Avatar/".$id.".jpg";
	    					$notificacionDatos['evento_receptor_datos'] = $Cliente[0]['Cliente'];
	    				}
						elseif($notificacion['Notificacione']['evento_tipo']=="Like") 
	    				{
	    					$Cliente = $this->Cliente->findAllById($notificacion['Notificacione']['evento_receptor_id']);
	    					if($Cliente)
	    					{
		    					if($Cliente[0]['Cliente']['alias']!=null)
		    					{
			    					$notificacionTexto = "El usuario ".$Cliente[0]['Cliente']['alias']." te hizo like al post ".$notificacion['Notificacione']['evento_desencadenante_id'].".";
		    					}
		    					else
		    					{
			    					$notificacionTexto = "El usuario ".$Cliente[0]['Cliente']['correo']." te hizo like al post ".$notificacion['Notificacione']['evento_desencadenante_id'].".";
			    					//$notificacionTexto = "El usuario ".$notificacion['Notificacione']['evento_receptor_id']." te hizo like al post ".$notificacion['Notificacione']['evento_desencadenante_id'].".";
		    					}
		    					unset($Cliente[0]['Cliente']['clave']);
		    					unset($Cliente[0]['Cliente']['huella']);
		    					$Cliente[0]['Cliente']['image'] = "http://52.24.1.93/img/Avatar/".$Cliente[0]['Cliente']['id'].".jpg";
		    					$notificacionDatos['evento_receptor_datos'] = $Cliente[0]['Cliente'];
	    					}
	    					else
	    					{
	    						//Just for testing, we are going to leave this like this.
	    						$testingSafe = false;
	    					}

	    				}
	    				elseif ($notificacion['Notificacione']['evento_tipo']=="Level Up") 
	    				{
	    					$notificacionDatos['nuevoNivel'] 	=	$notificacion['Notificacione']['evento_desencadenante_id'];
	    					$notificacionTexto = "Felicidades haz subido de nivel!";
	    				}

	    				$notificacionDatos['id'] 		= 	$notificacion['Notificacione']['id'];
	    				$notificacionDatos['texto'] 	= 	$notificacionTexto;
						
						if($testingSafe)
						{
							array_push($notificaciones, $notificacionDatos);
						}	    				
	    			}

	    			$result['notificaciones'] = $notificaciones;
	    		} 
	    		else
	    		{
					$ready 	=	false;
					$result['message']	=	"Fallo";
					array_push($result['error'], "No existe un cliente asociado a ese correo.");    				
	    		}
    		}
    		elseif ($tipo=="Restaurante") 
    		{
    			# code...
    		}
    		else
    		{
				$ready 	=	false;
				$result['message']	=	"Fallo";
				array_push($result['error'], "El tipo de perfil recibido no es el correcto. Usar 'Cliente' o 'Restaurante'.");    			
    		}

    	}

		$this->response->sharable(true, 61);
		$this->response->type('json');
		$this->response->body(json_encode($result));
		return $this->response;
	}


	/**
	███╗   ███╗ ██████╗ ██████╗ ██╗██╗     ███████╗    ██╗     ██╗███████╗████████╗
	████╗ ████║██╔═══██╗██╔══██╗██║██║     ██╔════╝    ██║     ██║██╔════╝╚══██╔══╝
	██╔████╔██║██║   ██║██████╔╝██║██║     █████╗      ██║     ██║███████╗   ██║   
	██║╚██╔╝██║██║   ██║██╔══██╗██║██║     ██╔══╝      ██║     ██║╚════██║   ██║   
	██║ ╚═╝ ██║╚██████╔╝██████╔╝██║███████╗███████╗    ███████╗██║███████║   ██║   
	╚═╝     ╚═╝ ╚═════╝ ╚═════╝ ╚═╝╚══════╝╚══════╝    ╚══════╝╚═╝╚══════╝   ╚═╝   

	*/

	public function mobile_list($tipo=null, $id=null)
	{
   		$this->autoRender=	false;

    	$result = array();
    	$result['error'] 	= array();
    	$result['message']	=	"Exito";
    	$ready 	=	true;

    	if($tipo==null)
    	{
			$ready 	=	false;
			$result['message']	=	"Fallo";
			array_push($result['error'], "No se recibio el tipo de perfil.");
    	}

    	if($id==null)
    	{
			$ready 	=	false;
			$result['message']	=	"Fallo";
			array_push($result['error'], "No se recibio el id del perfil.");
    	}

    	if($ready)
    	{
    		if($tipo=="Cliente")
    		{
    			$this->loadModel('Cliente');
	    		$cliente = $this->Cliente->findAllByCorreo($id);

	    		if($cliente)
	    		{
	    			$notificacionesList	=	$this->Notificacione->findAllByClienteId($cliente[0]['Cliente']['id']);

	    			$notificaciones = array();
	    			foreach ($notificacionesList as $notificacion) 
	    			{


	    				$notificacionDatos 	= array();
	    				$notificacionTexto 	= "";
	    				$testingSafe 		= true;

	    				//var_dump($notificacion);

	    				if($notificacion['Notificacione']['evento_tipo']=="Seguimiento")
	    				{
	    					//var_dump($notificacion['Notificacione']['evento_receptor_id']);
	    					$Cliente = $this->Cliente->findAllById($notificacion['Notificacione']['evento_receptor_id']);
	    					$notificacionTexto = "El usuario ".$notificacion['Notificacione']['evento_receptor_id']." te esta siguiendo.";
	    					unset($Cliente[0]['Cliente']['clave']);
	    					unset($Cliente[0]['Cliente']['huella']);
	    					//var_dump($Cliente);
	    					$id = $Cliente[0]['Cliente']['id'];
	    					$Cliente[0]['Cliente']['image'] = "http://52.24.1.93/img/Avatar/".$id.".jpg";
	    					$notificacionDatos['evento_receptor_datos'] = $Cliente[0]['Cliente'];
	    				}
						elseif($notificacion['Notificacione']['evento_tipo']=="Like") 
	    				{
	    					$Cliente = $this->Cliente->findAllById($notificacion['Notificacione']['evento_receptor_id']);
	    					if($Cliente)
	    					{
		    					if($Cliente[0]['Cliente']['alias']!=null)
		    					{
			    					$notificacionTexto = "El usuario ".$Cliente[0]['Cliente']['alias']." te hizo like al post ".$notificacion['Notificacione']['evento_desencadenante_id'].".";
		    					}
		    					else
		    					{
			    					$notificacionTexto = "El usuario ".$Cliente[0]['Cliente']['correo']." te hizo like al post ".$notificacion['Notificacione']['evento_desencadenante_id'].".";
			    					//$notificacionTexto = "El usuario ".$notificacion['Notificacione']['evento_receptor_id']." te hizo like al post ".$notificacion['Notificacione']['evento_desencadenante_id'].".";
		    					}
		    					unset($Cliente[0]['Cliente']['clave']);
		    					unset($Cliente[0]['Cliente']['huella']);
		    					$Cliente[0]['Cliente']['image'] = "http://52.24.1.93/img/Avatar/".$Cliente[0]['Cliente']['id'].".jpg";
		    					$notificacionDatos['evento_receptor_datos'] = $Cliente[0]['Cliente'];
	    					}
	    					else
	    					{
	    						//Just for testing, we are going to leave this like this.
	    						$testingSafe = false;
	    					}

	    				}
	    				elseif ($notificacion['Notificacione']['evento_tipo']=="Level Up") 
	    				{
	    					$notificacionDatos['nuevoNivel'] 	=	$notificacion['Notificacione']['evento_desencadenante_id'];
	    					$notificacionTexto = "Felicidades haz subido de nivel!";
	    				}

	    				$notificacionDatos['id'] 		= 	$notificacion['Notificacione']['id'];
	    				$notificacionDatos['texto'] 	= 	$notificacionTexto;
						
						if($testingSafe)
						{
							array_push($notificaciones, $notificacionDatos);
						}	    				
	    			}

	    			$result['notificaciones'] = $notificaciones;
	    		} 
	    		else
	    		{
					$ready 	=	false;
					$result['message']	=	"Fallo";
					array_push($result['error'], "No existe un cliente asociado a ese correo.");    				
	    		}
    		}
    		elseif ($tipo=="Restaurante") 
    		{
    			# code...
    		}
    		else
    		{
				$ready 	=	false;
				$result['message']	=	"Fallo";
				array_push($result['error'], "El tipo de perfil recibido no es el correcto. Usar 'Cliente' o 'Restaurante'.");    			
    		}

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
		$this->Notificacione->recursive = 0;
		$this->set('notificaciones', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Notificacione->exists($id)) {
			throw new NotFoundException(__('Invalid notificacione'));
		}
		$options = array('conditions' => array('Notificacione.' . $this->Notificacione->primaryKey => $id));
		$this->set('notificacione', $this->Notificacione->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Notificacione->create();
			if ($this->Notificacione->save($this->request->data)) {
				$this->Session->setFlash(__('The notificacione has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The notificacione could not be saved. Please, try again.'));
			}
		}
		$clientes = $this->Notificacione->Cliente->find('list');
		$eventoReceptors = $this->Notificacione->EventoReceptor->find('list');
		$eventoDesencadenantes = $this->Notificacione->EventoDesencadenante->find('list');
		$this->set(compact('clientes', 'eventoReceptors', 'eventoDesencadenantes'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Notificacione->exists($id)) {
			throw new NotFoundException(__('Invalid notificacione'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Notificacione->save($this->request->data)) {
				$this->Session->setFlash(__('The notificacione has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The notificacione could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Notificacione.' . $this->Notificacione->primaryKey => $id));
			$this->request->data = $this->Notificacione->find('first', $options);
		}
		$clientes = $this->Notificacione->Cliente->find('list');
		$eventoReceptors = $this->Notificacione->EventoReceptor->find('list');
		$eventoDesencadenantes = $this->Notificacione->EventoDesencadenante->find('list');
		$this->set(compact('clientes', 'eventoReceptors', 'eventoDesencadenantes'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Notificacione->id = $id;
		if (!$this->Notificacione->exists()) {
			throw new NotFoundException(__('Invalid notificacione'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Notificacione->delete()) {
			$this->Session->setFlash(__('The notificacione has been deleted.'));
		} else {
			$this->Session->setFlash(__('The notificacione could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
