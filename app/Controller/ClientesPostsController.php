<?php
App::uses('AppController', 'Controller');
/**
 * ClientesPosts Controller
 *
 * @property ClientesPost $ClientesPost
 * @property PaginatorComponent $Paginator
 */
class ClientesPostsController extends AppController {

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
	public function mobile_view($correo=null)
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
			array_push($result['error'], "No se recibio el correo");
    	}

    	if($ready)
    	{
    		$this->loadModel('Cliente');
    		$cliente = $this->Cliente->findAllByCorreo($correo);

    		if($cliente)
    		{
    			$SQL = "SELECT * FROM  `clientes_posts` WHERE  `cliente_id` LIKE  '".$cliente[0]['Cliente']['id']."'";
    			$postsList = $this->ClientesPost->query($SQL);
    			
    			$posts = array();
    			foreach ($postsList as $post) 
    			{
    				unset($post['clientes_posts']['cliente_id']);
    				if($post['clientes_posts']['image'])
    				{
    					$post['clientes_posts']['imageURL'] = "http://52.24.1.93/image/ClientePosts/".$post['clientes_posts']['id'].".jpg";
    				}
    				array_push($posts, $post['clientes_posts']);
    			}

    			$result['posts'] = $posts;
    		}
    		else
    		{
				$ready 	=	false;
				$result['message']	=	"Fallo";
				array_push($result['error'], "No hay un perfil asignado a esa direccion de correo.");
    		}

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

    	if(isset($_POST['post']))
    	{
    		$datos = json_decode($_POST['post'],true);

    		//var_dump($datos); 

    		if(!isset($datos['cliente_correo']))
    		{
				$ready 	=	false;
				$result['message']	=	"Fallo";
				array_push($result['error'], "No se recibio el correo del cliente");
    		}

    		if(!isset($datos['post_descripcion']))
    		{
				$ready 	=	false;
				$result['message']	=	"Fallo";
				array_push($result['error'], "No se recibio la descripcion del post");
    		}

    		if($ready)
    		{
    			$this->loadModel('Cliente');
    			$cliente = $this->Cliente->findAllByCorreo($datos['cliente_correo']);
    			//var_dump($cliente);
    			if($cliente)
    			{
    				$image = true;
	    			if(!isset($datos['post_imagen']))
	    			{
	    				$image = false;
	    			}


	    			//date_default_timezone_set('America/Panama');
	    			date_default_timezone_set('America/Caracas');
	    			$date = new DateTime();

		    		$newPost = array(
		    				'cliente_id' 	=> 	$cliente[0]['Cliente']['id'],
		    				'descripcion' 	=>	$datos['post_descripcion'],
		    				'image'			=> 	$image,
		    				'creacion'		=>	$date->format('Y-m-d H:i:s')	
		    			);

		    		//H:i:s
		    		$resultado = $this->ClientesPost->save($newPost);

		    		if($resultado && $image)
		    		{
		    			
						$data = base64_decode($datos['restaurante_imagen']);
							
						$fileName = 'img/ClientePosts/'.$resultado['ClientesPost']['id'].'.jpg';
						$resultado = file_put_contents($fileName, $data);
						
						if(!$resultado)
						{
							array_push($result['error'], "Error en la carga del avatar. Intente nuevamente mas tarde.");
						}						
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
			array_push($result['error'], "El request no contiene datos en el campo 'post'");    		
    	}

		//$this->response->sharable(true, 61);
		//$this->response->type('json');
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
		$this->ClientesPost->recursive = 0;
		$this->set('clientesPosts', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ClientesPost->exists($id)) {
			throw new NotFoundException(__('Invalid clientes post'));
		}
		$options = array('conditions' => array('ClientesPost.' . $this->ClientesPost->primaryKey => $id));
		$this->set('clientesPost', $this->ClientesPost->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ClientesPost->create();
			if ($this->ClientesPost->save($this->request->data)) {
				$this->Session->setFlash(__('The clientes post has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The clientes post could not be saved. Please, try again.'));
			}
		}
		$clientes = $this->ClientesPost->Cliente->find('list');
		$this->set(compact('clientes'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->ClientesPost->exists($id)) {
			throw new NotFoundException(__('Invalid clientes post'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ClientesPost->save($this->request->data)) {
				$this->Session->setFlash(__('The clientes post has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The clientes post could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ClientesPost.' . $this->ClientesPost->primaryKey => $id));
			$this->request->data = $this->ClientesPost->find('first', $options);
		}
		$clientes = $this->ClientesPost->Cliente->find('list');
		$this->set(compact('clientes'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->ClientesPost->id = $id;
		if (!$this->ClientesPost->exists()) {
			throw new NotFoundException(__('Invalid clientes post'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->ClientesPost->delete()) {
			$this->Session->setFlash(__('The clientes post has been deleted.'));
		} else {
			$this->Session->setFlash(__('The clientes post could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
