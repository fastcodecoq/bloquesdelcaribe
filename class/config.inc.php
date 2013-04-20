<?php


     if($_SERVER["SERVER_NAME"] == 'localhost') {

         define("system_os","linux");
         define("charset","utf-8");

         define("tag_sel","data-role");

         define("zona_horaria","America/Bogota");
         define("errores","true");

      define("db_server","localhost");
      define("db_user","root");
      define("db_pass","2857811");
      define("db_bd","innova");

      define("serv_key","");
      define("serv_secret","");

      define("path","http://localhost/innova");

     }

   else {

    define("system_os","linux");
    define("charset","utf-8");

       define("tag_sel","data-role");

       define("zona_horaria","America/Bogota");
       define("errores","true");

   define("db_server","localhost");
   define("db_user","bloquesd_gomo");
   define("db_pass",'$up3r_p455w0rd');
   define("db_bd","bloquesd_bd");

   define("serv_key","");
   define("serv_secret","");

   define("path","http://bloquesdelcaribe.com/");


   }




  // datos de CMS

     $secciones = array(

         "nosotros" => 'nosotros.php',
         "contacto" => 'contacto.php',
         "home" => 'index.php',
         "clientes" => 'clientes.php'

     );

  function test_config_inc(){}


putenv("charset=".charset);




