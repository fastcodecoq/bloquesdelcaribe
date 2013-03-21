<?php
   
     include("config.inc.php");
     include("sql.php");
     include("carga.php");



     class carga_el_puto_producto{

        private $sql,$file,$cual;

          function __construct($file,$cual){


                    $this->sql = new app_sql("albumes");
                    $this->file = $file;
                    $this->cual = $cual;

          }


          function carga(){

                  $stm = $this->sql;
                  $carga = new carga("image",$this->file);

                  $uid = $this->obt_uid();

                  if( $carga->lanzar("../".$this->get_path($this->cual) ) ){
                    
                    $arch = $carga->obt_nombre_arch(); 

                    $rs = $stm->__insert("INSERT INTO   albumes (uid,img) VALUES ('{$uid}','{$arch}')") or die($stm->error());    
    
                    $stm->desc();

                    $_SESSION["process"] = "1";

                    header("location:{$_SERVER['HTTP_REFERER']}");

                  }else{

                         $stm->desc();                        
                         $_SESSION["process"] = "0";

                         header("location:{$_SERVER['HTTP_REFERER']}");
                         
                  }


          }      

     
        function obt_uid(){

                  $stm = $this->sql;

                  $stm->camb_tabla("productos");

                  $rs = $stm->_sel("uid","WHERE sec = '{$this->cual}'");

                  return $rs[0]['uid'];                  

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


   }


  function main(){



        if($_POST && $_FILES){
     	       
               $driver = new carga_el_puto_producto($_FILES["image"],$_POST["sec"]);

               $driver->carga();
             
             }

        else{
              echo "nada";
        }

     }


  main();
