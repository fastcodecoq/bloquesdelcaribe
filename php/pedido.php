<?php

  function mail_( $info ){

			$to = $info["correo"];
			$to_= "info@bloquesdelcaribe.com";

			$subject = "Confirmación de pédido, Bloquesdelcaribe.com";
			$subject_ = "Nueva orden desde la web";

			$mensaje = "
			   Muchas gracias por comprar con nosotros a continuación detallamos su orden:
<br /><br />
			   <ul>
			   	 {$info['productos']}
			   </ul>

<br /><br />
			   Datos de contacto:<br /><br />
			   <b style='text-transform:uppercase'>{$info['nombre']}</b> <br />
			   Dirección de entrega: {$info['direccion']} <br />
			   Télefono: {$info['telefono']} <br />
			   Sugerencia: {$info['sugerencia']}<br /><br />

			   Por favor tenga en cuenta que nos estaremos comunicando con usted dentro de los próximos mínutos, en caso de haber ingresado un télefono equivocado por favor háganoslo saber enviando un correo a info@bloquesdelcaribe.com <br /> <br />
			   Si usted no ha realizado este pedido, por favor háganoslo saber. 

			   <br /><br /><br /><br /><br /><br />
			   Saludos Cordiales,
			   <br /><br />

			   Bloquesdelcaribe.com

			";

			$mensaje_ = "
			   Nueva orden:

			   <ul>
			   	 {$info['productos']}
			   </ul>


			   Datos de contacto: <br /> <br />
			   <b style='text-transform:uppercase'>{$info['nombre']}</b> <br />
			   Dirección de entrega: {$info['direccion']} <br />
			   Télefono: {$info['telefono']} <br />
			   Sugerencia: {$info['sugerencia']}<br /><br />

			   Tenga en cuenta:<br /><br />
			   Llamar al cliente para confirmar la orden<br />
			   Imprimir este correo para que la orden sea procesada<br />
			   Guardar un registro de esta orden <br />

			";
			
			$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
			$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			;


  		    if( mail($to, $subject, $mensaje, $cabeceras . 'From: Bloques del caribe <info@bloquesdelcaribe.com>' . "\r\n" ) AND mail($to_, $subject_, $mensaje_, $cabeceras ."From: Pedidos web <{$info['correo']}>" . "\r\n" ) )
  		     return true;
  		    else
  		     return false;  		 

  }


  function pedido(){


  			$info = array(

  				   "nombre" => $_GET["nombre"],
  				   "telefono" => $_GET["telefono"],
  				   "direccion" => $_GET["direccion"],
  				   "correo" => $_GET["correo"],
  				   "productos" => $_GET["productos"],
  				   "sugerencia" => $_GET["sugerencia"]

  				);


  			if(mail_($info))
  				echo json_encode( array( "success" => 1 ) );
  			else
  				echo json_encode( array( "success" => 0 ) );



  }


  function main(){

  	 	pedido();

  }


  main();
