<?php
App::uses('AppController', 'Controller');
/**
 * Clientes Controller
 *
 * @property Cliente $Cliente
 * @property PaginatorComponent $Paginator
 */
class ClientesController extends AppController 
{
	public $uses = array('PerfilesSociale','Cliente','ClientesComida','ClientesSeguimiento');

/**
                                                                                                                                
▄ ██╗▄▄ ██╗▄▄ ██╗▄▄ ██╗▄▄ ██╗▄▄ ██╗▄▄ ██╗▄▄ ██╗▄▄ ██╗▄▄ ██╗▄▄ ██╗▄▄ ██╗▄▄ ██╗▄▄ ██╗▄▄ ██╗▄▄ ██╗▄▄ ██╗▄▄ ██╗▄▄ ██╗▄▄ ██╗▄▄ ██╗▄  
 ████╗ ████╗ ████╗ ████╗ ████╗ ████╗ ████╗ ████╗ ████╗ ████╗ ████╗ ████╗ ████╗ ████╗ ████╗ ████╗ ████╗ ████╗ ████╗ ████╗ ████╗  
▀╚██╔▀▀╚██╔▀▀╚██╔▀▀╚██╔▀▀╚██╔▀▀╚██╔▀▀╚██╔▀▀╚██╔▀▀╚██╔▀▀╚██╔▀▀╚██╔▀▀╚██╔▀▀╚██╔▀▀╚██╔▀▀╚██╔▀▀╚██╔▀▀╚██╔▀▀╚██╔▀▀╚██╔▀▀╚██╔▀▀╚██╔▀  
  ╚═╝   ╚═╝   ╚═╝   ╚═╝   ╚═╝   ╚═╝   ╚═╝   ╚═╝   ╚═╝   ╚═╝   ╚═╝   ╚═╝   ╚═╝   ╚═╝   ╚═╝   ╚═╝   ╚═╝   ╚═╝   ╚═╝   ╚═╝   ╚═╝   
                                                                                                                                
                                                                                                                                
      ███╗   ███╗ ██████╗ ██████╗ ██╗██╗     ███████╗    ███╗   ███╗███████╗████████╗██╗  ██╗ ██████╗ ██████╗ ███████╗          
▄ ██╗▄████╗ ████║██╔═══██╗██╔══██╗██║██║     ██╔════╝    ████╗ ████║██╔════╝╚══██╔══╝██║  ██║██╔═══██╗██╔══██╗██╔════╝    ▄ ██╗▄
 ████╗██╔████╔██║██║   ██║██████╔╝██║██║     █████╗      ██╔████╔██║█████╗     ██║   ███████║██║   ██║██║  ██║███████╗     ████╗
▀╚██╔▀██║╚██╔╝██║██║   ██║██╔══██╗██║██║     ██╔══╝      ██║╚██╔╝██║██╔══╝     ██║   ██╔══██║██║   ██║██║  ██║╚════██║    ▀╚██╔▀
  ╚═╝ ██║ ╚═╝ ██║╚██████╔╝██████╔╝██║███████╗███████╗    ██║ ╚═╝ ██║███████╗   ██║   ██║  ██║╚██████╔╝██████╔╝███████║      ╚═╝ 
      ╚═╝     ╚═╝ ╚═════╝ ╚═════╝ ╚═╝╚══════╝╚══════╝    ╚═╝     ╚═╝╚══════╝   ╚═╝   ╚═╝  ╚═╝ ╚═════╝ ╚═════╝ ╚══════╝          
                                                                                                                                
                                                                                                                                
▄ ██╗▄▄ ██╗▄▄ ██╗▄▄ ██╗▄▄ ██╗▄▄ ██╗▄▄ ██╗▄▄ ██╗▄▄ ██╗▄▄ ██╗▄▄ ██╗▄▄ ██╗▄▄ ██╗▄▄ ██╗▄▄ ██╗▄▄ ██╗▄▄ ██╗▄▄ ██╗▄▄ ██╗▄▄ ██╗▄▄ ██╗▄  
 ████╗ ████╗ ████╗ ████╗ ████╗ ████╗ ████╗ ████╗ ████╗ ████╗ ████╗ ████╗ ████╗ ████╗ ████╗ ████╗ ████╗ ████╗ ████╗ ████╗ ████╗  
▀╚██╔▀▀╚██╔▀▀╚██╔▀▀╚██╔▀▀╚██╔▀▀╚██╔▀▀╚██╔▀▀╚██╔▀▀╚██╔▀▀╚██╔▀▀╚██╔▀▀╚██╔▀▀╚██╔▀▀╚██╔▀▀╚██╔▀▀╚██╔▀▀╚██╔▀▀╚██╔▀▀╚██╔▀▀╚██╔▀▀╚██╔▀  
  ╚═╝   ╚═╝   ╚═╝   ╚═╝   ╚═╝   ╚═╝   ╚═╝   ╚═╝   ╚═╝   ╚═╝   ╚═╝   ╚═╝   ╚═╝   ╚═╝   ╚═╝   ╚═╝   ╚═╝   ╚═╝   ╚═╝   ╚═╝   ╚═╝   
                                                                                                                                
                                                                                                                                
*/

	/**
	██████╗  █████╗ ███████╗███████╗    ███╗   ███╗███████╗████████╗██╗  ██╗ ██████╗ ██████╗ 
	██╔══██╗██╔══██╗██╔════╝██╔════╝    ████╗ ████║██╔════╝╚══██╔══╝██║  ██║██╔═══██╗██╔══██╗
	██████╔╝███████║███████╗█████╗      ██╔████╔██║█████╗     ██║   ███████║██║   ██║██║  ██║
	██╔══██╗██╔══██║╚════██║██╔══╝      ██║╚██╔╝██║██╔══╝     ██║   ██╔══██║██║   ██║██║  ██║
	██████╔╝██║  ██║███████║███████╗    ██║ ╚═╝ ██║███████╗   ██║   ██║  ██║╚██████╔╝██████╔╝
	╚═════╝ ╚═╝  ╚═╝╚══════╝╚══════╝    ╚═╝     ╚═╝╚══════╝   ╚═╝   ╚═╝  ╚═╝ ╚═════╝ ╚═════╝ 
	                                                                                         
	*/
	public function mobile($test=null)
	{
   		$this->autoRender=	false;

    	$result = array();
    	$result['error'] 	= array();
    	$result['message']	=	"Exito";
    	$ready 	=	true;

    	if(isset($_POST['cliente']))
    	{
	    	$datos = json_decode($_POST['cliente'], true);

			if(!isset($datos['cliente_parametro']))
			{
				$ready 	=	false;
				$result['message']	=	"Fallo";
				array_push($result['error'], "No se recibio EL PAPAMETRO");
			}
		}
		else
		{
			$ready 	=	false;
			$result['message']	=	"Fallo";
			array_push($result['error'], "El request no es POST");  			
		}

		if($ready)
		{

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
	                                                                         	
	*/
	public function confirmar($correo=null)
	{
		$SERVIDOR = "52.24.1.93";
    	$this->autoRender=	false;

    	$result = array();
    	$result['error'] = array();
    	$result['message']	=	"Exito";
    	$ready 	=	true; 

		$status = "";
		if($correo!=null)
		{
			$clientePorConfirmar 	=	$this->Cliente->findAllByCorreo($correo);
			
			if($clientePorConfirmar)
			{
				//var_dump($clientePorConfirmar);
				if($clientePorConfirmar[0]['Cliente']['estatus'] !="Confirmado")
				{
					$clientePorConfirmar[0]['Cliente']['estatus'] = "Confirmado";
					$this->Cliente->save($clientePorConfirmar[0]);
					$status = "Confirmado";
				}
				else
				{
					$status = "Correo previamente confirmado";
				}
			}
			else
			{
				$status = "Correo inexistente";
			}
		}
		else
		{
			$status = "No hay correo";
		}

		echo $status;

		//$this->response->sharable(true, 61);
		//$this->response->type('json');
		//$this->response->body(json_encode($result));
		return $this->response;		
	}

/**
	███╗   ███╗ ██████╗ ██████╗ ██╗██╗     ███████╗     █████╗ ██╗   ██╗ █████╗ ████████╗ █████╗ ██████╗     ███████╗██████╗ ██╗████████╗
	████╗ ████║██╔═══██╗██╔══██╗██║██║     ██╔════╝    ██╔══██╗██║   ██║██╔══██╗╚══██╔══╝██╔══██╗██╔══██╗    ██╔════╝██╔══██╗██║╚══██╔══╝
	██╔████╔██║██║   ██║██████╔╝██║██║     █████╗      ███████║██║   ██║███████║   ██║   ███████║██████╔╝    █████╗  ██║  ██║██║   ██║   
	██║╚██╔╝██║██║   ██║██╔══██╗██║██║     ██╔══╝      ██╔══██║╚██╗ ██╔╝██╔══██║   ██║   ██╔══██║██╔══██╗    ██╔══╝  ██║  ██║██║   ██║   
	██║ ╚═╝ ██║╚██████╔╝██████╔╝██║███████╗███████╗    ██║  ██║ ╚████╔╝ ██║  ██║   ██║   ██║  ██║██║  ██║    ███████╗██████╔╝██║   ██║   
	╚═╝     ╚═╝ ╚═════╝ ╚═════╝ ╚═╝╚══════╝╚══════╝    ╚═╝  ╚═╝  ╚═══╝  ╚═╝  ╚═╝   ╚═╝   ╚═╝  ╚═╝╚═╝  ╚═╝    ╚══════╝╚═════╝ ╚═╝   ╚═╝   
	                                                                                                                                     
*/
	public function mobile_avatar_edit()
	{
   		$this->autoRender=	false;

    	$result = array();
    	$result['error'] 	= array();
    	$result['message']	=	"Exito";
    	$ready 	=	true;

    	if(isset($_POST['cliente_avatar']))
    	{
	    	$datos = json_decode($_POST['cliente_avatar'], true);

			if(!isset($datos['cliente_imagen']))
			{
				$ready 	=	false;
				$result['message']	=	"Fallo";
				array_push($result['error'], "No se recibio la imagen");
			}

			if(!isset($datos['cliente_correo']))
			{
				$ready 	=	false;
				$result['message']	=	"Fallo";
				array_push($result['error'], "No se recibio la imagen");
			}
		}
		else
		{
			$ready 	=	false;
			$result['message']	=	"Fallo";
			array_push($result['error'], "El request no es POST");  			
		}

		if($ready)
		{
			$Cliente 	=	$this->Cliente->findAllByCorreo($datos['cliente_correo']);

			//$imagenOriginal = "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";
			$resultadoSinEspacios 	= 	str_replace("-", 	"+", $datos['cliente_imagen']);
			$resultadoConBackSlash 	= 	str_replace("_", 	"/", $resultadoSinEspacios);

			$data 	= $resultadoConBackSlash; 

			$fileName = 'img/Avatar/'.$Cliente[0]['Cliente']['id'].'.jpg';
			$resultadoImagen = file_put_contents($fileName, $data);
			if(!$resultadoImagen)
			{
				array_push($result['error'], "Error en la carga de archivos. Intente subir la imagen de perfil mas tarde.");
			}
			else
			{
				$result['image']	=	"http://52.24.1.93/".$fileName;
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
	/*
		OJO: A esta funcion falta agregarle el encriptado del correo al que le vamos a enviar la confirmacion, para que no sea tan boleta la url.		
	*/		

	public function mobile_add()
	{
		$SERVIDOR = "52.24.1.93";
    	$this->autoRender=	false;

    	$result = array();
    	$result['error'] = array();
    	$result['message']	=	"Exito";
    	$ready 	=	true;
    	$image 	= true; 

    	if(isset($_POST['cliente']))
    	{
	    	$datos = json_decode($_POST['cliente'], true);

			if(!isset($datos['cliente_correo']))
			{
				$ready 	=	false;
				$result['message']	=	"Fallo";
				array_push($result['error'], "No se recibio el correo");
			}

			if(!isset($datos['cliente_nombre']))
			{
				$ready 	=	false;
				$result['message']	=	"Fallo";
				array_push($result['error'], "No se recibio el nombre");
			}

			if(!isset($datos['cliente_apellido']))
			{
				$ready 	=	false;
				$result['message']	=	"Fallo";
				array_push($result['error'], "No se recibio el apellido");
			}

			if(!isset($datos['cliente_nivel']))
			{
				$ready 	=	false;
				$result['message']	=	"Fallo";
				array_push($result['error'], "No se recibio el nivel del cliente");
			}	

			if(!isset($datos['cliente_dispositivo']))
			{
				$ready 	=	false;
				$result['message']	=	"Fallo";
				array_push($result['error'], "No se recibio el tipo de dispositivo");
			}

			if(!isset($datos['cliente_huella']))
			{
				$ready 	=	false;
				$result['message']	=	"Fallo";
				array_push($result['error'], "No se recibio la huella del dispositivo");
			}

			if(!isset($datos['cliente_clave']))
			{
				$ready 	=	false;
				$result['message']	=	"Fallo";
				array_push($result['error'], "No se recibio la clave del cliente");
			}

			if(!isset($datos['cliente_sexo']))
			{
				$ready 	=	false;
				$result['message']	=	"Fallo";
				array_push($result['error'], "No se recibio el sexo del cliente");
			}

			if(!isset($datos['cliente_nacimiento']))
			{
				$ready 	=	false;
				$result['message']	=	"Fallo";
				array_push($result['error'], "No se recibio la fecha de nacimiento del cliente");
			}

			if(!isset($datos['cliente_imagen']))
			{
				$image 	=	false;
				array_push($result['error'], "No se recibio la imagen del perfil. Se asignara una por defecto.");
			}
			
			
			if(!isset($datos['cliente_alias']))
			{
				//$ready 	=	false;
				//$result['message']	=	"Fallo";
				$datos['cliente_alias'] = null;
				//var_dump($datos['cliente_alias']);
				array_push($result['error'], "No se recibio el alias");
			}
			
    	}
    	else
    	{
			$ready 	=	false;
			$result['message']	=	"Fallo";
			array_push($result['error'], "No se recibio el POST por el parametro 'cliente'.");    		
    	}


		if($ready)
		{
			$clienteExistente = $this->Cliente->findAllByCorreo($datos['cliente_correo']);

			if(count($clienteExistente)>0)
			{
				$result['message']	=	"Fallo";
				array_push($result['error'], "Ya existe un cliente con ese Correo registrado.");
			}
			else
			{
				
				if($datos['cliente_alias']==null)
				{				
					$rawAlias					= 	explode("@", $datos['cliente_correo']);
					$datos['cliente_alias'] 	=	$rawAlias[0];
				}

				$birthDay = strtotime($datos['cliente_nacimiento']);
				$datos['cliente_nacimiento'] = $newformat = date('Y-m-d',$birthDay);
 
				$Cliente = array(
								'Cliente'=> array(
										'correo'		=> 	$datos['cliente_correo'],
										'nombre'		=>	$datos['cliente_nombre'],
										'apellido'		=>	$datos['cliente_apellido'],
										'nivel'			=> 	$datos['cliente_nivel'],
										'dispositivo'	=>	$datos['cliente_dispositivo'],
										'huella'		=>	$datos['cliente_huella'],
										'clave'			=>	$datos['cliente_clave'],
										'sexo'			=>	$datos['cliente_sexo'],
										'nacimiento'	=>	$datos['cliente_nacimiento'],
										'alias'			=>	$datos['cliente_alias'],
										'estatus'		=>	'Por Confirmar',
										'tipo'			=> 	'Normal'
									)
					);

				$resultado = $this->Cliente->save($Cliente);

				if($resultado)
				{

					//Registramos las preferencias
					$preferencias = array();
					foreach ($datos['cliente_preferencias'] as $preferencia) 
					{
						$r = array(
							'ClientesComida' => array(
								'cliente_correo'	=> $datos['cliente_correo'],
								'comida'			=> $preferencia
								)
							);
						array_push($preferencias, $r);	
					}

					$this->loadModel('ClientesComida');
					$this->ClientesComida->saveAll($preferencias);

					$data = "";


					if($image)
					{
						//var_dump("Entramos a guardar la imagen como si la hubieras enviado.")
			    		$datos['cliente_imagen'] 	= str_replace("-", 	"+", $datos['cliente_imagen']);
						$datos['cliente_imagen'] 	= str_replace("_", "/", $datos['cliente_imagen']);
						$data = base64_decode($datos['cliente_imagen']);	
					}
					else
					{
						//var_dump("Entramos en el by default");
						$data = base64_decode("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");							
					}

					$fileName = 'img/Avatar/'.$this->Cliente->id.'.jpg';
					$resultadoImagen = file_put_contents($fileName, $data);
					if(!$resultadoImagen)
					{
						array_push($result['error'], "Error en la carga de archivos. Intente subir la imagen de perfil mas tarde.");
					}
					else
					{
						$result['image']	=	"http://52.24.1.93/".$fileName;
					}

					//Aqui realizamos el autofollow
	    			date_default_timezone_set('America/Caracas');
	    			$date = new DateTime();

					$nuevoSeguimiento = array(
							    				'cliente_id' 		=> 	$this->Cliente->id,
							    				'seguimiento_tipo' 	=>	"Cliente",
							    				'seguimiento_id'	=> 	$this->Cliente->id,
							    				'creacion'			=>	$date->format('Y-m-d H:i:s')	
							    			);

					$resultado = $this->ClientesSeguimiento->save($nuevoSeguimiento);					


					$to      = 	$datos['cliente_correo'];
					$subject = 	'Verificacion de cuenta para el Cliente';
					$message = 	'<html> <body> Mensaje de confirmacion, por favor haz click en este <a href="http://'.$SERVIDOR.'/Clientes/confirmar/'.$datos['cliente_correo'].'/"> link </a> para confirmar tu cuenta. </body> </html>';
					$headers = 	'From: confirmaciones@woop.com' . "\r\n" .
								"MIME-Version: 1.0\r\n".
								"Content-Type: text/html; charset=ISO-8859-1\r\n".
					    		'Reply-To: noreply@woop.com' . "\r\n" .
					    		'X-Mailer: PHP/' . phpversion();

					mail($to, $subject, $message, $headers);
				}
			}
		}

		$this->response->sharable(true, 61);
		$this->response->type('json');
		$this->response->body(json_encode($result));
		return $this->response;		
	}




	/**
	███╗   ███╗ ██████╗ ██████╗ ██╗██╗     ███████╗     █████╗ ██████╗ ██████╗     ███████╗ ██████╗  ██████╗██╗ █████╗ ██╗     
	████╗ ████║██╔═══██╗██╔══██╗██║██║     ██╔════╝    ██╔══██╗██╔══██╗██╔══██╗    ██╔════╝██╔═══██╗██╔════╝██║██╔══██╗██║     
	██╔████╔██║██║   ██║██████╔╝██║██║     █████╗      ███████║██║  ██║██║  ██║    ███████╗██║   ██║██║     ██║███████║██║     
	██║╚██╔╝██║██║   ██║██╔══██╗██║██║     ██╔══╝      ██╔══██║██║  ██║██║  ██║    ╚════██║██║   ██║██║     ██║██╔══██║██║     
	██║ ╚═╝ ██║╚██████╔╝██████╔╝██║███████╗███████╗    ██║  ██║██████╔╝██████╔╝    ███████║╚██████╔╝╚██████╗██║██║  ██║███████╗
	╚═╝     ╚═╝ ╚═════╝ ╚═════╝ ╚═╝╚══════╝╚══════╝    ╚═╝  ╚═╝╚═════╝ ╚═════╝     ╚══════╝ ╚═════╝  ╚═════╝╚═╝╚═╝  ╚═╝╚══════╝

	*/

	public function mobile_addSocial($Correo=null, $Nombre=null, $Apellido=null, $Nivel=null, $Dispositivo=null, $Huella=null, $Sexo=null, $Nacimiento=null, $Social_Id=null, $alias=null)
	{
		$SERVIDOR = "52.24.1.93";
    	$this->autoRender=	false;

    	$result = array();
    	$result['error'] = array();
    	$result['message']	=	"Exito";
    	$ready 	=	true; 

		if($Correo==null)
		{
			$ready 	=	false;
			$result['message']	=	"Fallo";
			array_push($result['error'], "No se recibio el correo");
		}

		if($Nombre==null)
		{
			$ready 	=	false;
			$result['message']	=	"Fallo";
			array_push($result['error'], "No se recibio el nombre");
		}

		if($Apellido==null)
		{
			$ready 	=	false;
			$result['message']	=	"Fallo";
			array_push($result['error'], "No se recibio el apellido");
		}

		if($Nivel==null)
		{
			$ready 	=	false;
			$result['message']	=	"Fallo";
			array_push($result['error'], "No se recibio el nivel del cliente");
		}	

		if($Dispositivo==null)
		{
			$ready 	=	false;
			$result['message']	=	"Fallo";
			array_push($result['error'], "No se recibio el tipo de dispositivo");
		}

		if($Huella==null)
		{
			$ready 	=	false;
			$result['message']	=	"Fallo";
			array_push($result['error'], "No se recibio la huella del dispositivo");
		}

		if($Sexo==null)
		{
			$ready 	=	false;
			$result['message']	=	"Fallo";
			array_push($result['error'], "No se recibio el sexo del cliente");
		}

		if($Nacimiento==null)
		{
			$ready 	=	false;
			$result['message']	=	"Fallo";
			array_push($result['error'], "No se recibio la fecha de nacimiento del cliente");
		}

		if($Social_Id==null)
		{
			$ready 	=	false;
			$result['message']	=	"Fallo";
			array_push($result['error'], "No se recibio el id de la red social del cliente");
		}

		if($alias==null)
		{
			//$ready 	=	false;
			//$result['message']	=	"Fallo";
			array_push($result['error'], "No se recibio el alias");
		}


		if($ready)
		{
			$clienteExistenteNormal 	= 	$this->Cliente->findAllByCorreo($Correo);
			$this->loadModel('PerfilesSociale');
			$clienteExistenteSocial		=	$this->PerfilesSociale->findAllByClienteCorreo($Correo);
			
			if( ($clienteExistenteNormal) || ($clienteExistenteSocial) )
			{
				$result['message']	=	"Fallo";
				array_push($result['error'], "Ya existe un cliente con ese Correo registrado.");
			}
			else
			{
				if($alias==null)
				{
					$rawAlias	= 	explode("@", $Correo);
					$alias 		=	$rawAlias[0];
					array_push($result['error'], "No se recibio un alias, asi que se asigno por defecto ".$alias.".");
				}

				$Nacimiento = strtotime($Nacimiento);

				$Nacimiento = date('Y-m-d',$Nacimiento);


				$Cliente = array(
								'Cliente'=> array(
										'correo'		=> 	$Correo,
										'nombre'		=>	$Nombre,
										'apellido'		=>	$Apellido,
										'nivel'			=> 	$Nivel,
										'dispositivo'	=>	$Dispositivo,
										'huella'		=>	$Huella,
										'clave'			=>	'ClaveSocial',
										'sexo'			=>	$Sexo,
										'nacimiento'	=>	$Nacimiento,
										'estatus'		=>	'Por Confirmar',
										'tipo'			=> 	'Normal',
										'alias'			=>	$alias
									)
					);

				$resultado = $this->Cliente->save($Cliente);
				
				if($resultado)
				{
					$perfilSocial = array(
							'PerfilesSociale'	=> array(
									'cliente_correo' 	=> 	$Correo,
									'cliente_social_id'	=>	$Social_Id,
									'tipo'				=>	'Facebook'
														)
										);
					$resultado = $this->PerfilesSociale->save($perfilSocial);

					if($resultado)
					{
						//Aqui realizamos el autofollow
		    			date_default_timezone_set('America/Caracas');
		    			$date = new DateTime();

						$nuevoSeguimiento = array(
								    				'cliente_id' 		=> 	$this->Cliente->id,
								    				'seguimiento_tipo' 	=>	"Cliente",
								    				'seguimiento_id'	=> 	$this->Cliente->id,
								    				'creacion'			=>	$date->format('Y-m-d H:i:s')	
								    			);

						$resultado = $this->ClientesSeguimiento->save($nuevoSeguimiento);					

						$to      = 	$Correo;
						$subject = 	'Verificacion de cuenta para el Cliente';
						$message = 	'<html> <body> Mensaje de confirmacion, por favor haz click en este <a href="http://'.$SERVIDOR.'/Clientes/confirmar/'.$Correo.'/"> link </a> para confirmar tu cuenta. </body> </html>';
						$headers = 	'From: confirmaciones@woop.com' . "\r\n" .
									"MIME-Version: 1.0\r\n".
									"Content-Type: text/html; charset=ISO-8859-1\r\n".
					    			'Reply-To: noreply@woop.com' . "\r\n" .
					    			'X-Mailer: PHP/' . phpversion();

							mail($to, $subject, $message, $headers);

						//Aqui guardamos la imagen
						$url = 'http://graph.facebook.com/'.$Social_Id.'/picture?type=large';
						$fileName = 'img/Avatar/'.$this->Cliente->id.'.jpg';

						$resultadoImagen = file_put_contents($fileName, file_get_contents($url));;
						
						if(!$resultadoImagen)
						{
							array_push($result['error'], "Error en la carga de archivos. Intente subir la imagen de perfil mas tarde.");
						}
						else
						{
							$result['image']	=	"http://52.24.1.93/".$fileName;
						}

					}
					else
					{
						$result['message']	=	"Fallo";
						array_push($result['error'], "Hubo un error al hacer el registro social.");
					}

				}

			}
		}

		$this->response->sharable(true, 61);
		$this->response->type('json');
		$this->response->body(json_encode($result));
		return $this->response;		
	}


/**
	███╗   ███╗ ██████╗ ██████╗ ██╗██╗     ███████╗    ███████╗██████╗ ██╗████████╗
	████╗ ████║██╔═══██╗██╔══██╗██║██║     ██╔════╝    ██╔════╝██╔══██╗██║╚══██╔══╝
	██╔████╔██║██║   ██║██████╔╝██║██║     █████╗      █████╗  ██║  ██║██║   ██║   
	██║╚██╔╝██║██║   ██║██╔══██╗██║██║     ██╔══╝      ██╔══╝  ██║  ██║██║   ██║   
	██║ ╚═╝ ██║╚██████╔╝██████╔╝██║███████╗███████╗    ███████╗██████╔╝██║   ██║   
	╚═╝     ╚═╝ ╚═════╝ ╚═════╝ ╚═╝╚══════╝╚══════╝    ╚══════╝╚═════╝ ╚═╝   ╚═╝   	                                                                               
*/

/*
cliente=
{
	"cliente_correo":"ricardopoleo@gmail.com",
	"cliente_nombre":"Ricardo",
	"cliente_apellido":"Poleo",
	"cliente_clave":"qwerty",
	"cliente_sexo":"masculino",
	"cliente_nacimiento":"02-06-1989",
	"cliente_alias":"Ricks!"
	"cliente_interest_add":["Arabe"],
	"cliente_interest_delete":["China","Italiana"]
}
*/	
	public function mobile_edit()
	{
		$SERVIDOR = "52.24.1.93";
    	$this->autoRender=	false;

    	$result = array();
    	$result['error'] = array();
    	$result['message']	=	"Exito";
    	$ready 	=	true;
    	$image 	= 	true; 

    	if(isset($_POST['cliente']))
    	{
	    	$datos = json_decode($_POST['cliente'], true);

			if(!isset($datos['cliente_correo']))
			{
				$ready 	=	false;
				$result['message']	=	"Fallo";
				array_push($result['error'], "No se recibio el correo");
			}

			if(!isset($datos['cliente_nombre']))
			{
				$ready 	=	false;
				$result['message']	=	"Fallo";
				array_push($result['error'], "No se recibio el nombre");
			}

			if(!isset($datos['cliente_apellido']))
			{
				$ready 	=	false;
				$result['message']	=	"Fallo";
				array_push($result['error'], "No se recibio el apellido");
			}	
			if(!isset($datos['cliente_sexo']))
			{
				$ready 	=	false;
				$result['message']	=	"Fallo";
				array_push($result['error'], "No se recibio el sexo del cliente");
			}

			if(!isset($datos['cliente_nacimiento']))
			{
				$ready 	=	false;
				$result['message']	=	"Fallo";
				array_push($result['error'], "No se recibio la fecha de nacimiento del cliente");
			}
			
			if(!isset($datos['cliente_alias']))
			{
				$datos['cliente_alias'] = null;
			}
    	}
    	else
    	{
			$ready 	=	false;
			$result['message']	=	"Fallo";
			array_push($result['error'], "No se recibio el POST por el parametro 'cliente'.");    		
    	}


		if($ready)
		{
			$clienteExistente = $this->Cliente->findAllByCorreo($datos['cliente_correo']);

			if(!$clienteExistente)
			{
				$result['message']	=	"Fallo";
				array_push($result['error'], "No existe un cliente con dicho correo o estan tratando de cambiar la cuenta de correo.");
			}
			else
			{
				if($datos['cliente_alias']==null || $datos['cliente_alias']=="")
				{
					$rawAlias	= 	explode("@", $datos['cliente_correo']);
					$datos['cliente_alias'] 		=	$rawAlias[0];
				}

				$SQL = "";
				if(isset($datos['cliente_clave']))
				{
					$SQL = 	"UPDATE  `woop`.`clientes` ".
								"SET  `correo` =  '"	.$datos['cliente_correo']."', ".
								"`nombre` =  '"			.$datos['cliente_nombre']."', ".
								"`apellido` =  '"		.$datos['cliente_apellido']."', ".
								"`clave` =  '"			.$datos['cliente_clave']."', ".
								"`sexo` =  '"			.$datos['cliente_sexo']."', ".
								"`nacimiento` =  '"		.$datos['cliente_nacimiento']."', ".
								"`alias` =  '"			.$datos['cliente_alias']."' ".
							"WHERE  `clientes`.`id` =".$clienteExistente[0]['Cliente']['id'];					
				}
				else
				{
					$SQL = 	"UPDATE  `woop`.`clientes` ".
								"SET  `correo` =  '"	.$datos['cliente_correo']."', ".
								"`nombre` =  '"			.$datos['cliente_nombre']."', ".
								"`apellido` =  '"		.$datos['cliente_apellido']."', ".
								"`sexo` =  '"			.$datos['cliente_sexo']."', ".
								"`nacimiento` =  '"		.$datos['cliente_nacimiento']."', ".
								"`alias` =  '"			.$datos['cliente_alias']."' ".
							"WHERE  `clientes`.`id` =".$clienteExistente[0]['Cliente']['id'];					

				}


				$resultado = $this->Cliente->query($SQL);

				//Aqui vamos a actualizar la lista de los intereses
				$interesesParaAgregar 	= 	$datos['cliente_interest_add'];
				$interesesParaBorrar 	= 	$datos['cliente_interest_delete'];

				//Add new interest
				$preferencias = array();
				foreach ($interesesParaAgregar as $interes) 
				{
						$r = array(
								'cliente_correo'	=> $datos['cliente_correo'],
								'comida'			=> $interes
							);
						array_push($preferencias, $r);
				}

				$this->loadModel('ClientesComida');
				$this->ClientesComida->saveAll($preferencias);
				
				//Delete interest
				$preferencias = array();
				foreach ($interesesParaBorrar as $interes) 
				{
						$r = array(
								'cliente_correo'	=> $datos['cliente_correo'],
								'comida'			=> $interes
							);
						array_push($preferencias, $r);
				}

				$this->loadModel('ClientesComida');
				$this->ClientesComida->deleteAll($preferencias);

				//Esto es para mostrar el resultado en el Response
				if($resultado)
				{
					$clienteExistente = $this->Cliente->findAllByCorreo($datos['cliente_correo']);

					$SQL = "SELECT * FROM  `perfiles_sociales` WHERE  `cliente_correo` LIKE '".$datos['cliente_correo']."'";

					$ClienteSocial=$this->PerfilesSociale->query($SQL);
					

					if($ClienteSocial)
					{
						$clienteExistente[0]['Cliente']['socialId'] = $ClienteSocial[0]['perfiles_sociales']['cliente_social_id']; 
					}
					else
					{
						$clienteExistente[0]['Cliente']['socialId'] = null; 
					}

					$interesesLista = $this->ClientesComida->findAllByClienteCorreo($clienteExistente[0]['Cliente']['correo']);
					$Intereses = array();

					//var_dump($interesesLista);

					foreach ($interesesLista as $interes) 
					{
						array_push($Intereses, $interes['ClientesComida']['comida']);			
					}

					$clienteExistente[0]['Cliente']['image'] = "http://52.24.1.93/img/Avatar/".$clienteExistente[0]['Cliente']['id'].".jpg";

					$clienteExistente[0]['Cliente']['intereses'] = $Intereses;
					$clienteExistente[0]['Cliente']['cantidadRecomendados'] = 123; 
					$clienteExistente[0]['Cliente']['cantidadReviews'] = 456; 
					$result['cliente']	=	$clienteExistente[0]['Cliente'];					
				}
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
	public function mobile_search($search_type=null, $search_text=null)
	{
   		$this->autoRender=	false;

    	$result = array();
    	$result['error'] 	= array();
    	$result['message']	=	"Exito";
    	$ready 	=	true;

		if($search_type==null)
		{
			$ready 	=	false;
			$result['message']	=	"Fallo";
			array_push($result['error'], "No se recibio el tipo de busqueda. Puede ser por Alias o por Correo");  			
		}

		if($search_text==null)
		{
			$ready 	=	false;
			$result['message']	=	"Fallo";
			array_push($result['error'], "No se recibio el parametro de busqueda");  			
		}


		if($ready)
		{
			$clientesList = array();
			$clientes = array();

			if($search_type=="Correo")
			{
				$clientesList = $this->Cliente->findAllByCorreo($search_text);
			}
			else
			{
				$clientesList = $this->Cliente->query("SELECT * FROM  `clientes` WHERE  `alias` LIKE  '%".$search_text."%'");
			}

			foreach ($clientesList as $cliente) 
			{
				unset($cliente['clientes']['clave']);
				unset($cliente['clientes']['huella']);

				$cliente['clientes']['image'] = "http://52.24.1.93/img/Avatar/".$cliente['clientes']['id'].".jpg";
				array_push($clientes, $cliente['clientes']);
			}

			$result['clientes']	=	$clientes;
		}

		$this->response->sharable(true, 61);
		$this->response->type('json');
		$this->response->body(json_encode($result));
		return $this->response;    	 
	}




	/**
	███╗   ███╗ ██████╗ ██████╗ ██╗██╗     ███████╗    ███████╗███████╗███████╗██████╗ 
	████╗ ████║██╔═══██╗██╔══██╗██║██║     ██╔════╝    ██╔════╝██╔════╝██╔════╝██╔══██╗
	██╔████╔██║██║   ██║██████╔╝██║██║     █████╗      █████╗  █████╗  █████╗  ██║  ██║
	██║╚██╔╝██║██║   ██║██╔══██╗██║██║     ██╔══╝      ██╔══╝  ██╔══╝  ██╔══╝  ██║  ██║
	██║ ╚═╝ ██║╚██████╔╝██████╔╝██║███████╗███████╗    ██║     ███████╗███████╗██████╔╝
	╚═╝     ╚═╝ ╚═════╝ ╚═════╝ ╚═╝╚══════╝╚══════╝    ╚═╝     ╚══════╝╚══════╝╚═════╝ 

	*/
	public function mobile_feed($correo=null)
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
			$Cliente=$this->Cliente->findAllByCorreo($correo);
			if($Cliente)
			{
				$this->loadModel('ClientesSeguimiento');
				$this->loadModel('Posts');
				$this->loadModel('Likes');    				
    			$SQL ="SELECT * FROM  `clientes_seguimientos` WHERE  `cliente_id` LIKE  '".$Cliente[0]['Cliente']['id']."'";
    			$seguimientosList = $this->ClientesSeguimiento->query($SQL);
 
    			$posts = array();

				$SQL = "SELECT * FROM  `likes` WHERE  `post_liker_id` LIKE  '".$Cliente[0]['Cliente']['id']."' ";
				$likesList = $this->Likes->query($SQL);

				$previousLikes = array();

				foreach ($likesList as $like) 
				{
					array_push($previousLikes, $like['likes']['post_id']);
				}

    			foreach ($seguimientosList as $seguimiento) 
    			{
    				$perfil 	= 	array();
    				$perfilId 	=	"-1";
    				$tipoPerfil =	$seguimiento['clientes_seguimientos']['seguimiento_tipo'];
    				
    				if($tipoPerfil=="Cliente")
    				{
	    				$clienteSeguido	=	$this->Cliente->findAllById($seguimiento['clientes_seguimientos']['seguimiento_id']);
						$clienteSeguido[0]['Cliente']['image'] = "http://52.24.1.93/img/Avatar/".$clienteSeguido[0]['Cliente']['id'].".jpg";
    					$perfil 		=	$clienteSeguido[0]['Cliente'];
    					$perfilId 		= 	$clienteSeguido[0]['Cliente']['id'];
    				}
    				else
    				{
    					$this->loadModel('Restaurante');
    					$restauranteSeguido 	= 	$this->Restaurante->findAllByRif($seguimiento['clientes_seguimientos']['seguimiento_id']); 
    					$perfil 				= 	$restauranteSeguido[0]['Restaurante'];
    					$perfilId				=	$restauranteSeguido[0]['Restaurante']['RIF'];
    				}

    				$postList 		= 	$this->Posts->findAllByEmisorId($perfilId);

    				foreach ($postList as $post) 
    				{
						$alreadyLiked 	=  	in_array($post['Posts']['id'], $previousLikes);
						$thisPostLikes 	=	$this->Likes->findAllByPostId($post['Posts']['id']);
						$amountOfLikes 	= 	count($thisPostLikes);

						$promocion = "";

						if($post['Posts']['promocion'])
						{
							$this->loadModel('Promocione');
							$Prom = $this->Promocione->findAllByPostId($post['Posts']['id']);
							// $this->Promocion->findAllByPostId($post['Posts']['id']);
							$promocion = $Prom[0]['Promocione'];
						}
						else
						{
							//Because Android is Using GSON, he needed to receive, at least, an empty
							//array with this format.
							$promocion = array(
								'id' 				=> 	'',
								'post_id'			=>	'',
								'restaurante_rif'	=>	'',
								'fecha_inicio'		=>	'',
								'fecha_fin'			=>	''
								);
						}

    					$r = array(
    						'id'			=>	$post['Posts']['id'],
    						'descripcion' 	=> 	$post['Posts']['contenido'],
    						'image' 		=> 	$post['Posts']['imagen'],
    						'creacion' 		=> 	$post['Posts']['creacion'],
    						'promocion' 		=> 	$post['Posts']['promocion'],
    						'promocion_datos'	=>	$promocion,
    						'imagen_url'	=> 	"http://52.24.1.93/img/Posts/".$post['Posts']['id'].".jpg",
    						'liked'			=>	$alreadyLiked,
							'numberLikes'	=>	$amountOfLikes,
							'numberComments'=>	15,
							'datosPerfil'	=>	$perfil,
							'tipoPerfil' 	=>	$tipoPerfil,
							'restaurante_asignado'			=> $post['Posts']['restaurante_asignado'],
							'restaurante_asignado_rif'		=> $post['Posts']['restaurante_asignado_rif'],
							'restaurante_asignado_nombre'	=> $post['Posts']['restaurante_asignado_nombre']
    						);

    					//var_dump($r);

    					array_push($posts, $r);
    				}
    			}



    			$result['posts'] = $posts;

			}
			else
			{
				$ready 	=	false;
				$result['message']	=	"Fallo";
				array_push($result['error'], "No existe un cliente asociado a ese correo");
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
	public function mobile_view($correo=null, $cliente_correo=null)
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
			array_push($result['error'], "No se recibio el correo del cliente");    		
    	}

    	if($ready)
    	{
			$Cliente=$this->Cliente->findAllByCorreo($correo);
			if($Cliente)
			{
				$SQL = "SELECT * FROM  `perfiles_sociales` WHERE  `cliente_correo` LIKE '".$correo."'";

				$ClienteSocial=$this->PerfilesSociale->query($SQL);
				
				//var_dump($ClienteSocial);

				if($ClienteSocial)
				{
					$Cliente[0]['Cliente']['socialId'] = $ClienteSocial[0]['perfiles_sociales']['cliente_social_id']; 
				}
				else
				{
					$Cliente[0]['Cliente']['socialId'] = null; 
				}

				$interesesLista = $this->ClientesComida->findAllByClienteCorreo($Cliente[0]['Cliente']['correo']);
				$Intereses = array();

				//var_dump($interesesLista);

				foreach ($interesesLista as $interes) 
				{
					array_push($Intereses, $interes['ClientesComida']['comida']);			
				}

				$Cliente[0]['Cliente']['image'] = "http://52.24.1.93/img/Avatar/".$Cliente[0]['Cliente']['id'].".jpg";

				$Cliente[0]['Cliente']['intereses'] = $Intereses;

				//TODO: Need to add likes
				$Cliente[0]['Cliente']['cantidadRecomendados'] = 123; 

				//TODO: Need to add comments
				$Cliente[0]['Cliente']['cantidadReviews'] = 456; 

				$Cliente[0]['Cliente']['seguido'] 	=	false;
				
				if($cliente_correo!=null)
				{
					$this->loadModel('Cliente');
					$clienteSeguido = $this->Cliente->findAllByCorreo($cliente_correo);
					if($clienteSeguido)
					{
						$cliente_id 		= $clienteSeguido[0]['Cliente']['id'];
						$this->loadModel('ClientesSeguimientos');
						$seguido = 	$this->ClientesSeguimientos->findAllByClienteIdAndSeguimientoId($cliente_id, $Cliente[0]['Cliente']['id']);
						
						if($seguido)
						{
							$Cliente[0]['Cliente']['seguido'] 	= 	true;
						}
					}
					else
					{
						array_push($result['error'], "No existe un Cliente asociado a ese correo.");
					}					
				}


				$result['cliente']	=	$Cliente[0]['Cliente'];
			}
			else
			{ 
				$ready 	=	false;
				$result['message']	=	"Fallo";
				array_push($result['error'], "No existe un cliente asociado a esa direccion de correo.");				
			}
    	}

		$this->response->sharable(true, 61);
		$this->response->type('json');
		$this->response->body(json_encode($result));
		return $this->response;		
	}

	/**
	███╗   ███╗ ██████╗ ██████╗ ██╗██╗     ███████╗    ██╗      ██████╗  ██████╗ ██╗███╗   ██╗    ███████╗ ██████╗  ██████╗██╗ █████╗ ██╗     
	████╗ ████║██╔═══██╗██╔══██╗██║██║     ██╔════╝    ██║     ██╔═══██╗██╔════╝ ██║████╗  ██║    ██╔════╝██╔═══██╗██╔════╝██║██╔══██╗██║     
	██╔████╔██║██║   ██║██████╔╝██║██║     █████╗      ██║     ██║   ██║██║  ███╗██║██╔██╗ ██║    ███████╗██║   ██║██║     ██║███████║██║     
	██║╚██╔╝██║██║   ██║██╔══██╗██║██║     ██╔══╝      ██║     ██║   ██║██║   ██║██║██║╚██╗██║    ╚════██║██║   ██║██║     ██║██╔══██║██║     
	██║ ╚═╝ ██║╚██████╔╝██████╔╝██║███████╗███████╗    ███████╗╚██████╔╝╚██████╔╝██║██║ ╚████║    ███████║╚██████╔╝╚██████╗██║██║  ██║███████╗
	╚═╝     ╚═╝ ╚═════╝ ╚═════╝ ╚═╝╚══════╝╚══════╝    ╚══════╝ ╚═════╝  ╚═════╝ ╚═╝╚═╝  ╚═══╝    ╚══════╝ ╚═════╝  ╚═════╝╚═╝╚═╝  ╚═╝╚══════╝

	*/

	public function mobile_loginSocial($Social_Id=null)
	{
		$SERVIDOR = "52.24.1.93";
    	$this->autoRender=	false;

    	$result = array();
    	$result['error'] = array();
    	$result['message']	=	"Exito";
    	$ready 	=	true; 

		if($Social_Id==null)
		{
			$ready 	=	false;
			$result['message']	=	"Fallo";
			array_push($result['error'], "No se recibio el id de la red social");
		}

		if($ready)
		{
			$ClienteSocial=$this->PerfilesSociale->query("SELECT * FROM  `perfiles_sociales` WHERE  `cliente_social_id` =".$Social_Id);

			if(count($ClienteSocial)>0)
			{
				
				$result['message']	=	"Exito";
				$result['correo']	=	$ClienteSocial[0]['perfiles_sociales']['cliente_correo'];
			}
			else
			{
				$result['message']	=	"Fallo";
				array_push($result['error'], "No existe un usuario con ese id social registrado en el sistema.");
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
			array_push($result['error'], "No se recibio el correo");
		}

		if($clave==null)
		{
			$ready 	=	false;
			$result['message']	=	"Fallo";
			array_push($result['error'], "No se recibio la clave");
		}

		if($ready)
		{
			$Cliente=$this->Cliente->findAllByCorreo($correo);
			if($Cliente)
			{
				//debug($Cliente);
				if($Cliente[0]['Cliente']['clave']==$clave)
				{
					$result['message']	=	"Exito";
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
				array_push($result['error'], "No existe un usuario con esa direccion de correo");
			}
		}

		$this->response->sharable(true, 61);
		$this->response->type('json');
		$this->response->body(json_encode($result));
		return $this->response;		
	}

	/**
	██████╗ ███████╗ ██████╗██╗   ██╗██████╗ ███████╗██████╗  █████╗ ██████╗     ██████╗  █████╗ ███████╗███████╗██╗    ██╗ ██████╗ ██████╗ ██████╗ 
	██╔══██╗██╔════╝██╔════╝██║   ██║██╔══██╗██╔════╝██╔══██╗██╔══██╗██╔══██╗    ██╔══██╗██╔══██╗██╔════╝██╔════╝██║    ██║██╔═══██╗██╔══██╗██╔══██╗
	██████╔╝█████╗  ██║     ██║   ██║██████╔╝█████╗  ██████╔╝███████║██████╔╝    ██████╔╝███████║███████╗███████╗██║ █╗ ██║██║   ██║██████╔╝██║  ██║
	██╔══██╗██╔══╝  ██║     ██║   ██║██╔═══╝ ██╔══╝  ██╔══██╗██╔══██║██╔══██╗    ██╔═══╝ ██╔══██║╚════██║╚════██║██║███╗██║██║   ██║██╔══██╗██║  ██║
	██║  ██║███████╗╚██████╗╚██████╔╝██║     ███████╗██║  ██║██║  ██║██║  ██║    ██║     ██║  ██║███████║███████║╚███╔███╔╝╚██████╔╝██║  ██║██████╔╝
	╚═╝  ╚═╝╚══════╝ ╚═════╝ ╚═════╝ ╚═╝     ╚══════╝╚═╝  ╚═╝╚═╝  ╚═╝╚═╝  ╚═╝    ╚═╝     ╚═╝  ╚═╝╚══════╝╚══════╝ ╚══╝╚══╝  ╚═════╝ ╚═╝  ╚═╝╚═════╝ 
	                                                                                                                                                
	*/

	public function recuperarContrasena($correo=null)
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
			array_push($result['error'], "No se recibio el correo");
		}

		if($ready)
		{
			$Cliente=$this->Cliente->findAllByCorreo($correo);

			if($Cliente)
			{
				$to      = 	$Cliente[0]['Cliente']['correo'];
				$subject = 	'Verificacion de cuenta para el Cliente';
				$message = 	'<html> <body> Tu clave es <b>'.$Cliente[0]['Cliente']['clave'].'</b>. </body> </html>';
				$headers = 	'From: confirmaciones@woop.com' . "\r\n" .
							"MIME-Version: 1.0\r\n".
							"Content-Type: text/html; charset=ISO-8859-1\r\n".
				    		'Reply-To: noreply@woop.com' . "\r\n" .
				    		'X-Mailer: PHP/' . phpversion();

				mail($to, $subject, $message, $headers);
			}
			else
			{
				$ready 	=	false;
				$result['message']	=	"Fallo";
				array_push($result['error'], "El correo recibido no corresponde a ningun correo.");
			}

		}

		$this->response->sharable(true, 61);
		$this->response->type('json');
		$this->response->body(json_encode($result));
		return $this->response;		
	}




	public function mobile_delete($correo=null)
	{
   		$this->autoRender=	false;

    	$result = array();
    	$result['error'] 	= array();
    	$result['actions'] 	= array();
    	$result['message']	=	"Exito";
    	$ready 	=	true;

		if($correo==null)
		{
			$ready 	=	false;
			$result['message']	=	"Fallo";
			array_push($result['error'], "No se recibio el correo");
		}		
		else
		{
			$Cliente = $this->Cliente->findAllByCorreo($correo);
			if(!$Cliente)
			{
				$ready 	=	false;
				$result['message']	=	"Fallo";
				array_push($result['error'], "No existe un usuario asignado a ese correo");				
			}
		}

		if($ready)
		{
			$Cliente = $this->Cliente->findAllByCorreo($correo);

			//Borrar Comentarios
			//Borrar Likes
			//Borrar Posts
			//Borrar Intereses
			//Borrar Seguimientos
			//Borrar Interacciones
			//Borrar Amistades
			//Borrar Perfil Social (Si hay)
			//Borrar Perfil

			//Por cuestion de rapidez, voy a dejarlo solo como
			//Borrar Seguimientos (Personas que lo siguen no lo podran ver)
			//Borrar Interacciones causadas
			//Borrar Perfil Social
			//Borrar Perfil

			$SQL ="DELETE FROM `woop`.`clientes_seguimientos` WHERE `clientes_seguimientos`.`seguimiento_id` = ".$Cliente[0]['Cliente']['id'];
			$resultado = $this->ClientesSeguimiento->query($SQL);

			if($resultado)
			{
				array_push($result['actions'], "Eliminados Seguimientos");	
			}

			$SQL ="DELETE FROM `woop`.`perfiles_sociales` WHERE `perfiles_sociales`.`cliente_correo` = '".$correo."'";
			$resultado = $this->PerfilesSociale->query($SQL);			

			if($resultado)
			{
				array_push($result['actions'], "Eliminado Perfil Social");	
			}
			$SQL ="DELETE FROM `woop`.`clientes` WHERE `clientes`.`correo` LIKE '".$correo."'";
			$resultado = $this->Cliente->query($SQL);
			
			if($resultado)
			{
				array_push($result['actions'], "Eliminado Cliente");	
			}		

		} 

		$this->response->sharable(true, 61);
		$this->response->type('json');
		$this->response->body(json_encode($result));
		return $this->response;    	 
	}


	/**
	██╗     ███████╗██╗   ██╗███████╗██╗     ██╗███╗   ██╗ ██████╗      ██████╗██╗  ██╗███████╗ ██████╗██╗  ██╗
	██║     ██╔════╝██║   ██║██╔════╝██║     ██║████╗  ██║██╔════╝     ██╔════╝██║  ██║██╔════╝██╔════╝██║ ██╔╝
	██║     █████╗  ██║   ██║█████╗  ██║     ██║██╔██╗ ██║██║  ███╗    ██║     ███████║█████╗  ██║     █████╔╝ 
	██║     ██╔══╝  ╚██╗ ██╔╝██╔══╝  ██║     ██║██║╚██╗██║██║   ██║    ██║     ██╔══██║██╔══╝  ██║     ██╔═██╗ 
	███████╗███████╗ ╚████╔╝ ███████╗███████╗██║██║ ╚████║╚██████╔╝    ╚██████╗██║  ██║███████╗╚██████╗██║  ██╗
	╚══════╝╚══════╝  ╚═══╝  ╚══════╝╚══════╝╚═╝╚═╝  ╚═══╝ ╚═════╝      ╚═════╝╚═╝  ╚═╝╚══════╝ ╚═════╝╚═╝  ╚═╝                                                                                                         	
	*/

	public function levelingCheck($cliente_id)
	{

   		$this->autoRender=	false;

		/*
			This logic need to change.
			Novato 		->  00 Posts,	00 Likes
			Medium		->	01 Posts,	01 Likes
			Avanzado 	->	02 Posts,	02 Likes
			Experto 	->	03 Posts,	03 Likes
		*/
		$readyToLevelUp =	false;
		$nextLevel		=	"N/A";

		$this->loadModel('Posts');
		$this->loadModel('Likes'); 

		$cliente 		= 	$this->Cliente->findAllById($cliente_id);
		$clienteLevel	=	$cliente[0]['Cliente']['nivel'];

		$listOfLikes 	=	$this->Likes->findAllByPostLikerId($cliente_id);
		$amountOfLikes	=	count($listOfLikes);

		$listOfPost		=	$this->Posts->findAllByEmisorId($cliente_id);
		$amountOfPosts	=	count($listOfPost);

		if(($amountOfPosts>=3) && ($amountOfLikes>=3))
		{
			if(strcmp($clienteLevel, "Experto")!=0)
			{
				$nextLevel		=	"Experto";
				$readyToLevelUp	=	true;				
			}
		}
		elseif(($amountOfPosts>=2) && ($amountOfLikes>=2) )
		{
			if(strcmp($clienteLevel, "Avanzado")!=0)
			{
				$nextLevel		=	"Avanzado";
				$readyToLevelUp	=	true;				
			}
		}
		elseif(($amountOfPosts>=1) && ($amountOfLikes>=1) )
		{
			if(strcmp($clienteLevel, "Medium")!=0)
			{
				$nextLevel		=	"Medium";
				$readyToLevelUp	=	true;				
			}
		}

		if($readyToLevelUp)
		{
			$SQL = 	"UPDATE  `woop`.`clientes` ".
						"SET  `nivel` =  '"	.$nextLevel."' ".
						"WHERE  `clientes`.`id` =".$cliente_id;

			$resultado = $this->Cliente->query($SQL);		

			if($resultado)
			{
	    			//cliente_id: es el ID del cliente que desencadeno este evento.
	    			//evento_receptor_id: es el ID del Perfil que recibe el evento desencadenante.
	    			//evento_receptor_tipo: es el tipo del Perfil que recibe el evento desencadenante. Restaurante o Cliente 
	    			//evento_tipo: es el tipo de evento que desencadeno esta notificacion. En este caso es "Like"
	    			//evento_desencadenante_id: es el ID del evento que genera esta notificacion. En este caso, el ID del Like.

					$newNotificacion = array(
									'cliente_id'				=>	$cliente_id,
									'evento_receptor_id'		=>	$cliente_id,
									'evento_receptor_tipo'		=>	"Cliente",
									'evento_tipo'				=>	"Level Up",
									'evento_desencadenante_id'	=>	$nextLevel
						);

					$this->loadModel('Notificacione');
					$resultado = $this->Notificacione->save($newNotificacion);
			}
		}
	}



/**
                                                                                                       
▄ ██╗▄▄ ██╗▄▄ ██╗▄▄ ██╗▄▄ ██╗▄▄ ██╗▄▄ ██╗▄▄ ██╗▄▄ ██╗▄▄ ██╗▄▄ ██╗▄▄ ██╗▄▄ ██╗▄▄ ██╗▄▄ ██╗▄▄ ██╗▄▄ ██╗▄ 
 ████╗ ████╗ ████╗ ████╗ ████╗ ████╗ ████╗ ████╗ ████╗ ████╗ ████╗ ████╗ ████╗ ████╗ ████╗ ████╗ ████╗ 
▀╚██╔▀▀╚██╔▀▀╚██╔▀▀╚██╔▀▀╚██╔▀▀╚██╔▀▀╚██╔▀▀╚██╔▀▀╚██╔▀▀╚██╔▀▀╚██╔▀▀╚██╔▀▀╚██╔▀▀╚██╔▀▀╚██╔▀▀╚██╔▀▀╚██╔▀ 
  ╚═╝   ╚═╝   ╚═╝   ╚═╝   ╚═╝   ╚═╝   ╚═╝   ╚═╝   ╚═╝   ╚═╝   ╚═╝   ╚═╝   ╚═╝   ╚═╝   ╚═╝   ╚═╝   ╚═╝  
                                                                                                       
                                                                                                       
      ██╗    ██╗███████╗██████╗     ███╗   ███╗███████╗████████╗██╗  ██╗ ██████╗ ██████╗ ███████╗      
▄ ██╗▄██║    ██║██╔════╝██╔══██╗    ████╗ ████║██╔════╝╚══██╔══╝██║  ██║██╔═══██╗██╔══██╗██╔════╝▄ ██╗▄
 ████╗██║ █╗ ██║█████╗  ██████╔╝    ██╔████╔██║█████╗     ██║   ███████║██║   ██║██║  ██║███████╗ ████╗
▀╚██╔▀██║███╗██║██╔══╝  ██╔══██╗    ██║╚██╔╝██║██╔══╝     ██║   ██╔══██║██║   ██║██║  ██║╚════██║▀╚██╔▀
  ╚═╝ ╚███╔███╔╝███████╗██████╔╝    ██║ ╚═╝ ██║███████╗   ██║   ██║  ██║╚██████╔╝██████╔╝███████║  ╚═╝ 
       ╚══╝╚══╝ ╚══════╝╚═════╝     ╚═╝     ╚═╝╚══════╝   ╚═╝   ╚═╝  ╚═╝ ╚═════╝ ╚═════╝ ╚══════╝      
                                                                                                       
                                                                                                       
▄ ██╗▄▄ ██╗▄▄ ██╗▄▄ ██╗▄▄ ██╗▄▄ ██╗▄▄ ██╗▄▄ ██╗▄▄ ██╗▄▄ ██╗▄▄ ██╗▄▄ ██╗▄▄ ██╗▄▄ ██╗▄▄ ██╗▄▄ ██╗▄▄ ██╗▄ 
 ████╗ ████╗ ████╗ ████╗ ████╗ ████╗ ████╗ ████╗ ████╗ ████╗ ████╗ ████╗ ████╗ ████╗ ████╗ ████╗ ████╗ 
▀╚██╔▀▀╚██╔▀▀╚██╔▀▀╚██╔▀▀╚██╔▀▀╚██╔▀▀╚██╔▀▀╚██╔▀▀╚██╔▀▀╚██╔▀▀╚██╔▀▀╚██╔▀▀╚██╔▀▀╚██╔▀▀╚██╔▀▀╚██╔▀▀╚██╔▀ 
  ╚═╝   ╚═╝   ╚═╝   ╚═╝   ╚═╝   ╚═╝   ╚═╝   ╚═╝   ╚═╝   ╚═╝   ╚═╝   ╚═╝   ╚═╝   ╚═╝   ╚═╝   ╚═╝   ╚═╝  
                                                                                                       
                                                                                                       */
/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

	/**
	██╗    ██╗███████╗██████╗     ██╗███╗   ██╗██████╗ ███████╗██╗  ██╗
	██║    ██║██╔════╝██╔══██╗    ██║████╗  ██║██╔══██╗██╔════╝╚██╗██╔╝
	██║ █╗ ██║█████╗  ██████╔╝    ██║██╔██╗ ██║██║  ██║█████╗   ╚███╔╝ 
	██║███╗██║██╔══╝  ██╔══██╗    ██║██║╚██╗██║██║  ██║██╔══╝   ██╔██╗ 
	╚███╔███╔╝███████╗██████╔╝    ██║██║ ╚████║██████╔╝███████╗██╔╝ ██╗
	 ╚══╝╚══╝ ╚══════╝╚═════╝     ╚═╝╚═╝  ╚═══╝╚═════╝ ╚══════╝╚═╝  ╚═╝

	*/
	public function index() 
	{
		$clientes=$this->Cliente->find('all');
		$this->set('clientes', $clientes);
		//$this->set('clientes', $this->Paginator->paginate());
		/*
		$this->Cliente->recursive = 0;
		*/
	}

	/**
	██╗    ██╗███████╗██████╗     ███████╗███████╗███████╗██████╗ 
	██║    ██║██╔════╝██╔══██╗    ██╔════╝██╔════╝██╔════╝██╔══██╗
	██║ █╗ ██║█████╗  ██████╔╝    █████╗  █████╗  █████╗  ██║  ██║
	██║███╗██║██╔══╝  ██╔══██╗    ██╔══╝  ██╔══╝  ██╔══╝  ██║  ██║
	╚███╔███╔╝███████╗██████╔╝    ██║     ███████╗███████╗██████╔╝
	 ╚══╝╚══╝ ╚══════╝╚═════╝     ╚═╝     ╚══════╝╚══════╝╚═════╝ 

	*/
	public function feed($correo=null)
	{
		$Cliente 	= 	$this->Cliente->findAllByCorreo($correo);

		$this->loadModel('ClientesSeguimiento');
		$this->loadModel('Posts');
		$this->loadModel('Likes');

		$SQL ="SELECT * FROM  `clientes_seguimientos` WHERE  `cliente_id` LIKE  '".$Cliente[0]['Cliente']['id']."'";
		$seguimientosList = $this->ClientesSeguimiento->query($SQL);

		$posts = array();

		$SQL = "SELECT * FROM  `likes` WHERE  `post_liker_id` LIKE  '1' ";
		$likesList = $this->Likes->query($SQL);

		$previousLikes = array();

		foreach ($likesList as $like) 
		{
			array_push($previousLikes, $like['likes']['post_id']);
		}

		foreach ($seguimientosList as $seguimiento) 
		{

			$perfil 	= 	array();
			$perfilId 	=	"-1";
			$tipoPerfil =	$seguimiento['clientes_seguimientos']['seguimiento_tipo'];
			
			if($tipoPerfil=="Cliente")
			{
				$clienteSeguido	=	$this->Cliente->findAllById($seguimiento['clientes_seguimientos']['seguimiento_id']);
				$clienteSeguido[0]['Cliente']['image'] = "http://52.24.1.93/img/Avatar/".$clienteSeguido[0]['Cliente']['id'].".jpg";
				$perfil 		=	$clienteSeguido[0]['Cliente'];
				$perfilId 		= 	$clienteSeguido[0]['Cliente']['id'];
			}
			else
			{
				$this->loadModel('Restaurante');
				$restauranteSeguido 	= 	$this->Restaurante->findAllByRif($seguimiento['clientes_seguimientos']['seguimiento_id']); 
				$perfil 				= 	$restauranteSeguido[0]['Restaurante'];
				$perfilId				=	$restauranteSeguido[0]['Restaurante']['RIF'];
			}


			$postList 		= 	$this->Posts->findAllByEmisorId($perfilId);

			foreach ($postList as $post) 
			{
				$alreadyLiked 	=  	in_array($post['Posts']['id'], $previousLikes);
				$thisPostLikes 	=	$this->Likes->findAllByPostId($post['Posts']['id']);
				$amountOfLikes 	= 	count($thisPostLikes);

				$r = array(
					'id'			=>	$post['Posts']['id'],
					'descripcion' 	=> 	$post['Posts']['contenido'],
					'image' 		=> 	$post['Posts']['imagen'],
					'creacion' 		=> 	$post['Posts']['creacion'],
					'imagen_url'	=> 	"http://52.24.1.93/img/Posts/".$post['Posts']['id'].".jpg",
					'liked'			=>	$alreadyLiked,
					'numberLikes'	=>	$amountOfLikes,
					'numberComments'=>	15,
					'datosPerfil'	=>	$perfil,
					'tipoPerfil' 	=>	$tipoPerfil
					);

				array_push($posts, $r);
			}
		}

		//debug($posts);

		$this->set('posts',$posts);
	}


	/**
	██╗    ██╗███████╗██████╗     ██████╗  ██████╗ ███████╗████████╗     █████╗ ██████╗ ██████╗ 
	██║    ██║██╔════╝██╔══██╗    ██╔══██╗██╔═══██╗██╔════╝╚══██╔══╝    ██╔══██╗██╔══██╗██╔══██╗
	██║ █╗ ██║█████╗  ██████╔╝    ██████╔╝██║   ██║███████╗   ██║       ███████║██║  ██║██║  ██║
	██║███╗██║██╔══╝  ██╔══██╗    ██╔═══╝ ██║   ██║╚════██║   ██║       ██╔══██║██║  ██║██║  ██║
	╚███╔███╔╝███████╗██████╔╝    ██║     ╚██████╔╝███████║   ██║       ██║  ██║██████╔╝██████╔╝
	 ╚══╝╚══╝ ╚══════╝╚═════╝     ╚═╝      ╚═════╝ ╚══════╝   ╚═╝       ╚═╝  ╚═╝╚═════╝ ╚═════╝ 
	                                                                                            
	*/
	 public function post_add($correo=null)
	 {
		if($this->request->is('post'))
		{
			$this->loadModel('Post');
			$this->Post->create();

			if($this->Post->save($this->request->data))
			{
				//TODO: When we finish all the APIs, we continue with this. 
			}
		}

		$cliente = $this->Cliente->findAllByCorreo($correo);
		$this->set('cliente', $cliente);	 	
	 }


/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Cliente->exists($id)) {
			throw new NotFoundException(__('Invalid cliente'));
		}
		$options = array('conditions' => array('Cliente.' . $this->Cliente->primaryKey => $id));
		$this->set('cliente', $this->Cliente->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Cliente->create();
			if ($this->Cliente->save($this->request->data)) {
				$this->Session->setFlash(__('The cliente has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The cliente could not be saved. Please, try again.'));
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
		if (!$this->Cliente->exists($id)) {
			throw new NotFoundException(__('Invalid cliente'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Cliente->save($this->request->data)) {
				$this->Session->setFlash(__('The cliente has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The cliente could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Cliente.' . $this->Cliente->primaryKey => $id));
			$this->request->data = $this->Cliente->find('first', $options);
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
		$this->Cliente->id = $id;
		if (!$this->Cliente->exists()) {
			throw new NotFoundException(__('Invalid cliente'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Cliente->delete()) {
			$this->Session->setFlash(__('The cliente has been deleted.'));
		} else {
			$this->Session->setFlash(__('The cliente could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}







	/**
	██████╗ ██╗   ██╗ ██████╗     ███████╗██╗██╗  ██╗██╗███╗   ██╗ ██████╗ 
	██╔══██╗██║   ██║██╔════╝     ██╔════╝██║╚██╗██╔╝██║████╗  ██║██╔════╝ 
	██████╔╝██║   ██║██║  ███╗    █████╗  ██║ ╚███╔╝ ██║██╔██╗ ██║██║  ███╗
	██╔══██╗██║   ██║██║   ██║    ██╔══╝  ██║ ██╔██╗ ██║██║╚██╗██║██║   ██║
	██████╔╝╚██████╔╝╚██████╔╝    ██║     ██║██╔╝ ██╗██║██║ ╚████║╚██████╔╝
	╚═════╝  ╚═════╝  ╚═════╝     ╚═╝     ╚═╝╚═╝  ╚═╝╚═╝╚═╝  ╚═══╝ ╚═════╝                                                                                                                        
	*/


	public function mobile_feed_test($correo=null)
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
			$Cliente=$this->Cliente->findAllByCorreo($correo);
			if($Cliente)
			{
				$this->loadModel('ClientesSeguimiento');
				$this->loadModel('Posts');
				$this->loadModel('Likes');    				
    			$SQL ="SELECT * FROM  `clientes_seguimientos` WHERE  `cliente_id` LIKE  '".$Cliente[0]['Cliente']['id']."'";
    			$seguimientosList = $this->ClientesSeguimiento->query($SQL);
 
    			$posts = array();

				$SQL = "SELECT * FROM  `likes` WHERE  `post_liker_id` LIKE  '".$Cliente[0]['Cliente']['id']."' ";
				$likesList = $this->Likes->query($SQL);

				$previousLikes = array();

				foreach ($likesList as $like) 
				{
					array_push($previousLikes, $like['likes']['post_id']);
				}

    			foreach ($seguimientosList as $seguimiento) 
    			{
    				$perfil 	= 	array();
    				$perfilId 	=	"-1";
    				$tipoPerfil =	$seguimiento['clientes_seguimientos']['seguimiento_tipo'];
    				
    				if($tipoPerfil=="Cliente")
    				{
	    				$clienteSeguido	=	$this->Cliente->findAllById($seguimiento['clientes_seguimientos']['seguimiento_id']);
						$clienteSeguido[0]['Cliente']['image'] = "http://52.24.1.93/img/Avatar/".$clienteSeguido[0]['Cliente']['id'].".jpg";
    					$perfil 		=	$clienteSeguido[0]['Cliente'];
    					$perfilId 		= 	$clienteSeguido[0]['Cliente']['id'];
    				}
    				else
    				{
    					$this->loadModel('Restaurante');
    					$restauranteSeguido 	= 	$this->Restaurante->findAllByRif($seguimiento['clientes_seguimientos']['seguimiento_id']); 
    					$perfil 				= 	$restauranteSeguido[0]['Restaurante'];
    					$perfilId				=	$restauranteSeguido[0]['Restaurante']['RIF'];
    				}

    				$postList 		= 	$this->Posts->findAllByEmisorId($perfilId);

    				foreach ($postList as $post) 
    				{
						$alreadyLiked 	=  	in_array($post['Posts']['id'], $previousLikes);
						$thisPostLikes 	=	$this->Likes->findAllByPostId($post['Posts']['id']);
						$amountOfLikes 	= 	count($thisPostLikes);

						$promocion = "";

						if($post['Posts']['promocion'])
						{
							$this->loadModel('Promocione');
							$Prom = $this->Promocione->findAllByPostId($post['Posts']['id']);
							// $this->Promocion->findAllByPostId($post['Posts']['id']);
							$promocion = $Prom[0]['Promocione'];
						}
						else
						{
							//Because Android is Using GSON, he needed to receive, at least, an empty
							//array with this format.
							$promocion = array(
								'id' 				=> 	'',
								'post_id'			=>	'',
								'restaurante_rif'	=>	'',
								'fecha_inicio'		=>	'',
								'fecha_fin'			=>	''
								);
						}

    					$r = array(
    						'id'			=>	$post['Posts']['id'],
    						'descripcion' 	=> 	$post['Posts']['contenido'],
    						'image' 		=> 	$post['Posts']['imagen'],
    						'creacion' 		=> 	$post['Posts']['creacion'],
    						'promocion' 		=> 	$post['Posts']['promocion'],
    						'promocion_datos'	=>	$promocion,
    						'imagen_url'	=> 	"http://52.24.1.93/img/Posts/".$post['Posts']['id'].".jpg",
    						'liked'			=>	$alreadyLiked,
							'numberLikes'	=>	$amountOfLikes,
							'numberComments'=>	15,
							'datosPerfil'	=>	$perfil,
							'tipoPerfil' 	=>	$tipoPerfil,
							'restaurante_asignado'			=> $post['Posts']['restaurante_asignado'],
							'restaurante_asignado_rif'		=> $post['Posts']['restaurante_asignado_rif'],
							'restaurante_asignado_nombre'	=> $post['Posts']['restaurante_asignado_nombre']
    						);

    					//var_dump($r);

    					array_push($posts, $r);
    				}
    			}

    			$result['posts'] = $posts;

			}
			else
			{
				$ready 	=	false;
				$result['message']	=	"Fallo";
				array_push($result['error'], "No existe un cliente asociado a ese correo");
			}
		}

		$this->response->sharable(true, 61);
		$this->response->type('json');
		$this->response->body(json_encode($result));
		return $this->response;   

	}


}
