<?php
App::uses('AppController', 'Controller');
App::import('Controller', 'Clientes'); 
/**
 * Likes Controller
 *
 * @property Like $Like
 * @property PaginatorComponent $Paginator
 */
class LikesController extends AppController 
{

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

	/**
	███╗   ███╗ ██████╗ ██████╗ ██╗██╗     ███████╗    ██╗   ██╗███╗   ██╗██╗     ██╗██╗  ██╗███████╗    ██████╗  ██████╗ ███████╗████████╗
	████╗ ████║██╔═══██╗██╔══██╗██║██║     ██╔════╝    ██║   ██║████╗  ██║██║     ██║██║ ██╔╝██╔════╝    ██╔══██╗██╔═══██╗██╔════╝╚══██╔══╝
	██╔████╔██║██║   ██║██████╔╝██║██║     █████╗      ██║   ██║██╔██╗ ██║██║     ██║█████╔╝ █████╗      ██████╔╝██║   ██║███████╗   ██║   
	██║╚██╔╝██║██║   ██║██╔══██╗██║██║     ██╔══╝      ██║   ██║██║╚██╗██║██║     ██║██╔═██╗ ██╔══╝      ██╔═══╝ ██║   ██║╚════██║   ██║   
	██║ ╚═╝ ██║╚██████╔╝██████╔╝██║███████╗███████╗    ╚██████╔╝██║ ╚████║███████╗██║██║  ██╗███████╗    ██║     ╚██████╔╝███████║   ██║   
	╚═╝     ╚═╝ ╚═════╝ ╚═════╝ ╚═╝╚══════╝╚══════╝     ╚═════╝ ╚═╝  ╚═══╝╚══════╝╚═╝╚═╝  ╚═╝╚══════╝    ╚═╝      ╚═════╝ ╚══════╝   ╚═╝                                                                                                                                        
	*/
	public function mobile_unLikePost($post_id=null, $post_liker_email=null)
	{
   		$this->autoRender=	false;

    	$result = array();
    	$result['error'] 	= array();
    	$result['message']	=	"Exito";
    	$ready 	=	true;

    	if($post_id==null)
    	{
			$ready 	=	false;
			$result['message']	=	"Fallo";
			array_push($result['error'], "No se recibio el id del post");
    	}

    	if($post_liker_email==null)
    	{
			$ready 	=	false;
			$result['message']	=	"Fallo";
			array_push($result['error'], "No se recibio el correo del usuario");
    	}

		if($ready)
		{
			$this->loadModel('Cliente');
			$Cliente 		= 	$this->Cliente->findAllByCorreo($post_liker_email);
		
			$likeToDelete 	= 	$this->Like->findAllByPostIdAndPostLikerId($post_id, $Cliente[0]['Cliente']['id']);
			if($likeToDelete)
			{
				$resultado 		= 	$this->Like->delete($likeToDelete[0]['Like']['id']);
			
				if(!$resultado)
				{
					$ready 	=	false;
					$result['message']	=	"Fallo";
					array_push($result['error'], "No se pudo borrar el like.");
				}
			}
			else
			{
				$ready 	=	false;
				$result['message']	=	"Fallo";
				array_push($result['error'], "No existe un like asociado a esta combinacion Post/Usuario.");
			}
		}

		$this->response->sharable(true, 61);
		$this->response->type('json');
		$this->response->body(json_encode($result));
		return $this->response;    	 
	}


	/*
	Post Id: es el ID del Post
	Post Owner Type: Es el tipo de perfil del dueno del post
	Post Owner Id: es el ID del dueno del Post
	Post Liker Type: es el tipo de perfil que le hace like al post
	Post Liker id: es el ID del perfil que le dio like al Post	
	*/

	/**
		███╗   ███╗ ██████╗ ██████╗ ██╗██╗     ███████╗    ██╗     ██╗██╗  ██╗███████╗    ██████╗  ██████╗ ███████╗████████╗
		████╗ ████║██╔═══██╗██╔══██╗██║██║     ██╔════╝    ██║     ██║██║ ██╔╝██╔════╝    ██╔══██╗██╔═══██╗██╔════╝╚══██╔══╝
		██╔████╔██║██║   ██║██████╔╝██║██║     █████╗      ██║     ██║█████╔╝ █████╗      ██████╔╝██║   ██║███████╗   ██║   
		██║╚██╔╝██║██║   ██║██╔══██╗██║██║     ██╔══╝      ██║     ██║██╔═██╗ ██╔══╝      ██╔═══╝ ██║   ██║╚════██║   ██║   
		██║ ╚═╝ ██║╚██████╔╝██████╔╝██║███████╗███████╗    ███████╗██║██║  ██╗███████╗    ██║     ╚██████╔╝███████║   ██║   
		╚═╝     ╚═╝ ╚═════╝ ╚═════╝ ╚═╝╚══════╝╚══════╝    ╚══════╝╚═╝╚═╝  ╚═╝╚══════╝    ╚═╝      ╚═════╝ ╚══════╝   ╚═╝   
		                                                                                                                    
	*/
	public function mobile_likePost($post_id =null, $post_owner_type =null, $post_owner_id= null, $post_liker_email = null) 
	{
		$this->autoRender 	=	false;
		$result  			= 	array();
		$result['error'] 	= 	array();
		$result['message']	=	"Exito";
		$ready 				=	true; 

		$this->loadModel('Cliente');
		$this->loadModel('Notificacione');
		if($post_id == null) 
		{
			$ready 				=	false;
			$result['message']	=	"Fallo";
			array_push($result['error'], "Falta el ID del Post");  							
		}
		
		if($post_owner_id==null)
		{
			$ready 				=	false;
			$result['message']	=	"Fallo";
			array_push($result['error'], "Falta el ID del dueno del post");  							
		}
		
		if($post_owner_type==null)
		{
			$ready 				=	false;
			$result['message']	=	"Fallo";
			array_push($result['error'], "Falta el tipo del perfil del dueno del post");  							
		}

		if($post_liker_email == null)
		{
			$ready 				=	false;
			$result['message']	=	"Fallo";
			array_push($result['error'], "Falta el correo del perfil");  							
		}

		if($ready)
		{
    		$cliente 		= 	$this->Cliente->findAllByCorreo($post_liker_email);
    		$post_liker_id 	=	$cliente[0]['Cliente']['id'];

    		$likedBefore 	=	$this->Like->findAllByPostIdAndPostLikerId($post_id,$post_liker_id);

    		if(!$likedBefore)
    		{
				$liked = array(
								'post_id' 			=> 	$post_id,
								'post_owner_type' 	=>	$post_owner_type,
								'post_owner_id'		=>	$post_owner_id,
								'post_liker_type'	=>	'Cliente',
								'post_liker_id'		=>	$post_liker_id,
								'creation' 			=> 	date("Y-m-d H:i:s")
					);

				$resultado = $this->Like->save($liked);
				if($resultado)
				{

	    			//cliente_id: es el ID del cliente que desencadeno este evento.
	    			//evento_receptor_id: es el ID del Perfil que recibe el evento desencadenante.
	    			//evento_receptor_tipo: es el tipo del Perfil que recibe el evento desencadenante. Restaurante o Cliente 
	    			//evento_tipo: es el tipo de evento que desencadeno esta notificacion. En este caso es "Like"
	    			//evento_desencadenante_id: es el ID del evento que genera esta notificacion. En este caso, el ID del Like.

					$newNotificacion = array(
									'cliente_id'				=>	$post_liker_id,
									'evento_receptor_id'		=>	$post_owner_id,
									'evento_receptor_tipo'		=>	$post_owner_type,
									'evento_tipo'				=>	"Like",
									'evento_desencadenante_id'	=>	$post_id
						);

					$resultado = $this->Notificacione->save($newNotificacion);

					if($resultado)
					{
						$Cliente = new ClientesController;
						$Cliente->levelingCheck($post_liker_id);	
					}
				}
    		}
    		else
    		{
				$ready 				=	false;
				$result['message']	=	"Fallo";
				array_push($result['error'], "Ya se habia hecho like previamente a este post.");  
    		}
		}

		$this->response->sharable(true, 61);
		$this->response->type('json');
		$this->response->body(json_encode($result));
		return $this->response;		
	}

}
