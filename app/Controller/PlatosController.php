<?php
App::uses('AppController', 'Controller');
/**
 * Platos Controller
 *
 * @property Plato $Plato
 * @property PaginatorComponent $Paginator
 */
class PlatosController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');




	public function mobile_list($rif=null)
	{
   		$this->autoRender=	false;

    	$result = array();
    	$result['error'] 	= array();
    	$result['message']	=	"Exito";
    	$ready 	=	true;

		if($rif==null)
		{
			$ready 	=	false;
			$result['message']	=	"Fallo";
			array_push($result['error'], "No se recibio el RIF del restaurante");
		}

		if($ready)
		{
			$platosList = $this->Plato->findAllByRestaurantesRif($rif);
			$platos = array();

			foreach ($platosList as $plato) 
			{
				$plato['Plato']['image'] = 	'http://52.24.1.93/img/Platos/'.$plato['Plato']['id'].'.jpg';
				array_push($platos, $plato['Plato']);
			}

			$result['platos'] = $platos;
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
	public function mobile_edit()
	{
    	$this->autoRender=	false;

    	$result = array();
    	$result['error'] 	= array();
    	$result['message']	=	"Exito";
    	$ready 	=	true;

    	array_push($result['error'], "FUNCION POR PROGRAMAR.");

		$this->response->sharable(true, 61);
		$this->response->type('json');
		$this->response->body(json_encode($result));
		return $this->response; 
	}

	/**
	███╗   ███╗ ██████╗ ██████╗ ██╗██╗     ███████╗    ██████╗ ███████╗██╗     ███████╗████████╗███████╗
	████╗ ████║██╔═══██╗██╔══██╗██║██║     ██╔════╝    ██╔══██╗██╔════╝██║     ██╔════╝╚══██╔══╝██╔════╝
	██╔████╔██║██║   ██║██████╔╝██║██║     █████╗      ██║  ██║█████╗  ██║     █████╗     ██║   █████╗  
	██║╚██╔╝██║██║   ██║██╔══██╗██║██║     ██╔══╝      ██║  ██║██╔══╝  ██║     ██╔══╝     ██║   ██╔══╝  
	██║ ╚═╝ ██║╚██████╔╝██████╔╝██║███████╗███████╗    ██████╔╝███████╗███████╗███████╗   ██║   ███████╗
	╚═╝     ╚═╝ ╚═════╝ ╚═════╝ ╚═╝╚══════╝╚══════╝    ╚═════╝ ╚══════╝╚══════╝╚══════╝   ╚═╝   ╚══════╝
	                                                                                                    
	*/
	public function mobile_delete($plato_id=null)
	{
    	$this->autoRender=	false;

    	$result = array();
    	$result['error'] 	= array();
    	$result['message']	=	"Exito";
    	$ready 	=	true;

		if($plato_id==null)
		{
			$ready 	=	false;
			$result['message']	=	"Fallo";
			array_push($result['error'], "No se recibió el Id del Post");
		}

		if($ready)
		{
			$this->Plato->id=$plato_id;

			if($this->Plato->exists())
			{
				$this->Plato->delete();
			}
			else
			{
				$ready 	=	false;
				$result['message']	=	"Fallo";
				array_push($result['error'], "No existe un plato asignado a este id.");				
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
    	$image 	= 	true; 

    	if(isset($_POST['plato']))
    	{
			$datos = json_decode($_POST['plato'], true);

			if(!isset($datos['restaurante_rif']))
			{
				$ready 	=	false;
				$result['message']	=	"Fallo";
				array_push($result['error'], "No se recibió el RIF del restaurante");
			}

			if(!isset($datos['plato_titulo']))
			{
				$ready 	=	false;
				$result['message']	=	"Fallo";			
				array_push($result['error'], "No se recibió el titulo del plato");
			}		

			if(!isset($datos['plato_descripcion']))
			{
				$ready 	=	false;
				$result['message']	=	"Fallo";			
				array_push($result['error'], "No se recibió la descripcion del plato");
			}		

			
			if(!isset($datos['plato_imagen']))
			{
				$image 	=	false;		
				array_push($result['error'], "No se recibió la imagen del plato. Se asignara una por defecto.");
			}
    	}
    	else
    	{
			$ready 	=	false;
			$result['message']	=	"Fallo";			
			array_push($result['error'], "No se recibió el json en el campo 'plato' ");
    	}
		
		if($ready)
		{
			$this->loadModel('Restaurante');
			$restaurante = $this->Restaurante->findAllByRif($datos['restaurante_rif']);

			if($restaurante)
			{

				//$restaurante_plan = $this->Plane->findAllByRestauranteRif();

				if(!isset($datos['plato_descripcion']))
				{
					$datos['plato_descripcion'] = null;
				}

				$plato = array(
							'Plato' => array(
								'restaurantes_rif' 	=> 	$datos['restaurante_rif'],
								'nombre'			=>	$datos['plato_titulo'],
								'descripcion'		=>	$datos['plato_descripcion']
								)
					);
				$resultado = $this->Plato->save($plato);

				$data = "";

				if($image)
				{
		    		$datos['plato_imagen'] 	= str_replace("-", 	"+", $datos['plato_imagen']);
					$datos['plato_imagen'] 	= str_replace("_", "/", $datos['plato_imagen']);
					
					$data = base64_decode($datos['plato_imagen']);									
				}
				else
				{
					$data = base64_decode("/9j/4AAQSkZJRgABAQEAYABgAAD/4QA6RXhpZgAATU0AKgAAAAgAA1EQAAEAAAABAQAAAFERAAQAAAABAAAAAFESAAQAAAABAAAAAAAAAAD/2wBDAAIBAQIBAQICAgICAgICAwUDAwMDAwYEBAMFBwYHBwcGBwcICQsJCAgKCAcHCg0KCgsMDAwMBwkODw0MDgsMDAz/2wBDAQICAgMDAwYDAwYMCAcIDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAz/wAARCAEAAQADASIAAhEBAxEB/8QAHwAAAQUBAQEBAQEAAAAAAAAAAAECAwQFBgcICQoL/8QAtRAAAgEDAwIEAwUFBAQAAAF9AQIDAAQRBRIhMUEGE1FhByJxFDKBkaEII0KxwRVS0fAkM2JyggkKFhcYGRolJicoKSo0NTY3ODk6Q0RFRkdISUpTVFVWV1hZWmNkZWZnaGlqc3R1dnd4eXqDhIWGh4iJipKTlJWWl5iZmqKjpKWmp6ipqrKztLW2t7i5usLDxMXGx8jJytLT1NXW19jZ2uHi4+Tl5ufo6erx8vP09fb3+Pn6/8QAHwEAAwEBAQEBAQEBAQAAAAAAAAECAwQFBgcICQoL/8QAtREAAgECBAQDBAcFBAQAAQJ3AAECAxEEBSExBhJBUQdhcRMiMoEIFEKRobHBCSMzUvAVYnLRChYkNOEl8RcYGRomJygpKjU2Nzg5OkNERUZHSElKU1RVVldYWVpjZGVmZ2hpanN0dXZ3eHl6goOEhYaHiImKkpOUlZaXmJmaoqOkpaanqKmqsrO0tba3uLm6wsPExcbHyMnK0tPU1dbX2Nna4uPk5ebn6Onq8vP09fb3+Pn6/9oADAMBAAIRAxEAPwD9/KKK+U/+Cm3/AAU20X9hPwYmm6alrrXxE1qEvp2nO2Y7KM5AurgA5CZBCqMFyCAQAzAA9e/ae/bE+Hv7H/g/+2PHWv2+m+cpNpYx/vb7UCO0MI+ZucAscIuRuYV+Yv7TP/Bwp488bXd1Y/DHQ7DwZpZysWoX8a32puOzBTmCP/dKyYx96vhX4vfGPxP8evHt94n8Ya1e69rmoNma6uXyQOyKB8qIvQIoCqOABXM1XKTzHpPxK/bF+K3xguZJPEnxE8Y6ssxyYZdVmW3H+7ErCNR7BRXnl5fz6jN5lxNNcSYxvkcs2PqahoqiQooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAms7+fTpvMt5preTGN8blWx9RXofw1/bF+K3wfuY5PDfxE8Y6SsJyIYtVma3P8AvRMxjYexU15tRQB+iH7Mv/Bwp488E3VrY/E7Q7DxnpYwsuoWEa2OpoO7FRiCT/dCx5z96v06/Zh/bE+Hv7YHg/8AtjwLr9vqXkqDd2Mn7q+08ntNCfmXnIDDKNg7WNfza103wh+Mfif4C+PbHxP4P1q90HXNPbMN1bPgkd0YH5XRuhRgVYcEGlylcx/TlRXyn/wTJ/4KbaL+3Z4MfTdSS10X4iaLCH1HTkbEV7GMA3VuCclCSAyHJQkAkgqx+rKgo8x/bD/ae0f9j/8AZ71/x1rG2b+zYvLsbQvtbULt+IYR3+ZuSRnaqs2PlNfzt/GP4va/8evidrXi/wAUXz6hrmvXLXNzMeFBPARR/CiqAqqOFVQO1fdX/Bwr+0zL42+PGh/DGxuc6X4MtVv9QjU8Pf3C7lDDvsgKEHt571+d9VEmQV9q/wDBPD/gjV4o/bB0az8X+KL6bwf4BuH/AHDiPOo6sg6tArDaseePMfIPZWHNH/BGr/gnhZ/tg/FC+8UeL7OW48A+D5FEkGcR6tenDLbMevlqp3uB1BRejGv3At7eO0gjiijSOKNQiIi7VQDgADsBQ2CR4v8As9/8E7/g7+zJp0UfhjwPo7X0aBX1TUYRfX8p7nzZASuepVNq9OOBj2WysINNg8u3hht4852RoFXP0FTUVJQUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAQ3thBqUHl3EMNxHnOyRAy5+hrxr9oT/gnf8AB39pvTpY/E/gfR1vpEKpqmnQixv4j2PmxgFsdQr7l68cnPtdFAH4ef8ABQ//AII1eKP2PtGvPF/he+m8YeAbd/37mPGo6Sh6NOqja0eePMTAHdVHNfFVf1K3FvHdwSRSxpJFIpR0ddyuDwQR3Br8P/8Agsr/AME8LP8AY++KFj4o8IWctv4B8YSOI4Osek3oyzWynr5bKN6A9AHXooqkyWj5Q+Dnxe1/4C/E7RfF/he+fT9c0G5W5tphypI4KMP4kZSVZTwysR3r+iT9jz9p7R/2wP2e/D/jrR9sP9pReXfWgfc2n3acTQnv8rcgnG5WVsfNX82tfoh/wb1ftMy+CfjxrnwxvrnGl+M7Vr/T42PCX9uu5go7b4A5J7+QlOQRPjn9sn4jyfFz9rD4jeI5JfOXVPEV7JC2c4hEzLEB7CNUH4V5rUl3cte3Uk0h3PM5dj6knJqOmSf0Wf8ABOz9ny2/Zm/Y48D+GY4o0vm0+PUdTdVwZby4Allyep2ltgJ/hjXgdK9sqO0tlsrSKGMbY4UCKB2AGBUlZmgUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAV4n/wUT/Z8tv2mf2OPHHhmSKN75dPk1HTHZcmK8twZYsHqNxXYSP4ZG4PSvbKju7Zb21khkG6OZCjD1BGDQB/LXXpX7G3xHk+Ef7WHw58Rxy+Sul+IrKSZs4zCZlWUH2MbOPxrzWpLS5ayuo5oztkhcOp9CDkVoZkdFFFAH9TFFFFZmgUUUUAFFFcr8b/AIw6R+z/APCTxB40177V/ZHhuze9uVt4/MmdV6Ki5ALMSAMkDJ5IGTQB1VfLH/BYH4I+OvjV+yFdf8K/1PVbTWfDN8mtTWVhO8M2q28UcgeJdhBZl3CRV/iMeAC22rf7C/8AwVU+Hv7c+r3miaXDfeGvFFopmTStTZN97COskDqSH2jll4YdcEAtX05RsB+L37B//Bcvxl8DLmz8O/FBr7xz4SBEY1B336xpy+u9j/pCj+7Id/o+AFP68/Bv41eFv2gfAFl4o8Ha1Z69od+P3dxbt91h1R1OGR1zyjAMO4r8lf8Agtx/wTi/4Ud40m+LHg2w2eD/ABHc/wDE4tIE+TR71z/rAB92GZjx2WTI4DoK+X/2Lv25vHH7DvxFGteFrv7Rpt2yjVdGuHP2PU4x2YfwyAZ2yL8y57qWU1a+xN7bn9GVFeY/sk/ta+Ef2y/hDZ+LvCV0Wic+TfWMpAudLuAAWhlUdCM5BHDAgjg16dUlBRRRQAUUUUAFFFFABRRXkv7YH7aXgf8AYo+GzeIPF9//AKRcBk03Srchr3VJQPuxoT90ZG5zhVyMnJAIB6pqGo2+kWE11dTw2trboZJZpXCRxKBkszHgADkk18f/ALQv/Bcj4H/BG9m0/StQ1Lx9qkLFGTQYla1Rh63EhVGHvF5gr8s/22/+ClvxH/bf1uSLWb5tF8JxybrTw9YSMtrGAflaY8GeQcfM/AOdqpkivnmq5SeY/Uu+/wCDlVhqI+zfBwNaKxz5vijEkg7Hi0IU+o+b619J/sXf8FlPhj+194rtfDEsOoeC/Ft8dtrY6k6Pb37/ANyGdcBn9FdULdFDGvwhrQ8Irqb+K9LXRftX9sG7iFh9mz532jePL2Y53bsYx3xT5Q5j+oiiquiC6XRbMXzI18IEFwU+6ZNo3Y9s5q1UFBRRRQB/LPRRRWhmFFFFAH9TFFFFZmgUUUUAFUPFPhjT/G3hrUNH1azt9Q0vVbeS0u7WdN0dxE6lXRh3BUkH61+Px/4Kr/Gj9jP9vPxjpXxG1C+8UeHLXW57bUNElCKsFsZN0U1mcDy8RFGRSdrq2GwSHX9afg58Y/Dfx9+HGl+LPCeqW+saHq8XmwXER6dmR16q6nIZWwVIINPYLn4af8FA/wBjfxN/wTR/adstT8M3upWnh+6uTqXhTWYXKzWxRgTAz/8APWIkA/31Kt/EVH6df8Euv+CnWk/tweCV0PXHtdL+JWiwA31muEj1SMYBuoB6dN6D7hP90ivbf2t/2WvDn7YfwO1bwT4kj2w3q+bZ3ioGm026UHy54/dSSCMjcpZTwxr8APiL4D8ffsF/tKz6bPPdeHvGXg69Etpe2rFRIOsc8TEfNFIpzgjBVirD7y09ydj+jPx74E0j4oeCtU8O6/YQapoutWz2l5azDKTRuMEeo9iMEHBBBANfz9/8FE/2GNY/YV+O1xoc32i88L6qXu/D+puv/H3b55jcjjzo8hXHGflbADiv13/4Jl/8FJ9F/bs+Hf2O+NrpPxD0OFTq2mKdq3K8D7Vbg8mJjjK8mNiAcgqzekftsfsgeH/21/gRqXg/XFW3uj/pOk6iE3SaZdqDslX1U5Ksv8SsRwcEC0Hufhb+wj+2r4h/Yc+ONn4m0lprrR7krb63pW/Eep2ueR6CRclkfs3H3WYH+gr4RfFnQfjp8NdH8XeGL+PUtD123W5tZ07g8FWHVXVgVZTyrKQeRX82nxq+DXiD9n34pa14O8UWLafrmhXBt7iM8q3dZEP8SOpDK3dWBr7b/wCCEX7c8nwg+Lx+E/iC8x4Z8bT7tKaVvlsNSIAVR6LOAEx/z0EeMbmNDFE/ZSiiipKCiiigAoorC+J3xK0X4O/D7WPFHiK+j03RNCtXvLy4k6RoozwOpY8AKOWJAGSRQB51+25+2h4Y/Yf+C914q19hdX02bfSNKSQLNqtzjIReu1F4LvghV7ElVb8CP2l/2l/Fn7WXxZ1Dxj4x1BrzUrw7IYUytvYQgkpBCmTtjXJ45JJLEliSep/bw/bO1z9uD49X/irUjNa6TATa6JphfKadaA/KvoZG+87d2OPuhQPF6tIhsKKKKYgr9Zv+CMX/AASsbwZHpnxi+I+nsusSKtz4Z0e4TBsVIyt5Mp/5akHMan7gO4/MV2cD/wAEaf8AglP/AMLDutN+LvxJ03/in4GFx4c0e5j/AOQm4OVu5lP/ACxB5RT/AKwjcfkA3/rhUtlRQUUUVJQUUUUAfyz0UUVoZhRRRQB/UxRRRWZoFFFFAH5k/wDBwN+xY2v+HtO+NOg2u660lI9L8RpGvL25bFvcn/cZvLY8kh4+yGviv/gnV/wUW8S/sG/EfzI/P1jwTq8q/wBs6KX4ft58GeEnUd+A4G1v4WX9+vFvhPTfHnhbUtE1izh1DSdXtpLO8tZl3R3EMilXRh6FSRX89f8AwUJ/Yu1T9h/9ofUfDM63E/h++LXugX7jIvLRjwCenmRn5HHHIDY2suaXYmXc/fz4NfGXw3+0B8NtL8W+E9Ug1bQ9Yi82CeM8g9GR16q6nKspwQQQa+d/+CrX/BO21/be+EP9oaLDBB8RPC8LyaROcJ/aEfLNZSN/dY5KE8I56gM+fyp/4Jx/8FGPEX7B3xJ3f6Rq3gXWJV/trRw/Xt9ogzwsyj6BwNrfwsv7xfCT4t+Hfjp8O9L8VeFdUt9Y0LWIRNbXMJ4I6FWHVXU5VlOCpBBAIpbD3P5tvh98QPFf7N3xZtNb0W6v/DfirwzeMFYqY5baVCVeORG6j7ysjDBBIIxkV+7n/BOr/goz4b/bq+GAmMlpo/jbR4gNa0cyY2kcfaIcnLQMfqUJ2t2Zvk7/AILy/wDBPywXw/c/HTwzDDZ3VvJDb+KLVRtW6EjrDFdr/wBNA7Ijj+IMrcFWLflSDinuLY+9v+C/Xxv8A/Fv9oTwvYeErjT9V1zwzYT2mu6lZuskbs0imG2LrwzRYlJxnaZtucggfB+m6lcaNqNveWk0ltdWsizQzRsVeJ1IKspHIIIBB9qhoqiT+jz9hP8AaRT9rL9lPwf43YxjUNSs/J1NE4Ed5CTFPgdgXUso/usteuV+an/Bt98UJtU+FvxI8GyyMY9F1O11a3Unp9pjeOQD2BtkOPVvc1+ldZs0CiiigAr8i/8Agvj+3RJ408bw/Bjw5e/8Sfw+6XXiN4m4ur3G6O3JHVYlIZh08xgCAY6/R79tr9pez/ZG/Zk8VeObjypLrTbUxabBJ0ur2T5IEx1I3kFschFY9q/nL8S+I77xj4i1DVtUupr7UtUuZLu7uJTl55ZGLu7H1LEk/WqiTIo0UUVRIV93f8Eg/wDgllL+1F4ht/iH48sZI/h1pU+bS0lXb/wkc6Hlf+vdGGHb+MjYP4yvG/8ABK3/AIJl6h+2549GveIIbqx+GugzgX1wMxvq0o5+yQt+W9x91TgYZgR+5/hvw3p/g7w/Y6TpNnbadpmmwJbWtrbxiOK3iQBVRVHAAAAAFS2VFFm1tY7G1jhhjjhhhUJHGihVRQMAADgADjAqSiipKCiiigAooooA/lnooorQzCiiigD+piiiiszQKKKKACvGf25v2LPDf7cnwTuvC2tbbPUrcm50bVVj3S6Zc4wGH96NvuumfmHowVh7NRQB/M3+0F+z/wCKP2Yvirqfg7xhpz6frGmPjuYrqM52TRNj543AyGHuDgggev8A/BO3/gpN4o/YJ8ZzLDDJr/gvVn3anobzeWN+ABPAxBEcoAAPGHUYborL+y37cX7Bfgv9ur4c/wBk+IofsOtWKs2ka3bxg3WnSHt28yInG6MnB6gqwDD8MP2u/wBinx5+xX8QH0PxjpbLazO39n6tbgvY6og/iikx97HVGw65GRggm9yNj6A/4KSf8FitS/bY8Bx+CfDmgTeFfCMkyXOofabgTXeptG26NG2gKkasA20FiWVTkAYPxLRRTEFFFFAH6d/8G2OjXEniz4tahtb7LDaaZbk/wl2e5YfiAh+mfev1dr4m/wCCC3wn0bwF+xFHrljqVjqeq+LtTmvNSNvIHaxaPEUdq/cMqL5hBGcznqME/bNQ9y1sFFFGaQz8lP8Ag4o/aSbXPiF4S+FdjcZtNDg/t3VEU8NcyhkgVvdIg7fS4FfmlXqX7bPxpf8AaG/ay+IHjDzjNb6vrM/2Nif+XWM+Vbj8IY4x+FeW1oZhX0d/wTf/AOCemu/t4/Ff7P8A6RpfgnRZFfXNWVfuKeRbw54aZwOOoQfMc8K3M/sM/sS+KP25fjJB4b0NWs9Ltds+s6u8ZaHS7cnqf70jYIRM5Yg9FVmH7+/s/wDwC8MfsyfCjSvBvhHT10/R9Jj2rn5pbmQ8vNK38Ujnkn8AAAAE2Ukavwy+GehfBvwDpfhfwzptvpGh6LALe0tYFwsaj17sxJLFjksxJJJJNb1FFQUFFFFABRRRQAUUUUAfyz0UUVoZhRRRQB/UxRRRWZoFFFFABRRRQAVz/wATvhX4b+NHgy78O+LNF07xBot8MTWl7CJI2PZhnlWHUMuGB5BBroKKAPy7/at/4N34r27utW+D/iWOzVyXXQddZmjTvtiulBbHYLIpPrJ3r4r+I/8AwSz/AGgPhffyQX3wu8TagI+kujwjVI5B6g25c/gQD6gV/QxRVcwuU/nr+G3/AASq/aA+J+p29va/DLxFpazkZn1iIabFCP7zecVPHoAT2AJ4rD/bR/YS8c/sLeMdL0nxhHY3EOsWoubPUNPd5LO4IwJY1ZlU742IBBA4ZT0YV/RhXlf7ZP7Jnh39s/4F6p4L8QKIWmHn6bfqgaXTLtQfLmT1xkhlyNysy5Gcg5hcp+Gv7AP7fHif9hD4sLq2mmTUvDWpskeuaK0m2O+iB++nZJkySr+5BypIr97/AIE/HXwx+0j8LtL8YeEdSj1TRdWj3RuOJIXH3opF6pIp4ZT0PqME/wA43x5+BviL9m74s614L8VWbWWs6JOYZQMmOZeqSxn+KN1IZT3BHQ5Fes/8E7f+ChfiP9g34ofaoPP1Xwbq8irrejb+JlHAnizws6DoejD5W4wVGgTP6D68/wD2sPHz/C39l/4ieI42KT6L4b1C8hIOD5qW7lB+LbRW18HfjD4c+Pnw30vxZ4T1ODVtC1iETW9xEfwZGHVXU5VlOCpBBr8vf+Cyf/BV2Hx5Fqnwf+G99HPou423iPWoSGW+IPNpA3/PMEfO4++RtHy5LpFXPzPr0f8AZV/Zb8VftgfGPTvBvhO18y7uj5l1dSA/Z9NtwRvnlYdFXI46sSFGSQK5/wCDPwf1/wCPvxQ0Xwf4XsW1DXNeuVtraIcKCeWdz/CiKCzN0CqT2r9//wBgn9hfw1+wp8HItB0kR3+vagEn1zWGj2yajOB0HdYkyQidgSTlmYmmyErnRfsi/sl+Ff2M/g1Y+D/C1v8AJF++v7+RALjVLkgB5pCO5xgL0VQFHSvUKKKgsKKKKACiiigAooooAKKKKAP5Z6KKK0MwooooA/qYooorM0CiiigAooooAKKKKACiiigAooooA+QP+Ct//BOiH9tD4Tf294dtYl+I3hWBn09gAp1a3GWazc+p5aMngOSOA7EfhXfWU2mXs1tcwy29xbu0UsUqFHjdTgqwPIIIIIPSv6k6/K//AILlf8E2vJe9+N3gfT/kY7/Flhbp909Bfqo9ekuPZ/8Ano1VFkyR8A/CP9rz4ifAv4aeKvCPhXxNf6ToHjCIRajbRN9AzxnrG7INjMmCynBzgY81AyaK9S/Yt+KnhL4J/tPeEPFPjjQZPEXhvRr5Z7m1QjKMAdk208SeU+2TYcBigGeaok/WX/gjH/wTq/4ZZ+F//Cd+LLHy/iB4utlKwzJiTRbFsMsGDysr4VpO4wqYBVs/cNY/gDx/ovxT8F6b4i8O6la6vomsQLc2d5btujnQ9CPQjkEHBBBBAIIrYrM0CiiigAooooAKKKKACiiigAooooA/lnooorQzCiiigD+piiiiszQKKKKACiiigAooooAKKKKACiiviH/grP8A8FULX9kbw5P4I8FXVvd/EvVIP3kq4kj8OwuOJXHQzMDlEPQYdhjargDf+Clf/BYbTP2OfGWneD/CFpYeKPFsNzDPrkckh+z6bbBgzQFl/wCXiReB18sEMQSQK+qvgn8ZPCv7VXwU0vxVoMsOq+HfEtod0UyK23IKy28ycjcp3IynIyD1HJ/ml1bVrrX9Vub6+ubi8vbyVp7i4nkMks8jEszsx5ZiSSSeSTX2p/wRG/bR8QfAz9o/T/h59m1DWvCvxBu1t5LK3UyPp93jC3aL2UKMS9P3a7jnywDXKTzHOf8ABWj/AIJ1XH7FPxc/tjQLeaT4c+KpmfTJOWGlznLNZO3sMtGTyyDGSUY18jV/TN+0D8B/Dv7THwi1rwX4qsxeaPrUJjfGBJbuOUmjP8MiMAyn1HOQSD/PT+2B+yl4j/Y1+OWqeCvEUZka1PnWF8qFYtTtWJ8udPrggjJ2srL2ppg0e2f8Etv+CnuqfsReNF0HxBJdan8M9ZnBvbVcySaTI3BuoB+W9B94DI+YDP7leD/GGl/EDwtp+t6Jf2uqaRqkC3Npd20gkiuI2GVZSOoIr+Xmvs7/AIJTf8FS9Q/Y08UxeE/Fk9zqHwy1afMi8ySaDKx5uIh1MZPMkY6/eX5sh00CZ+5VFU/DviKw8XaDZ6ppd5bahpuowpc2t1byCSG4icBldWHBUgggirlSUFFFFABRRRQAUUUUAFFFFAH8s9FFFaGYUUUUAf1MUUUVmaBRRRQAUUUUAFFFFABRRXyz/wAFN/8AgpRo37Cvw7+xae1rqnxE1yFv7J01juW1U5H2q4A5EanO1eDIwwMAMygGJ/wVR/4Kfad+xP4Mbw74bltdQ+JmtQE2sBxJHo0TZAuph0Lf3Iz94jJ+UYb8N/FHijUvG3iO+1jWL661LVNTne5u7q4kMktxK5yzsx5JJOc1Z8fePta+KXjTUvEXiLUrrV9a1idrm8vLh90k8jdSfQdgBgAAAAAAVj1oiGwr9o/+CJv/AATt/wCGd/hwvxM8XWPl+NvFlsPsNvMnz6NYPhgCD92WXhm7qu1eDvB+SP8Agir/AME7f+GlPiYvxE8WWPmeBfCNyDbQTJmPWr9cMqYP3oouGfsx2ryC4H7WVMmOKCvnX/gpP+wXpf7dfwNl01Bb2fjLQw914f1Fxjy5SPmgkPXypcAH+6QrYO3B+iqKko/l58ZeDtU+HvizUtC1uxuNN1fSLh7S8tZ12yW8qEqykexFZtfsX/wW2/4Jtf8AC6fClx8W/BWn7vF2g2//ABPLOBPm1ezjH+tUD700Sj6tGMclFB/HStDM+4f+CTP/AAVWuv2Stft/A3je6uLz4a6lPiKZsySeHZXPMiDqYGJy6DoSXUZ3K/7X6Rq9rr+lW19Y3NveWN5Es9vcQSCSKeNgCrqw4ZSCCCOCDX8t9fe3/BI7/gq/P+zNq1n8O/iDeyXHw9vpdljfSEs3h2Vj+ZtmJyy/wElhxuBlopM/aKiorG+h1OyhubaaK4t7hFlilicOkqMMhlI4IIIII61LUlBRRRQAUUUUAFFFFAH8s9FFFaGYUUUUAf1MUUUVmaBRRRQAUUUUAFFFeF/t9ft1+G/2Efg62vaoq6hr2pb4ND0hX2vqE6gZLH+GJNyl27AgDLMoIBjf8FGv+Ch3h/8AYO+F3nt9n1XxtrEbLoejl/vnobibHKwoevQuRtGOWX8Fvix8WPEHxx+Ieq+KvFOp3Gr67rMxnurmY8segUDoqqAFVRgKAAAAKu/Hb46eJv2kfijqnjDxdqUmp61q0m+RzxHCg+7FGvRI0HCqOg9TknkKtKxDYV61+xR+yPr37afx80rwZooe3t5D9p1XUNm5NMs1I8yU+p5Cqv8AE7KOBkjzLw54dv8Axf4gsdJ0u0uNQ1LUrhLW0toELyXErsFRFA6sWIAHvX7+/wDBMz9hCw/YY+AcOnXCW9x4z18JeeIb1Pm3S4O23Rv+ecQYqP7zF243YA2CPavhB8JdB+BPwz0Xwj4ZsU0/Q9BtltbWFeuByWY/xOzEszHlmYk8mukooqCwooooAK/F3/gtJ/wTa/4Zy8cyfEzwZYbPAviS5/0+1gT5NDvXOcAD7sMpyV7K2U4BQH9oqxviH8PtG+K/gbVfDfiHT4NU0XWrZ7S8tZhlZo2GCPUEdQRgggEEEA0ID+YCivev+Chv7DesfsK/He50G4+0XnhrVN934f1N14vLfP3GI482PIVwMfwtgB1rwWtDM/Qr/gkL/wAFZpPgPe2Hwx+JOoNJ4JuHEOkatO+ToDseIpCf+XYk9f8AlkT/AHM7f2MgnS5hSSN1kjkUMrKcqwPIIPoa/lpr9Jf+COX/AAVfm+Huo6T8IviRfPN4fupEtPDusTvltKdjhLWZj/ywJICMf9WSAfkwY5aKTP1zoooqSgooooAKKKKAP5Z6KKK0MwooooA/qYooorM0CiiigAooooAK/Eb/AIL++MtR1/8Abs/su6eT7DoOg2cNlGfuASb5XcD1LOQT/sAdq/bmvz//AOC2f/BODXP2ndL0v4ieA9PbVPFnh21NjqOmxf67U7MMzo0Q/iljZn+Xq6vgZKqrOImfjPRVrWtEvfDeqz2Oo2d1YX1q5jmt7mJopYWHZlYAg+xFfYX/AATG/wCCU3if9qr4iaZ4i8YaNf6L8M9PkW5uJruNoH1zaciCAHDMjHhpB8oXcA27GLIPpL/ghL/wTv8A7E06H43eMLH/AEy8Rk8KWkycwxMCr3xB7uCVj/2dzc7kI/TqodO0+30jT4LS1ghtbW1jWGGGJAkcSKMKqqOAAAAAOABU1ZmgUUUUAFFFFABRRRQB5D+23+x94f8A22fgTqPg/WlS3vObnSdRCbpNMu1BCSD1U52uv8SsRwcEfz2/Gr4N+IP2fvijrXg/xRYvp+uaFcG3uIjyrd1dD/EjqQysOCrA1/ThXx3/AMFZ/wDgmjH+2z4Bg8QeF4bW3+JHh2IpaNIwjTWLbljayP0DAktGzcAlgcBiy0mTJH4V0A4NdF8TPhH4o+DHiWbR/Fnh/WPDupwsVa31C1eBjjuu4YZfRlyCCCCRX0J/wT6/4Jd+OP2xPiHpl1qWj6noHw7t5km1LWLqFoBdRA5MVtuAMkj4K7lyqZyTnCtRJ+2X7J/ifUPGv7LXw11nVmkfVdW8LaZeXjSfeeaS0idyfcsSfxr0Cq+laXb6HpdtZWcMdvaWcSwQRIMLEigKqgegAAqxWZoFFFFABRRRQB/LPRRRWhmSXds1ldSQyDbJC5Rh6EHBqOvSf2xfhtJ8IP2rPiJ4bkjMa6T4hvYoQRjdCZmaJv8AgUbIfxrzagD+pS0uVvbWOaM7o5kDqfUEZFSV4p/wTu/aEt/2mv2OfA/iaOWN75dPTTtURTzFeW4EUuR1XcV3gH+GReT1r2uszQKKKKACiiigAooooAo6h4Z03Vr6G6utPsbm6twRFNLAryR567WIyPwq9RRQAUUUUAFFFFABRRRQAUUUUAFFFFACMocfMAec8iloooAKKKKACiiigAqO7uVsrWSaQ7Y4ULsfQAZNSV4p/wAFEf2hLf8AZk/Y68ceJpJI0vm099O0tHP+tvLgGKLA/i2lt5A/hjbkdaAP50qktLZr26jhjG6SZwij1JOBUdekfsdfDaT4wftWfDvw3HGZF1bxDZxTADO2ETK0rf8AAY1c/hWhmfZH/Bwp+zNL4K+PGh/E6xtcaX4ztVsNQlUcJf267VLHtvtwgA7+Q9fnfX9JX7Yn7MGj/tg/s+a94F1jbD/aUXmWN2U3Np92mTDOO/ytwQMbkZlz8xr+dv4x/CHX/gL8Tta8IeKLF9P1zQblra5hPKkjkOp/iRlIZWHDKwPepiVI+sP+CNf/AAUQs/2PviffeFvF95Jb+AfF8itJPjMek3vyqty3fy2UbHI6AI3RTX7f29xHdwRyxOkkUih0dDuVweQQe4Nfy1V9q/8ABPD/AILK+KP2PtGs/CHiixm8YeAbd/3CCTGo6Sh6rAzHa0eefLfAHZlHFDQJn7h0V4p+z3/wUQ+Dv7TenRSeGPHGjrfSIGfS9RmFjfxHuPKkILY6Fk3L055GfZrO+h1GDzbeaKeMnAeNwyn8RUlEtFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRUV5fQ6dB5txNFBGDgvI4VR+Jrxn9oT/goh8Hf2ZNOlk8T+ONHa+jQsml6dML6/lPYeVGSVz0DPtXrzwcAHtFxcR2kEksrpHFGpd3c7VQDkknsBX4gf8FlP+CiFn+2D8T7Hwt4QvJLjwD4QkZo58Yj1a9+ZWuV7+WqnYhPUF26MKP+Ch//AAWV8Uftg6NeeEPC9jN4P8A3D/v0MmdR1ZB/DOynasZPPlpkH+JmHFfFNUkS2Ffoh/wb1/szS+NfjxrnxOvrXOl+DLVrDT5WHD39wu1ip77LcuCO3npXwr8HPhDr/wAevidovhDwvYvqGua9crbW0I4UE8l2P8KKoLMx4VVJ7V/RJ+x3+zBo/wCx9+z5oPgXR9s39mxeZfXYTa2oXb4M057/ADNwAc7UVVz8opyCJ6dXyn/wU3/4Jk6N+3Z4MTU9Me10X4iaLCU07UXXEV9GMkWtwQM7CSSrjJQkkAgsp+rKKgo/mN+Lvwd8T/Abx7feGPF+i3ug65p7bZrW5TBx2dSPldG6h1JVhyCa5mv6Sv2n/wBjv4e/tg+EP7H8daBb6l5KkWl9H+6vtPJ7wzD5l5wSpyrYG5TX5i/tNf8ABvX488E3V1ffDHXLDxnpYy0Wn38i2OpoOyhjiCT/AHi0ec/dquYnlPzvor0j4lfsefFb4P3MkfiX4d+MNJWIkGaXSpmt2x/dlVTGw91Y155eWM2nT+XcQywSAZKSIVYfgaokiooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKls7GbUZ/Lt4ZZ5CMhI0LMfwFeh/DX9jz4rfGC5jj8NfDvxhqyykATRaVMtuuf70rKI1HuzCgDzeum+EXwd8T/Hnx7Y+GPCGi3uva5qDbYbW2TJx3diflRF6l2IVRySK+6v2Zf+Devx542urW++J2uWHgzSzhpdPsJFvtTcd1LDMEf+8Gkxj7tfp1+zB+x38Pf2PvCH9j+BdAt9N85QLu+k/e32oEd5pj8zc5IUYVcnaopcxXKeQ/8EyP+CZGjfsJ+DH1PVHtda+ImtQhNR1FFzFYxnB+y2+RnYCAWc4LkAkABVH1ZRRUFH//2Q==");									
				}

				$fileName = 'img/Platos/'.$this->Plato->id.'.jpg';
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
				$ready 	=	false;
				$result['message']	=	"Fallo";			
				array_push($result['error'], "No existe un restaurante registrado con ese Rif");				
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
		$this->Plato->recursive = 0;
		$this->set('platos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Plato->exists($id)) {
			throw new NotFoundException(__('Invalid plato'));
		}
		$options = array('conditions' => array('Plato.' . $this->Plato->primaryKey => $id));
		$this->set('plato', $this->Plato->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Plato->create();
			if ($this->Plato->save($this->request->data)) {
				$this->Session->setFlash(__('The plato has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The plato could not be saved. Please, try again.'));
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
		if (!$this->Plato->exists($id)) {
			throw new NotFoundException(__('Invalid plato'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Plato->save($this->request->data)) {
				$this->Session->setFlash(__('The plato has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The plato could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Plato.' . $this->Plato->primaryKey => $id));
			$this->request->data = $this->Plato->find('first', $options);
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
		$this->Plato->id = $id;
		if (!$this->Plato->exists()) {
			throw new NotFoundException(__('Invalid plato'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Plato->delete()) {
			$this->Session->setFlash(__('The plato has been deleted.'));
		} else {
			$this->Session->setFlash(__('The plato could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
