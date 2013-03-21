<?php

include("config.inc.php");
include("sql.php");

    

    function consultar($donde){

              $stm = new app_sql("fichas");
              
              $rs = $stm->_sel("*","WHERE sec = '{$donde}'");

              $rs[0]["texto"] = utf8_encode($rs[0]["texto"]);

              echo json_encode(($rs));


    }



   function main(){

        if($_GET)
        {

            
        	 $cual = explode(":",$_GET["cual"]);

        	 	consultar($cual[1]);


        }
        else
        	 consultar("casetas");

   }



   main();