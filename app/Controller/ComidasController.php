<?php
App::uses('AppController', 'Controller');
/**
 * Comidas Controller
 *
 * @property Comida $Comida
 * @property PaginatorComponent $Paginator
 */
class ComidasController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

	/**
	███╗   ███╗ ██████╗ ██████╗ ██╗██╗     ███████╗    ██╗     ██╗███████╗████████╗
	████╗ ████║██╔═══██╗██╔══██╗██║██║     ██╔════╝    ██║     ██║██╔════╝╚══██╔══╝
	██╔████╔██║██║   ██║██████╔╝██║██║     █████╗      ██║     ██║███████╗   ██║   
	██║╚██╔╝██║██║   ██║██╔══██╗██║██║     ██╔══╝      ██║     ██║╚════██║   ██║   
	██║ ╚═╝ ██║╚██████╔╝██████╔╝██║███████╗███████╗    ███████╗██║███████║   ██║   
	╚═╝     ╚═╝ ╚═════╝ ╚═════╝ ╚═╝╚══════╝╚══════╝    ╚══════╝╚═╝╚══════╝   ╚═╝   
	                                                                               	
	*/
	public function mobile_list()
	{
    	$this->autoRender=	false;

    	$result = array();
    	$result['error'] 	= array();
    	$result['message']	=	"Exito";
    	$ready 	=	true; 

    	$listaComidas = $this->Comida->query("SELECT * FROM  `comidas`");

    	$comidas = array();
    	foreach ($listaComidas as $comida) 
    	{
    		array_push($comidas, $comida['comidas']['tipo']);
    	}

    	$result['comidas'] = $comidas;

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
		$this->Comida->recursive = 0;
		$this->set('comidas', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Comida->exists($id)) {
			throw new NotFoundException(__('Invalid comida'));
		}
		$options = array('conditions' => array('Comida.' . $this->Comida->primaryKey => $id));
		$this->set('comida', $this->Comida->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Comida->create();
			if ($this->Comida->save($this->request->data)) {
				$this->Session->setFlash(__('The comida has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The comida could not be saved. Please, try again.'));
			}
		}
		$restaurantes = $this->Comida->Restaurante->find('list');
		$this->set(compact('restaurantes'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Comida->exists($id)) {
			throw new NotFoundException(__('Invalid comida'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Comida->save($this->request->data)) {
				$this->Session->setFlash(__('The comida has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The comida could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Comida.' . $this->Comida->primaryKey => $id));
			$this->request->data = $this->Comida->find('first', $options);
		}
		$restaurantes = $this->Comida->Restaurante->find('list');
		$this->set(compact('restaurantes'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Comida->id = $id;
		if (!$this->Comida->exists()) {
			throw new NotFoundException(__('Invalid comida'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Comida->delete()) {
			$this->Session->setFlash(__('The comida has been deleted.'));
		} else {
			$this->Session->setFlash(__('The comida could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
