<?php

  session_start();

?>


<!DOCTYPE HTML>
<html lang="es-CO">

<head>

   <?php

       
   include("class/slider.php");


    if(isset($_SESSION["edit"])){
        echo "<script>cond=true</script>";
    }
    else{

        echo "<script>cond=false</script>";

    }


$slide = new slider();


$rs = $slide->carga(array("id_sl"=>1,"html"=>1));

   ?>

    <meta charset="UTF-8" />

    <meta name="keywords" content="Contenedores,Cartagena,Espacios,Diseño,Modulos,carga,baños,colombia,maritimos,bolivar,modulos importados,innova espacios,eventos,fabricación,diseño de espacios,comercio,comercializacion,obras,industria,industrias de eventos,petroleras,petrolera,construcion,mamonal"/>

    <title></title>


     <link rel="stylesheet" href="css/html5_reset.css" type="text/css" />
     <link rel="stylesheet" href="css/reset.css" type="text/css" />
     <link rel="stylesheet" href="css/__estilo_ini.css" type="text/css" />
     <link rel="stylesheet" href="css/botones.css" type="text/css" />
     <link rel="stylesheet" href="css/dialogs.css" type="text/css" />

     <link rel="shortcut icon" href=<?php echo "'".favicon."'"; ?> type="image/png" />

       <link rel="canonical" href="http://www.bloqueradelcaribe.com/" />

      <script type="text/javascript" src="js/jquery.js"></script>
      <script type="text/javascript" src="js/modernizr.js"></script>
      <script type="text/javascript" src="js/html5_ie.js"></script>
      <script type="text/javascript" src="js/slide_media.js"></script>
      <script type="text/javascript" src="js/gomo_uitl.js"></script>
      <script type="text/javascript" src="js/slide.js"></script>



    <script type="text/javascript">

                html5_ie();

               $(document).ready(function(){

                   $.slide_mediaf();

                    if(cond )
                       clos_se();

                       $(".cont-slider").gomo_slider({delay:7000,width:956,height:323});

                         agregar_ima_sl();
                         elimi();


               });




    </script>

    <style type="text/css">
    
        span.span-del{

            position: absolute !important;
            width: 17px;
            right: 0;
            padding: 4px 4px;
            border-radius: 45px;
            font: bold 14px sans-serif;
            background: rgb(200,0,0);
            color: white;
            z-index:2000;
            box-shadow:inset 0 2px 3px #f5f5f5;
            cursor: pointer;
            border: 1px solid #333;

        }

        span.span-del:hover,span.span-del:focus{

            box-shadow:inset 0 2px 3px white;
            background: red;

        }

        span.span-del:active{

            background: rgb(200,0,0);
            box-shadow: none;

        }

   

    </style>


</head>

<body>

  <?php echo file_get_contents( __DIR__ . "/partes/cabeza.php"); ?>
  <?php echo file_get_contents( __DIR__ . "/partes/menu.php"); ?>


  <section id= "cont_centro">    

    <div id = "slider">


        <?php
        if(isset($_SESSION["edit"]))
            echo "
                 <span class='span-del' id='dele' >X</span>
                 <button class='boton-gomo verde' id='agrega' style='position: absolute; top:80px'>Agregar Slide</button>
                 ";


           if(count($rs) > 0) {

               echo "<figure class='cont-slider' id='{$rs[0]['id_slider']}' >";

             foreach($rs as $r){

                 if(!isset($_SESSION["edit"]))
                 echo "
                 <img src='img/slider/{$r["src"]}' alt=''  style='display:none' />

                 ";
                 else
                     echo "

                 <img src='img/slider/{$r["src"]}' id='{$r['id']}'     style='display:none' />

                 ";

             }
           }else{
               echo  '<figure class="cont-slider" id="1" >';
            }

            ?>

        </figure>

    </div>


  </section>




<?php echo file_get_contents( __DIR__ . "/partes/pie.php"); ?>
 

 </body>

</html>