<?php
App::uses('AppController', 'Controller');
/**
 * Posts Controller
 *
 * @property Comentario $Comentario
 * @property PaginatorComponent $Paginator
 */
class ComentariosController extends AppController 
{

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');


	public function mobile_delete($comment_id=null)
	{
   		$this->autoRender=	false;

    	$result = array();
    	$result['error'] 	= array();
    	$result['message']	=	"Exito";
    	$ready 	=	true;

		if($comment_id==null)
		{
			$ready 	=	false;
			$result['message']	=	"Fallo";
			array_push($result['error'], "No se recibio id del Post");
		}

		if($ready)
		{
			$resultado = $this->Comentario->findAllById($comment_id);

			if($resultado)
			{
				$this->Comentario->delete($comment_id);
			}
			else
			{
				$ready 	=	false;
				$result['message']	=	"Fallo";
				array_push($result['error'], "El Id recibido no corresponde a ningun comentario");
			}

		}

		$this->response->sharable(true, 61);
		$this->response->type('json');
		$this->response->body(json_encode($result));
		return $this->response;    	 
	}


	/**
	███╗   ███╗ ██████╗ ██████╗ ██╗██╗     ███████╗    ██╗     ██╗███████╗████████╗     ██████╗ ██████╗ ███╗   ███╗███╗   ███╗███████╗███╗   ██╗████████╗███████╗
	████╗ ████║██╔═══██╗██╔══██╗██║██║     ██╔════╝    ██║     ██║██╔════╝╚══██╔══╝    ██╔════╝██╔═══██╗████╗ ████║████╗ ████║██╔════╝████╗  ██║╚══██╔══╝██╔════╝
	██╔████╔██║██║   ██║██████╔╝██║██║     █████╗      ██║     ██║███████╗   ██║       ██║     ██║   ██║██╔████╔██║██╔████╔██║█████╗  ██╔██╗ ██║   ██║   ███████╗
	██║╚██╔╝██║██║   ██║██╔══██╗██║██║     ██╔══╝      ██║     ██║╚════██║   ██║       ██║     ██║   ██║██║╚██╔╝██║██║╚██╔╝██║██╔══╝  ██║╚██╗██║   ██║   ╚════██║
	██║ ╚═╝ ██║╚██████╔╝██████╔╝██║███████╗███████╗    ███████╗██║███████║   ██║       ╚██████╗╚██████╔╝██║ ╚═╝ ██║██║ ╚═╝ ██║███████╗██║ ╚████║   ██║   ███████║
	╚═╝     ╚═╝ ╚═════╝ ╚═════╝ ╚═╝╚══════╝╚══════╝    ╚══════╝╚═╝╚══════╝   ╚═╝        ╚═════╝ ╚═════╝ ╚═╝     ╚═╝╚═╝     ╚═╝╚══════╝╚═╝  ╚═══╝   ╚═╝   ╚══════╝
	                                                                                                                                                             
	*/
	public function mobile_listComments($post_id=null)
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
			array_push($result['error'], "No se recibio id del Post");
		}

		if($ready)
		{
			$commentsList = $this->Comentario->findAllByPostId($post_id);
			$comments=array();
			$this->loadModel('Cliente');
			foreach ($commentsList as $comment) 
			{
				$comment_owner = $this->Cliente->findAllById($comment['Comentario']['owner_id']);
				unset($comment_owner[0]['Cliente']['clave']);
				$comment['Comentario']['owner_info']=$comment_owner[0]['Cliente'];
				array_push($comments, $comment['Comentario']);
			}

			$result['comments'] = $comments;
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

    	/*
    	$_POST['comentario'] = '{
			"post_id": 11,
			"contenido": "Esto es un comentario de prueba",
			"comentario_owner_correo": "ricardopoleo@gmail.com"
		}';
		*/

    	if(isset($_POST['comentario']))
    	{
    		//var_dump($_POST['comentario']);

    		$datos = json_decode($_POST['comentario'],true);

    		//var_dump($datos);

    		if(!isset($datos['post_id']))
    		{
				$ready 	=	false;
				$result['message']	=	"Fallo";
				array_push($result['error'], "No se recibio el id del Post");
    		}
    		
    		if(!isset($datos['comentario_owner_correo']))
    		{
				$ready 	=	false;
				$result['message']	=	"Fallo";
				array_push($result['error'], "No se recibio el correo del usuario que hace el comentario");
    		}

    		if(!isset($datos['contenido']))
    		{
				$ready 	=	false;
				$result['message']	=	"Fallo";
				array_push($result['error'], "No se recibio el contenido del comentario.");
    		}


    		if($ready)
    		{
				$this->loadModel('Cliente');
    			$Cliente 		= 	$this->Cliente->findAllByCorreo($datos['comentario_owner_correo']);

    			$postCreationTime = date("Y-m-d H:i:s");

    			$comentario 	= 	array(
    				'post_id'	=>	$datos['post_id'],
    				'owner_id'	=>	$Cliente[0]['Cliente']['id'],
    				'content'	=>	$datos['contenido'],
    				'creacion'	=>	$postCreationTime
    				);

    			$resultado = $this->Comentario->save($comentario);

    			if(!$resultado)
    			{
					$ready 	=	false;
					$result['message']	=	"Fallo";
					array_push($result['error'], "Hubo un error al crear el comentario.");    				
    			/**/
    			}
    			else
    			{
    				$result['comment_id'] =	$this->Comentario->getInsertID();
    			}
			}
		}
		else
		{
			$ready 	=	false;
			$result['message']	=	"Fallo";
			array_push($result['error'], "El request recibido no esta en el campo 'post'.");			
		} 
	$this->response->sharable(true, 61);
	$this->response->type('json');
	$this->response->body(json_encode($result));
	return $this->response; 	 
	}


}
