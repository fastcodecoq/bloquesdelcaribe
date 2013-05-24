<?php
  session_start();

   if(!isset($_SESSION["edit"])){
       header("location:index.php");
   }


   function get_path($cual){

       switch( $cual ){

          
           case "contenedores":

             return "img/2";

             break;

          case "modulos":

             return "img/3";

             break;

          case "casetas":

             return "img/1";

           default:

               return "img/4";


       }

   }


   function obt_nom_sec($cual){

       switch($cual){
           
           case "contenedores":

              return "contenedores marítimos";

            break;

            case "modulos":

               return "modulos prefabricados importados";

            break;

            case "casetas":

               return "casetas petroleras prefabricadas";


            break;
         
           default:

             return "baños portátiles y servicios de limpieza";

       }

   }


    $cual = ($_GET && !empty($_GET["sec"])) ?  $_GET['sec'] : "banio" ;




?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8" />

    <title>Bloques del caribe</title>


    <link rel="stylesheet" href="../css/html5_reset.css" type="text/css" />
    <link rel="stylesheet" href="../css/reset.css" type="text/css" />
    <link rel="stylesheet" href="../css/__estilo_ini.css" type="text/css" />
    <link rel="stylesheet" href="../css/botones.css" type="text/css" />
    <link rel="stylesheet" href="../css/dialogs.css" type="text/css" />
    <link rel="stylesheet/less" type='text/css' href="../css/product.css"  />

    <link rel="shortcut icon" href="favicon.png" type="image/png" />

    <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript" src="../js/modernizr.js"></script>
    <script type="text/javascript" src="../js/html5_ie.js"></script>
    <script type="text/javascript" src="../js/gomo_uitl.js"></script>
    <script type="text/javascript" src="../js/slide_media.js"></script>
    <script type="text/javascript" src="../js/less.js"></script>
    <script type="text/javascript" src="../js/driver_cms_productos.js"></script>


    <script type="text/javascript">
       
        less.watch();
        html5_ie();        

        $(document).ready(function(){

          <?php
             
                 if(isset($_SESSION["process"]))
                   if($_SESSION["process"] == 1)                  
                     echo "alert('GEnial se cargó todo ok')";
                  else if($_SESSION["process"] == 0)
                     echo  "alert('Hubo un error cargando la info')";

           ?>

          


             $("input.red").click(function(){

                     opts = {

                         info:"",
                         mensaje:"<form action='javascript:void(0)' name='cambio'>" +
                             "<table>" +
                             "<tr><td>Usuario</td><td><input class='%s' type='text' name='usuario'/></td></tr>" +
                             "<tr><td>Clave antigua</td><td><input class='%mix' type='password' name='pwd'/></td></tr>" +
                             "<tr><td>Clave nueva</td><td><input class='%mix' type='password' name='pwdn1'/></td></tr>"+
                             "<tr><td>Repetir la nueva</td><td><input class='%mix' type='password' name='pwdn2'/></td></tr>" +
                             "<table>" +
                             "</form>",
                         top:"30%",
                         boton:{
                             cerrar:"Cambiar"
                         },
                         titulo:"Innova Espacios"
                     }

                     gomo.dialog.ini(opts,function(){

                         var cond = true;

                         $("form[name='cambio'] input").each(function(){

                             if(!validar($(this))){
                                 $(this).css({border:"1px solid red"});
                                 cond = false;
                                 gomo.dialog.ini(opts);
                             }


                         });


                          


                         var user = $("inpu[name='usuario']").val(),
                              pwd = $("inpu[name='pwd']").val(),
                              pwdn1 = $("inpu[name='pwdn1']").val(),
                              pwdn2 = $("inpu[name='pwdn2']").val();


                       if(cond)
                         gomo.asy_util.ajax({

                             url:"../class/ingr_sis.php",
                             data:{action:2,usuario:user,pwd:pwd,pwdn1:pwdn1,pwdn2:pwdn2},
                             type:"get",
                             success:function(json){

                                 alert(json.estado);

                             }

                         });





                         $("form[name='cambio'] input").click(function(){

                             $(this).css({border:"1px solid #666"});

                         });

                     });

                });

        });

        function dialog(msg){

            var opts = {

                tipo:'dialog',
                mensaje: msg,
                info:''

            };

            gomo.dialog.ini(opts);

        }



    </script>

 

    <style type="text/css">

        form{
            width: 400px;
            margin: 0 auto;
            padding-top: 30px;
        }

        form table {
            margin-left: -20px;

        }

        form table tr td{
            padding: 10px;
        }

        form table tr td label{
            font-size: 1em;
            line-height: 2.5;
        }

        form table tr input[type='text'],form table tr input[type='password']{

            padding: 10px 20px;
            width:300px;
            font: bold 1.5em sans-serif;
            border-radius: 4px;
            box-shadow: inset 2px 2px 5px #999999;
            border: 1px solid #666;
            text-shadow: 0 1px 2px #ededed;


        }

        .boton-gomo{
            margin-left: 10px;
        }

        .verde,.red{
            color: white !important;
            text-shadow: 0  1px 2px #000;
        }

        span.error{
            padding: 5px;
            text-align: center;
            display: block;
            width: 80%;
            color: red;
            margin-top: -8px;
        }

    </style>




</head>

<body>

<header>




</header>


<section id= "cont_centro">


      <h1>Gestor de contenidos  &raquo; productos &raquo;  <?php  echo obt_nom_sec($cual); ?></h1>
 
    <div style='padding:5px 0'>
      <a  href="/" target='_blank' class='boton-gomo verde' style='position:absolute; top:0; right:120px'>Gestionar Sliders</a>
      <a href="../class/ingr_sis.php?action=4"  class='boton-gomo red' style='position:absolute; top:0; right:10px'>Cerrar Sesión</a>
    </div>


        <div class="cont-form">
             <form name="tipo" action='?'>

                <ul>
                    <li class='lft'>
                  <span>Seleccion Una Categoría &raquo;</span>
                  
                   <select type="submit" name="sec">

                       <option value=''> - </option>  
                      <option value='banio'>Baños Portátiles y Servicios de Limpieza</option>                         
                      <option value='casetas'>Casetas Petroleras Prefabricadas</option>
                      <option value='contenedores'>Contenedores Marítimos</option>
                      <option value='modulos'>Modulos Prefabricados Importados</option>


                   </select>

                   <a href="#!/carga-imagen" class="boton-gomo verde">Cargar un nuevo Producto</a>
                   <a href="../productos" target='_blank'>Vista Previa</a>
               </li>
    

           </ul>
             </form>

             <form name="nueva-image" action='../class/carga_producto.php' method="post" enctype="multipart/form-data">
                  <input type="file" name='image' style='display:none'  >
                  <input type="hidden" name='sec' value='<?php echo $cual; ?>'>
                  <input type="submit" value = "enviar" style='display:none'>
             </form>
        </div>

       <nav class = "cont-pared">


           
                    <?php 
                     
                        
                         include ("../class/config.inc.php"); 
                         include ("../class/sql.php");

                           $sql = new app_sql("productos");
                          
                           $rs = $sql->_sel("uid","WHERE sec='{$cual}'");

                           $sql->camb_tabla("albumes");                           
                          if(is_array($rs) && count($rs) > 0){
                           $rs = $sql->_sel("*","WHERE uid = '{$rs[0]["uid"]}'");
                            } 

                           $sql->desc();                         

                        if(is_array($rs) && count($rs) > 0){

                          echo " <ul>";

                           foreach($rs as $val){

                                $path = "../".get_path($cual)."/{$val['img']}";                             
                                echo "<li>
                                <img src='{$path}' alt=''>
                                <a href='#!eliminar' class='boton-gomo red' id='[{$rs[0]["uid"]}:{$val['img']}]' >Eliminar</a>
                                </li>";

                           }
 
                        echo "</ul>"; 

                         } 
                         else 
                             echo "No hay información para gestionar."



                   
                    ?>
               
        </nav>


</section>





<footer id="pie">

    <div class="cont-cola">

        <section class="dis-pro left">


            <hgroup class="left">
   

            </hgroup>



        </section>

        <section class="copyrights right">

            <hgroup class="left">

            </hgroup>

        </section>

    </div>

</footer>



</body>

</html>