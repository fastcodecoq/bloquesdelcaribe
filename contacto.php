<?php
session_start();

 include( $_SERVER["DOCUMENT_ROOT"] . "/config.php");

if(isset($_SESSION["edit"]))
    echo "<script>cond=true</script>";

/*
 Este documento es desarrollado y es propiedad
 de Gomosoft, prohíbida su distribución, copia sin au-
 torización previa del creador.
 */?>



<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8" />

  <title> <?php echo title_page; ?> </title>


     <link rel="stylesheet" href="css/html5_reset.css" type="text/css" />
     <link rel="stylesheet" href="css/reset.css" type="text/css" />
     <link rel="stylesheet" href="css/__estilo_ini.css" type="text/css" />
     <link rel="stylesheet" href="css/contacto.css" type="text/css" />
     <link rel="stylesheet" href="css/botones.css" type="text/css" />     

     <link rel="shortcut icon" href=<?php echo "'".favicon."'"; ?> type="image/png" />

      <script type="text/javascript" src="js/jquery.js"></script>
      <script type="text/javascript" src="js/modernizr.js"></script>
      <script type="text/javascript" src="js/html5_ie.js"></script>
      <script type="text/javascript" src="js/slide_media.js"></script>
      <script type="text/javascript" src="js/gomo_uitl.js"></script>
      <script type="text/javascript" src="js/msg.js"></script>
      <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
      <script type="text/javascript" src="js/mapa.js"></script>

    <script type="text/javascript">

                html5_ie();

               $(document).ready(function(){

                   $.slide_mediaf();

                   $("#msg").msg();   

                   $("#mapa").ini_mapa({lat:9.286499084853057,lng:-75.41119584349974,zoom : 16 , mark : {image : "img/marker_map.png" , size : new google.maps.Size(140,120) , point_or: new google.maps.Point(2,0)  } });



               });




    </script>

</head>

<body>
<?php echo file_get_contents( $_SERVER["DOCUMENT_ROOT"] . "/partes/cabeza.php"); ?>
<?php echo file_get_contents( __DIR__ . "/partes/menu.php"); ?>

  <section id= "cont_centro">


      <div class="contacto-cont padre" data-role='[editable:ul:1]'>

           <aside class="info-cont left">

             <ul class="contacto-lista">

             <li>
                 <hgroup>
                   <h1>Para mayor información y cotizaciones favor escribir a:</h1>
               </hgroup>

                   info@bloquesdelcaribe.com
              </li>



                 <li>  <hgroup>
                     <h1>  Dirección.</h1>
                 </hgroup>
DIRECCION CRA 4 NO 27E-05 <br /> VARIANTE A TOLU <br />
 DIAG. AL ESTADERO LA GRANJA 

                 </li>

        

                 <li>  <hgroup>
                     <h1>Móvil.</h1>
                 </hgroup>

                     +57 (310) 643-5810- +57 (313) 575-1773

                     <br />
                 </li>

                 <li>  <hgroup>
                     <h1>Teléfono.</h1>

                 </hgroup>
 +57 (5) 280-8239
                     

                     <br />

                     <button class="btn btn-primary" id="msg" style="margin-top: 20px;">Enviar un mensaje.</button>

                    <div class="msg">
                                                                       
                        <form action="javascript:void(0)" method="post" name="msg" >
                        
                             <table>
                                 
                                 <tr>
                                     <td>Nombre</td><td><input type="text" name="nombre" class="%s" value="" /></td>
                                 </tr>

                                 <tr>
                                     <td>Email</td><td><input type="text" name="mail" class="%mail" value="" /></td>
                                 </tr>

                                 <tr>
                                     <td>Mensaje</td><td></td>
                                 </tr>

                                 <tr class="ta">
                                     <td><textarea cols="10" rows="5" name="msg" class="%mix" ></textarea></td><td></td>
                                 </tr>

                                 
                             </table>

                            <span class="msg-cerra" title="Cerrar" onclick="cerrar()">X</span>

                            <nav  style="position: absolute; right: 10px; bottom: 10px;">
                              <button class="boton-gomo red"  type="submit" onclick="cerrar()" >Cancelar</button>
                              <button class="boton-gomo verde" id="env_bu" type="submit" >Enviar</button>
                          </nav>
                            
                        </form>
                        
                    </div>

                 </li>


             </ul>

           </aside>

          <div id="mapa" class="mapa-cont">

          </div>


      </div>


  </section>

<?php echo file_get_contents( __DIR__ . "/partes/pie.php"); ?>

 </body>

</html>