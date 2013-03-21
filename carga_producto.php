<?php
   
     include("config.inc.php");
     include("sql.php");
     include("carga.php");



     class carga_el_puto_producto{

        private $sql,$file;

          function __construct(){


                    $this->sql = new app_sql("albumes");

          }


          function carga(){

                  $stm = $this->sql;
                  $carga = new carga("image",$this->file);

                  if($carga->lanzar()){
                  $rs = $stm->__insert("INSERT  into 'albumes' (uid,image) VALUES ()");                 
                     } 


          }

      

          function obt_uid($sec){

                     $stm = $this->sql;

                     $stm->camb_tabla("productos");

                     $rs = $stm->_sel("uid","WHERE sec='{$sec}'");

                     return $rs[0]["uid"];

          }


     }


     static function main(){

     	    $driver = new carga_el_puto_producto("image",$_GET["file"],$_GET["sec"]);

     }