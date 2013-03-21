<?php

    include("config.inc.php");
    include("sql.php");


    class eliminar{

         private $uid,$name,$sql;

           function __construct($bb){
                      
                       $bb = str_replace(array("[","]"),"",$bb);
                       $data = explode(":",$bb);

                       $this->uid = $data[0];
                       $this->name = $data[1];
                       $this->sql = new app_sql("albumes");                      

                       $this->init();

           }


           function init(){
                
                  $stm = $this->sql;

                  if( $stm->__insert("DELETE FROM albumes WHERE uid='{$this->uid}' AND img='{$this->name}'") )
                  	  echo json_encode( array("http"=>"200" ) );
                  else
                  	  echo json_encode( array("http"=>"403" ) ); 

                  $stm->desc();

           }

    }


    function main(){
 

            $driver = new eliminar($_GET["data"]);            


    }


    main();