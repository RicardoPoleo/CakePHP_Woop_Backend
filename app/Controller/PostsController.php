<?php
App::uses('AppController', 'Controller');
App::import('Controller', 'Clientes'); 
/**
 * Posts Controller
 *
 * @property Post $Post
 * @property PaginatorComponent $Paginator
 */
class PostsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

	/**
	███╗   ███╗ ██████╗ ██████╗ ██╗██╗     ███████╗    ██╗   ██╗██╗███████╗██╗    ██╗
	████╗ ████║██╔═══██╗██╔══██╗██║██║     ██╔════╝    ██║   ██║██║██╔════╝██║    ██║
	██╔████╔██║██║   ██║██████╔╝██║██║     █████╗      ██║   ██║██║█████╗  ██║ █╗ ██║
	██║╚██╔╝██║██║   ██║██╔══██╗██║██║     ██╔══╝      ╚██╗ ██╔╝██║██╔══╝  ██║███╗██║
	██║ ╚═╝ ██║╚██████╔╝██████╔╝██║███████╗███████╗     ╚████╔╝ ██║███████╗╚███╔███╔╝
	╚═╝     ╚═╝ ╚═════╝ ╚═════╝ ╚═╝╚══════╝╚══════╝      ╚═══╝  ╚═╝╚══════╝ ╚══╝╚══╝ 

	*/

	public function mobile_view($tipo=null, $id=null)
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
			array_push($result['error'], "No se recibio el tipo de perfil que se consulta");			    		
    	}
		
    	if($id==null)
    	{
			$ready 	=	false;
			$result['message']	=	"Fallo";
			array_push($result['error'], "No se recibio el id del perfil que se consulta");			    		
    	}

    	if($ready)
    	{
    		$postList = null;
    		if($tipo=="Cliente")
    		{
    			$this->loadModel('Cliente');
    			$Cliente = $this->Cliente->findAllByCorreo($id);
    			if($Cliente)
    			{
    				unset($Cliente[0]['Cliente']['clave']);
    				$Cliente[0]['Cliente']['image'] = "http://52.24.1.93/img/Avatar/".$Cliente[0]['Cliente']['id'].".jpg";
    				$postList = $this->Post->findAllByEmisorId($Cliente[0]['Cliente']['id']);
    			}
    			else
    			{
					$ready 	=	false;
					$result['message']	=	"Fallo";
					array_push($result['error'], "No existe un cliente asociado a este correo.");			    		    				
    			}
    			$result['cliente_datos']	= $Cliente[0]['Cliente'];
    		}
    		else
    		{
    			$this->loadModel('restaurante');
    			$Restaurante= $this->Restaurante->findAllByRif($id);
    			if($Restaurante)
    			{
    				$postList = $this->Post->findAllByEmisorId($Restaurante[0]['Restaurante']['RIF']);
    			}
    			else
    			{
					$ready 	=	false;
					$result['message']	=	"Fallo";
					array_push($result['error'], "No existe un Restaurante asociado a este RIF.");			    		    				
    			}
    		}

    		$Posts = array();
    		foreach ($postList as $Post) 
    		{
    			if($Post['Post']['imagen'])
    			{
    				$Post['Post']['imagen_url'] = "http://52.24.1.93/img/Posts/".$Post['Post']['id'].".jpg";
    			}
    			array_push($Posts, $Post['Post']);
    		}

    		$result['posts'] = $Posts;
    	}

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

	*/
	public function mobile_add()
	{
   		$this->autoRender=	false;

    	$result = array();
    	$result['error'] 	= array();
    	$result['message']	=	"Exito";
    	$ready 	=	true;

    	//var_dump($_REQUEST);

    	//if(isset($_POST['post']))
    	//{ 
    		$datos = json_decode($_POST['post'],true);

    		if(!isset($datos['emisor_tipo']))
    		{
				$ready 	=	false;
				$result['message']	=	"Fallo";
				array_push($result['error'], "No se recibio el tipo de emisor");
    		}
    		
    		if(!isset($datos['emisor_id']))
    		{
				$ready 	=	false;
				$result['message']	=	"Fallo";
				array_push($result['error'], "No se recibio el id del emisor");
    		}

    		if(!isset($datos['tipo']))
    		{
				$ready 	=	false;
				$result['message']	=	"Fallo";
				array_push($result['error'], "No se recibio el tipo de post");
    		}

    		if(!isset($datos['restaurante_asignado']))
    		{
				$datos['restaurante_asignado']="";
				array_push($result['error'], "Se debe de indicar si tiene un restaurante asignado");
    		}

    		if(!isset($datos['imagen']))
    		{
				array_push($result['error'], "No se recibio la imagen");
    		}

    		if(!isset($datos['post_contenido']))
    		{
				$datos['post_contenido'] = "";
				array_push($result['error'], "No se recibio el contenido del post");
    		}

    		if($ready)
    		{
    			$emisorExiste 	= 	true;
    			$cliente 		=	null;
    			$restaurante 	=	null;

    			if($datos['emisor_tipo']=="Cliente")
    			{
	    			$this->loadModel('Cliente');
	    			$cliente = $this->Cliente->findAllByCorreo($datos['emisor_id']);

	    			if(!$cliente)
	    			{	
	    				$emisorExiste = false;
	    			}
    			}
    			else
    			{
    				$this->loadModel('Restaurante');
    				$restaurante = $this->Restaurante->findAllByRif($datos['emisor_id']);

    				if(!$restaurante)
    				{
    					$emisorExiste = false;
    				}
    			}

    			if($emisorExiste)
    			{
    				$image 		= 	true;
    				$contenido 	= 	true;
	    			$image_bdd 	= 	1;
	    				

	    			if( (!isset($datos['imagen'])) || ($datos['imagen']=="") )
	    			{
	    				$image_bdd 	= 	0;
	    				$image 		= false;
	    			}

					if(!isset($datos['post_contenido']))
					{
						$contenido = false;
					}

					$emisor_id = "";

					if($cliente!=null)
					{
						$emisor_id = $cliente[0]['Cliente']['id'];
					}
					else
					{
						$emisor_id = $restaurante[0]['Restaurante']['RIF'];
					}

					if(($image)||($contenido))
					{

		    			//date_default_timezone_set('America/Panama');
		    			date_default_timezone_set('America/Caracas');
		    			$date = new DateTime();

		    			/*
		    			Este codigo es temporal para no romper los posts.
		    			 */
		    			$promocion 						=	false;
		    			$restaurante_asignado 			= 	false;
		    			$restaurante_asignado_rif 		= 	null;
		    			$restaurante_asignado_nombre 	= 	null;

		    			if(isset($datos['restaurante_asignado']))
		    			{
		    				$restaurante_asignado = $datos['restaurante_asignado'];
		    			}
		    			
		    			if(isset($datos['restaurante_asignado_rif']))
		    			{
		    				$restaurante_asignado_rif = $datos['restaurante_asignado_rif'];
		    			}		    			

		    			if(isset($datos['restaurante_asignado_nombre']))
		    			{
		    				$restaurante_asignado_nombre = $datos['restaurante_asignado_nombre'];
		    			}

		    			if (isset($datos['promocion'])) 
		    			{
		    				$promocion=$datos['promocion'];
		    			}

					    $newPost = array(
					   			'emisor_tipo'	=> 	$datos['emisor_tipo'],
					   			'emisor_id' 	=> 	$emisor_id,
					   			'tipo' 			=>	$datos['tipo'],
					   			'contenido' 	=>	$datos['post_contenido'],
				    			'imagen'		=> 	$image,
				    			'creacion'		=>	$date->format('Y-m-d H:i:s'),	
				    			'promocion' 	=> 	$promocion,
				    			'restaurante_asignado' 			=> $restaurante_asignado,
				    			'restaurante_asignado_rif' 		=> $restaurante_asignado_rif, 
				    			'restaurante_asignado_nombre' 	=> $restaurante_asignado_nombre
				    		);

			    		$resultado = $this->Post->save($newPost);

			    		if($resultado)
			    		{

					    	if( ($datos['tipo']=="Promocion") || ( $promocion ) )
					    	{

								$datos['fecha_inicio'] = strtotime($datos['fecha_inicio']);
								$datos['fecha_inicio'] = $newformat = date('Y-m-d',$datos['fecha_inicio']);
					    		
								$datos['fecha_fin'] = strtotime($datos['fecha_fin']);
								$datos['fecha_fin'] = $newformat = date('Y-m-d',$datos['fecha_fin']);

					    		$newPromotion = array(
					    				'post_id' 		=> 	$this->Post->id,
					    				'fecha_inicio'	=>	$datos['fecha_inicio'],
					    				'fecha_fin'		=>	$datos['fecha_fin']
					    			);

					    		$this->loadModel('Promociones');
					    		$this->Promociones->save($newPromotion);
					    	}		    			
			    			
			    			if($image)
			    			{
			    				
					    		$datos['imagen'] 	= str_replace("-", "+", $datos['imagen']);
								$datos['imagen'] 	= str_replace("_", "/", $datos['imagen']);		

								$data = base64_decode($datos['imagen']);
								$fileName = 'img/Posts/'.$this->Post->id.'.jpg';
								$resultado = file_put_contents($fileName, $data);
								
								if(!$resultado)
								{
									array_push($result['error'], "Error en la carga de la imagen del Post. Intente nuevamente mas tarde.");
								}
								
			    			}

			    			if($datos['emisor_tipo']=="Cliente")
			    			{
								$Cliente = new ClientesController;
								$Cliente->levelingCheck($cliente[0]['Cliente']['id']);			
			    			}
			    		}
			    		else
			    		{
							$ready 	=	false;
							$result['message']	=	"Fallo";
							array_push($result['error'], "Error con la carga del post.");

			    		}

					}
					else
					{
						$ready 	=	false;
						$result['message']	=	"Fallo";
						array_push($result['error'], "Se debe de ingresar al menos una foto o un contenido al post.");						
					}	    			


				} 
				else
				{
					$ready 	=	false;
					$result['message']	=	"Fallo";
					array_push($result['error'], "No existe un perfil asignado al id recibido.");					
				}
			}
		/*}
		else
		{
			$ready 	=	false;
			$result['message']	=	"Fallo";
			array_push($result['error'], "El request recibido no esta en el campo 'post'.");			
		}*/ 
	$this->response->sharable(true, 61);
	$this->response->type('json');
	$this->response->body(json_encode($result));
	return $this->response; 	 
	}

	public function FunctionName($value='')
	{
		# code...
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
		$this->Post->recursive = 0;
		$this->set('posts', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Post->exists($id)) {
			throw new NotFoundException(__('Invalid post'));
		}
		$options = array('conditions' => array('Post.' . $this->Post->primaryKey => $id));
		$this->set('post', $this->Post->find('first', $options));
	}


}
