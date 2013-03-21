<?php


  include("config.inc.php");
  include("sql.php");


   class bbcode{

    public $contenido,$ficha;

   	    function __construct($fgc){

                  $this->contenido  =  file_get_contents(path.$fgc);  

   	    }

        function set_ficha($ficha){

          $this->ficha = utf8_decode("<br /><br /><br /><a href='#!' class='fichas boton-gomo' id='ficha:$ficha'>Ficha Técnica</a>");

        }


     function set_bbcode($etiqueta,$remplaza){


        $this->contenido =  str_replace($etiqueta,utf8_encode($remplaza),$this->contenido);

       }

    function set_bbcode_ul($etiqueta,$remplaza){

           $remplace = "<ul id='galeria'>";           


           foreach($remplaza as $img){


                   $remplace .= "<li><img src='".get_path()."/".$img["img"]."' alt='' class='act' /></li>";

           }

           $remplace .= "</ul>";


           $this->contenido =  str_replace($etiqueta,utf8_encode($remplace),$this->contenido);

    }


   }

   function get_path(){

       switch( (isset($_GET["cual"])) ? $_GET["cual"] : "" ){

          
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

   $stm = new app_sql("productos");


  switch( (isset($_GET["opt"])) ? $_GET["opt"] : "" ){

  case 1:

        $rs = $stm->_sel("*","WHERE sec = '{$_GET['cual']}'");
        $rs = $rs[0]; 

        $where = "WHERE uid = '{$rs['uid']}'";
        
        $stm->camb_tabla("albumes");
        $rs["galeria"] = $stm->_sel("*",$where);      

        $bbcode = new bbcode("/prodt.php?cual={$_GET['cual']}");

        $bbcode->set_ficha($_GET["cual"]);

        $stm->camb_tabla("fichas");        

        $ficha =($stm->_count($where) > 0) ? $bbcode->ficha : "";

        $texto = $rs["texto"].$ficha;

        $bbcode->set_bbcode("[texto:producto]",$texto);  
        $bbcode->set_bbcode("[espacio]","<br />");  
        $bbcode->set_bbcode("[titulo:producto]",$rs["titulo"]);   
        $bbcode->set_bbcode("[img:producto]",get_path()."/".$rs["galeria"][0]["img"]);  
        $bbcode->set_bbcode_ul("[galeria:producto]",$rs["galeria"]);          

        echo $bbcode->contenido;


  break;


  default:

  $rs = $stm->_sel("*","");  
  $rs = $rs[0];
  $rs["texto"] = fix_texto($rs["texto"]);

		$bbcode = new bbcode("/porta-folio.php");


        $stm->camb_tabla("albumes");
        $rs["galeria"] = $stm->_sel("*","WHERE uid = '{$rs['uid']}'");    

		
		$bbcode->set_bbcode("[texto:producto]",utf8_decode($rs["texto"]) );  
		$bbcode->set_bbcode("[img:producto]","img/".$rs["galeria"][0]["img"]); 

		echo $bbcode->contenido;

}


 function fix_texto($text){
          return utf8_encode($text);
 }


