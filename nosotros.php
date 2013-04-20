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
     <link rel="stylesheet" href="css/nosotros.css" type="text/css" />
     <link rel="stylesheet" href="css/botones.css" type="text/css" />

     <link rel="shortcut icon"  href= <?php echo "'".favicon."'"; ?> type="image/png" />

      <script type="text/javascript" src="js/jquery.js"></script>
      <script type="text/javascript" src="js/modernizr.js"></script>
      <script type="text/javascript" src="js/html5_ie.js"></script>
      <script type="text/javascript" src="js/slide_media.js"></script>

    <script type="text/javascript">

                html5_ie();

               $(document).ready(function(){

                   $.slide_mediaf();

                   $("a[href='#cerrar']").live("click", function(){

                          el = $($(this).attr("rel"));

                          el.fadeOut();

                   });


                   $("a[href='#abrir']").live("click", function(){

                          el = $($(this).attr("rel"));

                          el.fadeIn();

                   });

                   if(cond)
                     clos_se();
              


               });




    </script>

</head>

<body>
<?php echo file_get_contents( __DIR__ . "/partes/cabeza.php"); ?>
<?php echo file_get_contents( __DIR__ . "/partes/menu.php"); ?>

  <section id= "cont_centro">


      <figure class="img-nosotros left"  >

          <img src="http://placehold.it/328x246" alt="innova" />

      </figure>

      <div  class="parrafo-contacto left padre" data-role='[editable:articulo:001:2]' >

          <div class="p-columna left"   >


           <hgroup >
               <h1  data-role='titulo'>NOSOTROS</h1>
           </hgroup>

             <p data-role='col1'>
                 Contamos con más de 15 años de experiencia en fabricación y comercialización de las mejores soluciones  para:

                 <br /><br />
                 <span class="num-color">1.</span> Industrias de eventos y de grandes obras.<br /><br />

                   <span class="num-color"> 2. </span>Infraestructuras.<br /><br />

                   
                   <span class="num-color"> 3.</span> Construcción.<br /><br />

                 Conocemos las necesidades y tendencias del mercado y a cada cliente ofrecemos atención personalizada con propuestas caracterizadas, excelente relación innovación costo-precio-garantía y funcionalidad.
             </p>

          </div>
          
          <p class="left"  data-role='col2'  >
              Estamos ubicados en Sincelejo, en la zona industrial, contamos con instalaciones idóneas y talento humano profesional en constante capacitación para prestar y garantizar un excelente servicio a nuestros clientes. 
              <a href="#abrir" rel="#mision-vision" style="font-size: 11px;
color: rgba(0, 0, 0, 0.85);
font-weight: bold;">Ver más...</a>
              <br />
              <img src="http://placehold.it/257x225" alt="" style="margin-top:5px" width="257"/>

          </p>
          
      </div>

      <div id="mision-vision" class="pop">

           <article>

               <h1>Misión</h1>

               <p>

Alcanzar y mantener el liderazgo y la excelencia produciendo, desarrollando y abasteciendo productos de Concreto de la mejor calidad, aportando soluciones que satisfagan totalmente las necesidades de nuestros clientes; Somos un aporte positivo para la sociedad, generando economía a nuestro Departamento.


               </p>




           </article>

           <br /> <br />

            <article>

               <h1>Visión</h1>

               <p>

Ser los mejores en producir, desarrollar y abastecer productos de concreto obtenidos con materias primas de óptima calidad que provean soluciones económicas al mercado de la construcción a nivel local y departamental, con la utilización de equipos de tecnología y de un recurso humano capacitado y motivado capaz de brindar bienestar, preservar el medio ambiente y lograr una rentabilidad adecuada; nuestro compromiso es la eficiencia.


               </p>


               <span class="cerrar"> <a href="#cerrar" rel="#mision-vision">X <u>cerrar</u></a> </span>

              

           </article>

      </div>

  </section>



   <?php echo file_get_contents( __DIR__ . "/partes/pie.php"); ?>

 </body>

</html>