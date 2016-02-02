<?php
App::uses('AppController', 'Controller');
/**
 * Restaurantes Controller
 *
 * @property Restaurante $Restaurante
 * @property PaginatorComponent $Paginator
 */
class RestaurantesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
	//public $uses = array('RestaurantesComida','Servicio');

	public function mobile_listAll()
	{
    	$this->autoRender=	false;

    	$result = array();
    	$result['error'] 	= array();
    	$result['message']	=	"Exito";
    	$ready 	=	true; 

    	$restaurantes_list = $this->Restaurante->find('all');
    	$restaurantes = array();
    	foreach ($restaurantes_list as $restaurante) 
    	{
    		$r = array();
    		$r['RIF'] = $restaurante['Restaurante']['RIF'];
    		$r['Nombre'] = $restaurante['Restaurante']['nombre'];
    		array_push($restaurantes, $r);
    	}

    	$result['restaurantes'] 	= $restaurantes;    	

		$this->response->sharable(true, 61);
		$this->response->type('json');
		$this->response->body(json_encode($result));
		return $this->response;    	 
	}

	public function prueba_log($value=null)
	{
    	$this->autoRender=	false;

    	$result = array();
    	$result['error'] 	= array();
    	$result['message']	=	"Exito";
    	$ready 	=	true; 

    	CakeLog::write('activity', 'A special message for activity logging'); 

		$this->response->sharable(true, 61);
		$this->response->type('json');
		$this->response->body(json_encode($result));
		return $this->response;    	 
	}


	public function mobile_defaultSearchList()
	{
		$this->autoRender 	=	false;
		$result  			= 	array();
		$result['error'] 	= 	array();
		$result['message']	=	"Exito";
		$ready 				=	true; 

		//Estado, Tipo Comida, Servicios
		$this->loadModel('Estado');
    	$listaEstados = $this->Estado->query("SELECT * FROM `estados`");

    	$estados = array();
    	foreach ($listaEstados as $estado) 
    	{
    		array_push($estados, $estado['estados']['nombre']);
    	}

    	$this->loadModel('Comida');
    	$listaComidas = $this->Comida->query("SELECT * FROM  `comidas`");

    	$comidas = array();
    	foreach ($listaComidas as $comida) 
    	{
    		array_push($comidas, $comida['comidas']['tipo']);
    	}
    	
    	$this->loadModel('Servicio');
    	$listaServicios = $this->Servicio->query("SELECT * FROM  `servicios`");

    	$servicios = array();
    	foreach ($listaServicios as $servicio) 
    	{
    		array_push($servicios, $servicio['servicios']['tipo']);
    	}

    	$result['searchList']['states'] 		= $estados;
    	$result['searchList']['food_type'] 		= $comidas;
    	$result['searchList']['services_type'] 	= $servicios;

		$this->response->sharable(true, 61);
		$this->response->type('json');
		$this->response->body(json_encode($result));
		return $this->response;		
	}

	/**
	███╗   ███╗ ██████╗ ██████╗ ██╗██╗     ███████╗     █████╗ ██████╗ ██████╗      █████╗ ██╗   ██╗ █████╗ ████████╗ █████╗ ██████╗ 
	████╗ ████║██╔═══██╗██╔══██╗██║██║     ██╔════╝    ██╔══██╗██╔══██╗██╔══██╗    ██╔══██╗██║   ██║██╔══██╗╚══██╔══╝██╔══██╗██╔══██╗
	██╔████╔██║██║   ██║██████╔╝██║██║     █████╗      ███████║██║  ██║██║  ██║    ███████║██║   ██║███████║   ██║   ███████║██████╔╝
	██║╚██╔╝██║██║   ██║██╔══██╗██║██║     ██╔══╝      ██╔══██║██║  ██║██║  ██║    ██╔══██║╚██╗ ██╔╝██╔══██║   ██║   ██╔══██║██╔══██╗
	██║ ╚═╝ ██║╚██████╔╝██████╔╝██║███████╗███████╗    ██║  ██║██████╔╝██████╔╝    ██║  ██║ ╚████╔╝ ██║  ██║   ██║   ██║  ██║██║  ██║
	╚═╝     ╚═╝ ╚═════╝ ╚═════╝ ╚═╝╚══════╝╚══════╝    ╚═╝  ╚═╝╚═════╝ ╚═════╝     ╚═╝  ╚═╝  ╚═══╝  ╚═╝  ╚═╝   ╚═╝   ╚═╝  ╚═╝╚═╝  ╚═╝

	*/
	public function mobile_addAvatar()
	{
		//error_reporting(0);
		
		$this->autoRender 	=	false;
		$result  			= 	array();
		$result['error'] 	= 	array();
		$result['message']	=	"Exito";
		$ready 				=	true; 

		if ($this->request->is('post'))
		{
			
			if(!empty($this->request->data['rif']))
			{
				$ready 				=	false;
				$result['message']	=	"Fail";
				array_push($result['error'], "Falta el Rif del Restaurante");
			}

			if(!empty($this->request->data['image']))
			{
				$ready 				=	false;
				$result['message']	=	"Fail";
				array_push($result['error'], "Falta la imagen del Restaurante");
			}			

			if($ready)
			{
				$restaurante_rif 	= 	$this->request->data['restaurante_rif'];
				$restaurante_image 	= 	$this->request->data['restaurante_image'];
			
				$data = base64_decode($restaurante_image);
				
				$fileName = 'img/Avatar/'.$restaurante_rif.'.jpg';
				$resultado = file_put_contents($fileName, $data);
				if(!$resultado)
				{
					$result['message']	=	"Fail";
					array_push($result['error'], "Error en la carga de archivos. Intente nuevamente mas tarde.");
				}
				else
				{
					$result['image']	=	"https://52.24.1.93/".$fileName;
				}
			}
		}

		$this->response->sharable(true, 61);
		$this->response->type('json');
		$this->response->body(json_encode($result));
		return $this->response;
	}

	/**
	███╗   ███╗ ██████╗ ██████╗ ██╗██╗     ███████╗    ██╗      ██████╗  ██████╗ ██╗███╗   ██╗
	████╗ ████║██╔═══██╗██╔══██╗██║██║     ██╔════╝    ██║     ██╔═══██╗██╔════╝ ██║████╗  ██║
	██╔████╔██║██║   ██║██████╔╝██║██║     █████╗      ██║     ██║   ██║██║  ███╗██║██╔██╗ ██║
	██║╚██╔╝██║██║   ██║██╔══██╗██║██║     ██╔══╝      ██║     ██║   ██║██║   ██║██║██║╚██╗██║
	██║ ╚═╝ ██║╚██████╔╝██████╔╝██║███████╗███████╗    ███████╗╚██████╔╝╚██████╔╝██║██║ ╚████║
	╚═╝     ╚═╝ ╚═════╝ ╚═════╝ ╚═╝╚══════╝╚══════╝    ╚══════╝ ╚═════╝  ╚═════╝ ╚═╝╚═╝  ╚═══╝
	*/

	public function mobile_login($correo=null, $clave=null)
	{
		$SERVIDOR = "52.24.1.93";
    	$this->autoRender=	false;

    	$result = array();
    	$result['error'] = array();
    	$result['message']	=	"Exito";
    	$ready 	=	true; 

		if($correo==null)
		{
			$ready 	=	false;
			$result['message']	=	"Fallo";
			array_push($result['error'], "No se recibió el correo");
		}

		if($clave==null)
		{
			$ready 	=	false;
			$result['message']	=	"Fallo";
			array_push($result['error'], "No se recibió la clave");
		}

		if($ready)
		{
			$Restaurante=$this->Restaurante->findAllByCorreo($correo);
			if($Restaurante)
			{
				//debug($Restaurante);
				//var_dump($Restaurante[0]['Restaurante']);
				if($Restaurante[0]['Restaurante']['clave']==$clave)
				{
					$result['message']			=	"Exito";
					//$result['restaurante_rif']	=	$Restaurante[0]['Restaurante']['RIF'];
					$result['rif']	=	$Restaurante[0]['Restaurante']['RIF'];
				}
				else
				{
					$result['message']	=	"Fallo";
					array_push($result['error'], "Combinacion Clave/Correo invalida.");					
				}
			}
			else
			{
				$result['message']	=	"Fallo";
				array_push($result['error'], "No existe un restaurante con esa direccion de correo");
			}
		}

		$this->response->sharable(true, 61);
		$this->response->type('json');
		$this->response->body(json_encode($result));
		return $this->response;		
	}

	/**
	███╗   ███╗ ██████╗ ██████╗ ██╗██╗     ███████╗    ██╗   ██╗██╗███████╗██╗    ██╗
	████╗ ████║██╔═══██╗██╔══██╗██║██║     ██╔════╝    ██║   ██║██║██╔════╝██║    ██║
	██╔████╔██║██║   ██║██████╔╝██║██║     █████╗      ██║   ██║██║█████╗  ██║ █╗ ██║
	██║╚██╔╝██║██║   ██║██╔══██╗██║██║     ██╔══╝      ╚██╗ ██╔╝██║██╔══╝  ██║███╗██║
	██║ ╚═╝ ██║╚██████╔╝██████╔╝██║███████╗███████╗     ╚████╔╝ ██║███████╗╚███╔███╔╝
	╚═╝     ╚═╝ ╚═════╝ ╚═════╝ ╚═╝╚══════╝╚══════╝      ╚═══╝  ╚═╝╚══════╝ ╚══╝╚══╝ 
	                                                                                 		   
	*/
	public function mobile_view($restaurante_rif=null, $cliente_correo=null)
	{
    	$this->autoRender=	false;

    	$result = array();
    	$result['error'] 	= array();
    	$result['message']	=	"Exito";
    	$ready 	=	true; 

    	//Rif
		if($restaurante_rif==null)
		{
			$ready 	=	false;
			$result['message']	=	"Fallo";
			array_push($result['error'], "No se recibió el RIF");
		}

		if($ready)
		{
			$restauranteExistente = $this->Restaurante->findAllByRif($restaurante_rif);

			if($restauranteExistente)
			{
				$restaurante_rif 	= 	$restauranteExistente[0]['Restaurante']['RIF'];

				$restauranteExistente[0]['Restaurante']['seguido'] 					= 	false;
				/*
					Para el la busqueda de cantidad de clientes seguidos
				 */

				$this->loadModel("ClientesSeguimientos");
				$restauranteSeguidores 	= 	$this->ClientesSeguimientos->findAllBySeguimientoId($restaurante_rif);
				$cantidad				=	count($restauranteSeguidores); 
				$restauranteExistente[0]['Restaurante']['cantidadSeguidores'] 	= 	$cantidad;


				/*
					Para la busqueda del tipo de comidas que sirven
				 */
				$this->loadModel('RestaurantesComidas');
				$tiposComidas 	= 	$this->RestaurantesComidas->findAllByRestaurantesRif($restaurante_rif);
				
				$restauranteTiposComidas = array();
				foreach ($tiposComidas as $tipo) 
				{
					array_push($restauranteTiposComidas, $tipo['RestaurantesComidas']['comidas_tipo']);
				}

				/*
					Para la disponibilidad de dichas comidas
				 */

				$this->loadModel('RestaurantesDisponibilidades');
				$registroDisponibilidadComida = 	$this->RestaurantesDisponibilidades->findAllByRestaurantesRif($restaurante_rif);			

				$restauranteDisponibilidadComidas = array();
				foreach ($registroDisponibilidadComida as $disponibilidad) 
				{
					array_push($restauranteDisponibilidadComidas, $disponibilidad['RestaurantesDisponibilidades']['disponibilidades_horario']);
				}

				/*
					Para los servicios que presta el restaurante
				 */
				
				$this->loadModel('RestaurantesServicios');
				$serviciosList = $this->RestaurantesServicios->findAllByRestaurantesRif($restaurante_rif);	

				$servicios = array();
				foreach ($serviciosList as $servicio) 
				{
					array_push($servicios, $servicio['RestaurantesServicios']['servicios_tipo']);
				}

				/*
					Asignando la imagen del avatar
				 */
				$fileName = 'img/Avatar/'.$restauranteExistente[0]['Restaurante']['RIF'].'.jpg';
				$image= file_exists($fileName);

				$image_url = "null";
				if($image)
				{
					$image_url = "http://52.24.1.93/".$fileName;
				}
				$result['restaurante']['seguido'] 	=	"N/A";
				
				if($cliente_correo!=null)
				{
					$this->loadModel('Cliente');
					$Cliente = $this->Cliente->findAllByCorreo($cliente_correo);
					if($Cliente)
					{
						$cliente_id 		= $Cliente[0]['Cliente']['id'];

						$seguido = 	$this->ClientesSeguimientos->findAllByClienteIdAndSeguimientoId($cliente_id, $restaurante_rif);
						if($seguido)
						{
							$restauranteExistente[0]['Restaurante']['seguido'] 					= 	true;
						}
					}
					else
					{
						array_push($result['error'], "No existe un Cliente asociado a ese correo.");
					}					
				}
				/*
				*/
			
				/*
					Asignando los resultados al array de respuesta.
				 */

				$restauranteExistente[0]['Restaurante']['image'] 					= 	$image;
				$restauranteExistente[0]['Restaurante']['image_url'] 				= 	$image_url;

				$restauranteExistente[0]['Restaurante']['tiposComidas'] 			= 	$restauranteTiposComidas;
				$restauranteExistente[0]['Restaurante']['disponibilidadComidas'] 	= 	$restauranteDisponibilidadComidas;
				$restauranteExistente[0]['Restaurante']['servicios'] 				= 	$servicios;

				unset($restauranteExistente[0]['Restaurante']['clave']);



				$result['restaurante'] 	= 	$restauranteExistente[0]['Restaurante'];
			}
			else
			{
				$result['message']	=	"Fallo";
				array_push($result['error'], "No existe un restaurante con ese RIF registrado.");
			}
		}
		
		$this->response->sharable(true, 61);
		$this->response->type('json');
		$this->response->body(json_encode($result));
		return $this->response;		    	
	}


	/**
	███╗   ███╗ ██████╗ ██████╗ ██╗██╗     ███████╗    ███████╗███████╗ █████╗ ██████╗  ██████╗██╗  ██╗
	████╗ ████║██╔═══██╗██╔══██╗██║██║     ██╔════╝    ██╔════╝██╔════╝██╔══██╗██╔══██╗██╔════╝██║  ██║
	██╔████╔██║██║   ██║██████╔╝██║██║     █████╗      ███████╗█████╗  ███████║██████╔╝██║     ███████║
	██║╚██╔╝██║██║   ██║██╔══██╗██║██║     ██╔══╝      ╚════██║██╔══╝  ██╔══██║██╔══██╗██║     ██╔══██║
	██║ ╚═╝ ██║╚██████╔╝██████╔╝██║███████╗███████╗    ███████║███████╗██║  ██║██║  ██║╚██████╗██║  ██║
	╚═╝     ╚═╝ ╚═════╝ ╚═════╝ ╚═╝╚══════╝╚══════╝    ╚══════╝╚══════╝╚═╝  ╚═╝╚═╝  ╚═╝ ╚═════╝╚═╝  ╚═╝
	                                                                                                   
	*/	
	public function mobile_search($busqueda_tipo=null, $busqueda_parametro=null)
	{
   		$this->autoRender=	false;

    	$result = array();
    	$result['error'] 	= array();
    	$result['message']	=	"Exito";
    	$ready 	=	true;

		if($busqueda_tipo==null)
		{
			$ready 	=	false;
			$result['message']	=	"Fallo";
			array_push($result['error'], "No se recibió el tipo de busqueda.");				
		}

		if($busqueda_parametro==null)
		{
			$ready 	=	false;
			$result['message']	=	"Fallo";
			array_push($result['error'], "No se recibió el parametro de la busqueda.");				
		}			
				

		if($ready)
		{
			$tipo 		= 	$busqueda_tipo;
			$parametro 	= 	$busqueda_parametro;

			$restaurantes = array();

			if ($tipo=="Estado")
			{
				$restaurantesPorEstado 	=	$this->Restaurante->findAllByEstado($parametro);	 
			
				foreach ($restaurantesPorEstado as $restaurante) 
				{
					if($restaurante)
					{
						$fileName = 'img/Avatar/'.$restaurante['Restaurante']['RIF'].'.jpg';
						$image= file_exists($fileName);

						$image_url = "null";
						if($image)
						{
							$image_url = "http://52.24.1.93/".$fileName;
						}

						$restaurante['Restaurante']['image'] 		= 	$image;
						$restaurante['Restaurante']['image_url'] 	= 	$image_url;
						
						unset($restaurante['Restaurante']['clave']);
						array_push($restaurantes, $restaurante['Restaurante']);
					}
				}
			}
			elseif ($tipo=="TipoComida") 
			{
				$SQL = "SELECT * FROM  `restaurantes_comidas` WHERE  `comidas_tipo` LIKE  '".$parametro."'";

				$this->loadModel('RestaurantesComida');

				$restaurantesPorTipoComida 	=	$this->RestaurantesComida->query($SQL);	 
			
				foreach ($restaurantesPorTipoComida as $restauranteInfo) 
				{
					$restaurante = $this->Restaurante->findAllByRif($restauranteInfo['restaurantes_comidas']['restaurantes_rif']);

					if($restaurante)
					{
						$fileName = 'img/Avatar/'.$restaurante[0]['Restaurante']['RIF'].'.jpg';
						$image= file_exists($fileName);

						$image_url = "null";
						if($image)
						{
							$image_url = "http://52.24.1.93/".$fileName;
						}

						$restaurante['Restaurante']['image'] 		= 	$image;
						$restaurante['Restaurante']['image_url'] 	= 	$image_url;

						unset($restaurante[0]['Restaurante']['clave']);
						array_push($restaurantes, $restaurante[0]['Restaurante']);
					}

				}
			}
			elseif ($tipo=="Servicios") 
			{
				$SQL = "SELECT * FROM  `restaurantes_servicios` WHERE  `servicios_tipo` LIKE  '".$parametro."'";

				$this->loadModel('Servicio');

				$restaurantesPorTipoServicio 	=	$this->Servicio->query($SQL);	 
			
				foreach ($restaurantesPorTipoServicio as $restauranteInfo) 
				{
					$restaurante = $this->Restaurante->findAllByRif($restauranteInfo['restaurantes_servicios']['restaurantes_rif']);

					if($restaurante)
					{
						$fileName = 'img/Avatar/'.$restaurante[0]['Restaurante']['RIF'].'.jpg';
						$image= file_exists($fileName);

						$image_url = "null";
						if($image)
						{
							$image_url = "http://52.24.1.93/".$fileName;
						}

						$restaurante['Restaurante']['image'] 		= 	$image;
						$restaurante['Restaurante']['image_url'] 	= 	$image_url;

						unset($restaurante[0]['Restaurante']['clave']);
						array_push($restaurantes, $restaurante[0]['Restaurante']);
					}

				}
			}			
			/*
			elseif ($tipo=="Reciente") 
			{
				$SQL = "SELECT * FROM  `restaurantes_servicios` WHERE  `servicios_tipo` LIKE  '".$parametro."'";

				$restaurantesRecientes 	=	$this->Restaurantes->query($SQL);	 
			
				foreach ($restaurantesPorTipoServicio as $restauranteInfo) 
				{
					$restaurante = $this->Restaurante->findAllByRestaurantesRif($restauranteInfo['RestaurantesComidas']['restaurantes_rif']);
					array_push($restaurantes, $restaurante[0]['Restaurante']);
				}
			}
			else //No hay busqueda
			{

			}
			*/

			$result['restaurantes']	=	$restaurantes;
		}

		$this->response->sharable(true, 61);
		$this->response->type('json');
		$this->response->body(json_encode($result));
		return $this->response;    	 
	}

	public function FunctionName($value)
	{
    	$this->autoRender=	false;

    	$result = array();
    	$result['error'] 	= array();
    	$result['message']	=	"Exito";
    	$ready 	=	true; 

    	$this->log("Something didn't work!");


		$this->response->sharable(true, 61);
		$this->response->type('json');
		$this->response->body(json_encode($result));
		return $this->response;    	 
	}

	/**
	███╗   ███╗ ██████╗ ██████╗ ██╗██╗     ███████╗     █████╗ ██████╗ ██████╗ 
	████╗ ████║██╔═══██╗██╔══██╗██║██║     ██╔════╝    ██╔══██╗██╔══██╗██╔══██╗
	██╔████╔██║██║   ██║██████╔╝██║██║     █████╗      ███████║██║  ██║██║  ██║
	██║╚██╔╝██║██║   ██║██╔══██╗██║██║     ██╔══╝      ██╔══██║██║  ██║██║  ██║
	██║ ╚═╝ ██║╚██████╔╝██████╔╝██║███████╗███████╗    ██║  ██║██████╔╝██████╔╝
	╚═╝     ╚═╝ ╚═════╝ ╚═════╝ ╚═╝╚══════╝╚══════╝    ╚═╝  ╚═╝╚═════╝ ╚═════╝  
		Funcion que permite agregar un restaurante.
	*/
	public function mobile_add()
	{
    	$this->autoRender=	false;

    	$result = array();
    	$result['error'] 	= array();
    	$result['message']	=	"Exito";
    	$ready 	=	true; 

			//var_dump($_POST['restaurante']);
    	if(isset($_POST['restaurante']))
    	{
			$datos = json_decode($_POST['restaurante'], true);

			//DATOS CABLEADOS PARA LAS PRUEBAS
			//$datos['restaurante_imagen'] = "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";
			//$datos = $_POST;

	    	//Rif
			if(!isset($datos['restaurante_rif']))
			{
				$ready 	=	false;
				$result['message']	=	"Fallo";
				array_push($result['error'], "No se recibió el RIF");
			}

			//Nombre del Restaurante
			if(!isset($datos['restaurante_nombre']))
			{
				$ready 	=	false;
				$result['message']	=	"Fallo";
				array_push($result['error'], "No se recibió el nombre");
			}
			
			//Pagina Web
			if(!isset($datos['restaurante_pagina_web']))
			{
				$datos['restaurante_pagina_web'] = "NULL";
				array_push($result['error'], "No se recibió el sitio web. Sera susti");
			}
			
			if(!isset($datos['restaurante_estado']))
			{
				$ready 	=	false;
				$result['message']	=	"Fallo";
				array_push($result['error'], "No se recibió el estado");
			}

			if(!isset($datos['restaurante_ciudad']))
			{
				$ready 	=	false;
				$result['message']	=	"Fallo";
				array_push($result['error'], "No se recibió la ciudad");
			}

			//Dirección
			if(!isset($datos['restaurante_direccion']))
			{
				$ready 	=	false;
				$result['message']	=	"Fallo";
				array_push($result['error'], "No se recibió la direccion");
			}						

			//Correo
			if(!isset($datos['restaurante_correo']))
			{
				$ready 	=	false;
				$result['message']	=	"Fallo";
				array_push($result['error'], "No se recibió el correo");
			}	

			//Rango de Precios
			if(!isset($datos['restaurante_precio_promedio']))
			{
				$ready 	=	false;
				$result['message']	=	"Fallo";
				array_push($result['error'], "No se recibió el precio promedio");
			}

			//Clave del Rest
			if(!isset($datos['restaurante_clave']))
			{
				$ready 	=	false;
				$result['message']	=	"Fallo";
				array_push($result['error'], "No se recibió la clave");
			}

			//Descripción del Restaurante
			if(!isset($datos['restaurante_descripcion']))
			{
				$ready 	=	false;
				$result['message']	=	"Fallo";
				array_push($result['error'], "No se recibió la Descripción");
			}

			//String del horario del Restaurante
			if(!isset($datos['restaurante_horarios']))
			{
				$ready 	=	false;
				$result['message']	=	"Fallo";
				array_push($result['error'], "No se recibió el Horario");
			}

			//String Base64 de la Imagen
			if(!isset($datos['restaurante_imagen']))
			{
				array_push($result['error'], "No se recibió la imagen");
			}

			//Formas de Pago (Debito - Credito - Efectivo)
			if(!isset($datos['restaurante_formas_pago']))
			{
				$ready 	=	false;
				$result['message']	=	"Fallo";
				array_push($result['error'], "No se recibió las distintas formas de pago");
			}
			elseif (count($datos['restaurante_formas_pago'])==0) 
			{
				$ready 	=	false;
				$result['message']	=	"Fallo";
				array_push($result['error'], "Se debe de enviar al menos una forma de pago");
			}

			//Tipo de Comida / Categorías
			if(!isset($datos['restaurante_tipos_comida']))
			{
				$ready 	=	false;
				$result['message']	=	"Fallo";
				array_push($result['error'], "No se recibieron los tipos de comida");
			}
			elseif(count($datos['restaurante_tipos_comida'])==0)
			{
				$ready 	=	false;
				$result['message']	=	"Fallo";
				array_push($result['error'], "Se debe de enviar al menos un tipo de comida");
			}

			//Tipo de Comida / Categorías
			if(!isset($datos['restaurante_servicios']))
			{
				$ready 	=	false;
				$result['message']	=	"Fallo";
				array_push($result['error'], "No se recibieron los servicios.");
			}
			elseif(count($datos['restaurante_servicios'])==0)
			{
				$ready 	=	false;
				$result['message']	=	"Fallo";
				array_push($result['error'], "Se debe de enviar al menos un tipo de servicio");
			}
				
			//Ofrece (Brunch - Almuerzo - Cena)
			if(!isset($datos['restaurante_disponibilidad_comidas']))
			{
				$ready 	=	false;
				$result['message']	=	"Fallo";
				array_push($result['error'], "No se recibieron los horarios de disponibilidad de comidas. Ejemplo: Brunch, Almuerzo o Cena.");
			}
			elseif(count($datos['restaurante_disponibilidad_comidas'])==0)
			{
				$ready 	=	false;
				$result['message']	=	"Fallo";
				array_push($result['error'], "Se debe de enviar al menos un horario de disponibilidad de las comida");
			}
    	}
		else
		{
			$ready 				= 	false;
			$result['message']	=	"Fallo";
			array_push($result['error'], "No se recibio el request dentro del parametro 'restaurante'.");		
		}			


		if($ready)
		{
			$restauranteExistente = $this->Restaurante->findAllByRif($datos['restaurante_rif']);

			if($restauranteExistente)
			{
				$ready 				= 	false;
				$result['message']	=	"Fallo";
				array_push($result['error'], "Ya existe un restaurante con ese RIF registrado.");
			}

			$restauranteExistente = $this->Restaurante->findAllByCorreo($datos['restaurante_correo']);

			if($restauranteExistente)
			{
				$ready 				= 	false;				
				$result['message']	=	"Fallo";
				array_push($result['error'], "Ya existe un restaurante con ese Correo registrado.");
			}

			if($ready)
			{
				$restauranteNuevo = array(
								'Restaurante'=> array(
										'RIF'			=> 	$datos['restaurante_rif'],
										'nombre'		=>	$datos['restaurante_nombre'],
										'correo'		=>	$datos['restaurante_correo'],
										'estado'		=>	$datos['restaurante_estado'],
										'ciudad'		=>	$datos['restaurante_ciudad'],
										'direccion'		=>	$datos['restaurante_direccion'],
										'precio_avg'	=>	$datos['restaurante_precio_promedio'],
										'horarios'		=>	$datos['restaurante_horarios'],
										'descripcion'	=>	$datos['restaurante_descripcion'],
										'pagina_web'	=>	$datos['restaurante_pagina_web'],
										'clave'			=> 	$datos['restaurante_clave'],
										'debito'		=> 	$datos['restaurante_formas_pago']['debito'],
										'credito'		=> 	$datos['restaurante_formas_pago']['credito'],
										'efectivo'		=> 	$datos['restaurante_formas_pago']['efectivo'],
										'estatus'		=>	'Por Confirmar'
									)
					);

				if($this->Restaurante->save($restauranteNuevo))
				{

					//Registramos los Tipos de Comidas
					$tipos_comida 		= array();

					foreach ($datos['restaurante_tipos_comida'] as $tipo) 
					{
						$tipoRegistro 	= 	array(
												'restaurantes_rif' 	=> $datos['restaurante_rif'], 
												'comidas_tipo' 		=> $tipo 
												);
						array_push($tipos_comida, $tipoRegistro);
					}

					$this->loadModel('RestaurantesComidas');
					$registroTiposComida 	= 	$this->RestaurantesComidas->saveAll($tipos_comida);

					if(!$registroTiposComida)
					{
						$result['message']	=	"Fallo";
						array_push($result['error'], "Hubo un problema al registrar los tipos de comidas. Intente registrar los mismos a parte.");
					}


					//Registramos los horarios de los serivios
					$horarios_servicios 	= 	array();

					foreach ($datos['restaurante_disponibilidad_comidas'] as $disponibilidad) 
					{
						$disponibilidadRegistro 	= 	array(
												'restaurantes_rif' 			=> $datos['restaurante_rif'], 
												'disponibilidades_horario' 	=> $disponibilidad 
												);
						array_push($horarios_servicios, $disponibilidadRegistro);
					}

					$this->loadModel('RestaurantesDisponibilidades');
					$registroDisponibilidadComida = 	$this->RestaurantesDisponibilidades->saveAll($horarios_servicios);

					if(!$registroDisponibilidadComida)
					{
						array_push($result['error'], "Hubo un problema al registrar la disponibilidad de los Servicios. Intente registrar los mismos nuevamente.");
					}

					//Registramos los horarios de los serivios
					$tipos_servicios 	= 	array();

					foreach ($datos['restaurante_servicios'] as $tipo) 
					{
						$disponibilidadRegistro 	= 	array(
												'restaurantes_rif' 			=> $datos['restaurante_rif'], 
												'servicios_tipo' 	=> $tipo 
												);
						array_push($tipos_servicios, $disponibilidadRegistro);
					}

					$this->loadModel('RestaurantesServicios');
					$registroServiciosTipos = 	$this->RestaurantesServicios->saveAll($tipos_servicios);

					if(!$registroServiciosTipos)
					{
						array_push($result['error'], "Hubo un problema al registrar los tipos de servicios. Intente registrar los mismos nuevamente.");
					}

					//Registramos la Imagen
					if(isset($datos['restaurante_imagen']))
					{
					
			    		$datos['restaurante_imagen'] 	= str_replace("-", "+", $datos['restaurante_imagen']);
						$datos['restaurante_imagen'] 	= str_replace("_", "/", $datos['restaurante_imagen']);						
						$data = base64_decode($datos['restaurante_imagen']);
						
						$fileName = 'img/Avatar/'.$datos['restaurante_rif'].'.jpg';
						$resultado = file_put_contents($fileName, $data);
						if(!$resultado)
						{
							array_push($result['error'], "Error en la carga del avatar. Intente nuevamente mas tarde.");
						}
						else
						{
							$result['image']	=	"https://52.24.1.93/".$fileName;
						}
					}
					else
					{
						array_push($result['error'], "No se recibieron los datos del avatar. Por favor suba el mismo desde la venta de administracion del perfil.");
					}

					//Registramos los datos de 

					//Falta agregar un theme para estos correos.
					/*
					$to      = 	$correo;
					$subject = 	'Verificacion de cuenta para el restaurante: '.$nombre;
					$message = 	'<html> <body> Mensaje de confirmacion, por favor haz click en este <a href="ec2-52-25-15-84.us-west-2.compute.amazonaws.com/Restaurantes/confirmar/J-12345/"> link </a> para confirmar tu cuenta. </body> </html>';
					$headers = 	'From: confirmaciones@woop.com' . "\r\n" .
					    		'Reply-To: noreply@woop.com' . "\r\n" .
					    		'X-Mailer: PHP/' . phpversion();

					mail($to, $subject, $message, $headers);
					*/
				}
				else
				{
					$result['message']	=	"Fallo";
					array_push($result['error'], "Hubo un problema al registrar el restaurante. Por favor intentelo de nuevo. Por su seguridad, los demas datos no han sido registrados.");
				}
			}
		}

		$this->response->sharable(true, 61);
		$this->response->type('json');
		$this->response->body(json_encode($result));
		return $this->response;		
	}

	

	/**
	 ██████╗ ██████╗ ███╗   ██╗███████╗██╗██████╗ ███╗   ███╗ █████╗ ██████╗ 
	██╔════╝██╔═══██╗████╗  ██║██╔════╝██║██╔══██╗████╗ ████║██╔══██╗██╔══██╗
	██║     ██║   ██║██╔██╗ ██║█████╗  ██║██████╔╝██╔████╔██║███████║██████╔╝
	██║     ██║   ██║██║╚██╗██║██╔══╝  ██║██╔══██╗██║╚██╔╝██║██╔══██║██╔══██╗
	╚██████╗╚██████╔╝██║ ╚████║██║     ██║██║  ██║██║ ╚═╝ ██║██║  ██║██║  ██║
	 ╚═════╝ ╚═════╝ ╚═╝  ╚═══╝╚═╝     ╚═╝╚═╝  ╚═╝╚═╝     ╚═╝╚═╝  ╚═╝╚═╝  ╚═╝
	                                                                         
		Permite confirmar la cuenta de correo de los restaurantes. 
		Debe ser accedida unicamente desde la URL del correo de confirmacion.
		El RIF que se manda desde la funcion de envio deberia estar encriptado
		por la seguridad no solo del restaurante sino del sistema.

		@param RIF String Este es el RIF que, en condiciones normales, deberia estar encriptado  
	*/
	public function confirmar($RIF=null)
	{
		$this->autoRender = false;
		$ready = true;
		$msg = "";

		if($RIF==null)
		{
			$ready = false;
			$msg = "Codigo de Verificacion inexistente.";
		}
		else
		{
			$Restaurante 	=	$this->Restaurante->findAllByRif($RIF);
			if($Restaurante)
			{
				
				$Restaurante[0]['estatus'] = "Verificado";

				$this->Restaurante->save($Restaurante[0]);

				$msg 	=	"Verificacion exitosa!";
			}
			else
			{
				$msg 	= 	"Codigo de Verificacion invalido";
			}
		}

		debug($msg);
	}



	/**
		Mandar correo de prueba

		Funcion que permite mandar un correo a un usuario

		@param $Correo String Correo de la persona
	*/

	public function mandarCorreo($correo = "ricardopoleo@gmail.com")
	{
		$this->autoRender = false;

		$to      = 	$correo;
		$subject = 	'Verificacion de cuenta para el restaurante: Rest de Prueba';
		$message = 	'<html> <body> Mensaje de confirmacion, por favor haz click en este <a href="ec2-52-25-15-84.us-west-2.compute.amazonaws.com/Restaurantes/confirmacion/J-12345/"> link </a> para confirmar tu cuenta. </body> </html>';
		$headers = 	'From: confirmaciones@woop.com' . "\r\n" .
								"MIME-Version: 1.0\r\n".
								"Content-Type: text/html; charset=ISO-8859-1\r\n".
					    		'Reply-To: noreply@woop.com' . "\r\n" .
					    		'X-Mailer: PHP/' . phpversion();

		$envio = mail($to, $subject, $message, $headers);

		debug($envio);

	}


/**
███████╗██╗████████╗███████╗    ███╗   ███╗███████╗████████╗██╗  ██╗ ██████╗ ██████╗ ███████╗
██╔════╝██║╚══██╔══╝██╔════╝    ████╗ ████║██╔════╝╚══██╔══╝██║  ██║██╔═══██╗██╔══██╗██╔════╝
███████╗██║   ██║   █████╗      ██╔████╔██║█████╗     ██║   ███████║██║   ██║██║  ██║███████╗
╚════██║██║   ██║   ██╔══╝      ██║╚██╔╝██║██╔══╝     ██║   ██╔══██║██║   ██║██║  ██║╚════██║
███████║██║   ██║   ███████╗    ██║ ╚═╝ ██║███████╗   ██║   ██║  ██║╚██████╔╝██████╔╝███████║
╚══════╝╚═╝   ╚═╝   ╚══════╝    ╚═╝     ╚═╝╚══════╝   ╚═╝   ╚═╝  ╚═╝ ╚═════╝ ╚═════╝ ╚══════╝
                                                                                             
*/





/**
██████╗ ██████╗ ███████╗    ███╗   ███╗ █████╗ ██████╗ ███████╗    ███╗   ███╗███████╗████████╗██╗  ██╗ ██████╗ ██████╗ ███████╗
██╔══██╗██╔══██╗██╔════╝    ████╗ ████║██╔══██╗██╔══██╗██╔════╝    ████╗ ████║██╔════╝╚══██╔══╝██║  ██║██╔═══██╗██╔══██╗██╔════╝
██████╔╝██████╔╝█████╗█████╗██╔████╔██║███████║██║  ██║█████╗      ██╔████╔██║█████╗     ██║   ███████║██║   ██║██║  ██║███████╗
██╔═══╝ ██╔══██╗██╔══╝╚════╝██║╚██╔╝██║██╔══██║██║  ██║██╔══╝      ██║╚██╔╝██║██╔══╝     ██║   ██╔══██║██║   ██║██║  ██║╚════██║
██║     ██║  ██║███████╗    ██║ ╚═╝ ██║██║  ██║██████╔╝███████╗    ██║ ╚═╝ ██║███████╗   ██║   ██║  ██║╚██████╔╝██████╔╝███████║
╚═╝     ╚═╝  ╚═╝╚══════╝    ╚═╝     ╚═╝╚═╝  ╚═╝╚═════╝ ╚══════╝    ╚═╝     ╚═╝╚══════╝   ╚═╝   ╚═╝  ╚═╝ ╚═════╝ ╚═════╝ ╚══════╝
                                                                                                                                
*/

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Restaurante->recursive = 0;
		$this->set('restaurantes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Restaurante->exists($id)) {
			throw new NotFoundException(__('Invalid restaurante'));
		}
		$options = array('conditions' => array('Restaurante.' . $this->Restaurante->primaryKey => $id));
		$this->set('restaurante', $this->Restaurante->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() 
	{
		if ($this->request->is('post')) {
			$this->Restaurante->create();
			if ($this->Restaurante->save($this->request->data)) {
				$this->Session->setFlash(__('The restaurante has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The restaurante could not be saved. Please, try again.'));
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
		if (!$this->Restaurante->exists($id)) {
			throw new NotFoundException(__('Invalid restaurante'));
		}
		if ($this->request->is(array('post', 'put'))) 
		{
			if ($this->Restaurante->save($this->request->data)) {
				$this->Session->setFlash(__('The restaurante has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The restaurante could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Restaurante.' . $this->Restaurante->primaryKey => $id));
			$this->request->data = $this->Restaurante->find('first', $options);
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
		$this->Restaurante->id = $id;
		if (!$this->Restaurante->exists()) {
			throw new NotFoundException(__('Invalid restaurante'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Restaurante->delete()) {
			$this->Session->setFlash(__('The restaurante has been deleted.'));
		} else {
			$this->Session->setFlash(__('The restaurante could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
