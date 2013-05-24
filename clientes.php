<?php
session_start();

include( $_SERVER["DOCUMENT_ROOT"] . "/config.php");

if(isset($_SESSION["edit"]))
    echo "<script>cond=true</script>";

/*
 Este documento es desarrollado y es propiedad
 de Gomosoft, prohíbida su distribución, copia sin au-
 torización previa del creador.
 */



 ?>



<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8" />

    <title><?php echo title_page; ?></title>


     <link rel="stylesheet" href="css/html5_reset.css" type="text/css" />
     <link rel="stylesheet" href="css/reset.css" type="text/css" />
     <link rel="stylesheet" href="css/__estilo_ini.css" type="text/css" />
     <link rel="stylesheet" href="css/clientes.css" type="text/css" />
    <link rel="stylesheet" href="css/botones.css" type="text/css" />
    
     <link rel="shortcut icon" href=<?php echo "'".favicon."'"; ?> type="image/png" />

      <script type="text/javascript" src="js/jquery.js"></script>
      <script type="text/javascript" src="js/modernizr.js"></script>
      <script type="text/javascript" src="js/html5_ie.js"></script>
      <script type="text/javascript" src="js/slide_media.js"></script>

    <script type="text/javascript">

                html5_ie();

               $(document).ready(function(){

                   $.slide_mediaf();



               });




    </script>

</head>

<body>

  <?php echo file_get_contents( __DIR__ . "/partes/cabeza.php"); ?>
  <?php echo file_get_contents( __DIR__ . "/partes/menu.php"); ?>


  <section id= "cont_centro">


      <div  class="parrafo-contacto left">

          <ul class="cola">

          <li >

          <div class="p-columna left padre" data-role='editable:ul'  >

           <hgroup >
               <h1>CLIENTES</h1>
           </hgroup>


              <ul class="clientes" data-role='editable'>

                <br />

              <li> ING CONSTRUCCIONES</li>
             <li>PISOS Y ENCHAPE DE LA COSTA</li>
             <li>FERRO MOJANA</li>
             <li>FERRETERIA EL COMIENZO</li>
             <li>MATERIALES Y PINTURAS LA 32</li>
             <li>FERROMATERIALES DEL CARIBE</li>
             <li>FERRO SANPEDRO</li>
             <li>DISTRIBUCIONES FRANFRE</li>
             <li>MATERIALES Y PINTURAS ARDIMAR</li>
             <li>MATERIALES LA FE</li>

                 
              </ul>

          </div>

          </li>



              <li style="width:64%; ">

             <ul class="clientes" data-role='editable' >

              <li style="list-style-image:none"> <img src="img/nc.jpg" alt=""> </li>
        
            </ul>
  


              </li>


            </ul>

          
      </div>

  </section>


   <?php echo file_get_contents( __DIR__ . "/partes/pie.php"); ?>

 </body>

</html>