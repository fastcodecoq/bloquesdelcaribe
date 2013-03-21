


var productos = {


	init : function(){

                if($(".items ul li").length >= 3)
                 var carrusel =   $col.jCarouselLite({               
                        easing: "bounceout",
                        btnNext: ".sigg,#sig",
                        btnPrev: ".annt,#ant",
                        speed:800,
                        visible:3,
                        start:0,
                        afterEnd: function(a){

                              var src = a.find("img").attr("src");     

                              $("#tearo").attr("src",src);

                        }

                    });
                  
                    


               },

          click_img : function(){


               $(".items img").bind("click",function(){
 
                   var src = $(this).attr("src");
               
                  $("#tearo").attr("src",src);
 

               });

                              

          }

               ,



	  fichas : function(){

      if($(".fichas").length > 0)
	  	$(".fichas").bind("click",function(){
                
                 var clas= $(this).attr("id");
                  

                  $.ajax({

                     url : "class/driver_ficha.php" ,
                     data : { cual : clas },
                     cache: false,
                     async : true,
                     dataType : "json",
                     type : "GET",
                     success: function(json){                   

                         lanzar_superp(json[0]);

                     },
                     error: function(json){

            
                           alert("Ha ocurrido un error ( HTTP "+json.status+" ).");
                         
                     }

                 });

	    });

	  }
	

 };


  function lanzar_superp (contenido){

                console.log(contenido.texto);

              
                var cont = "";

                switch(contenido.tipo){


                         case "img" :

                             cont += "<img src='" + contenido.texto + "' alt=''>";
                             $.preloadImages(contenido.texto);          

                          break;


                          default:

                             cont += "<p>" + contenido.texto + "</p>";                          



                } 

                console.log(cont);

                $("body").append("<div class='superp'><span class='cerrar'>X</span><div class='cont-superp'><h1>Ficha Técnica</h1>"+cont+"</div></div>");

               var left = ( parseInt($(".superp").width()) / 2 ) * -1;
               var top = ( parseInt($(".superp").height()) / 2 ) * -1;

            
                	$(".superp").css({
               	   marginLeft : left + "px"
                     });
 
        

                $(".superp").fadeIn(function(){


                	   var that = $(this);

                            $(".superp .cerrar").bind("click",function(){

                                    that.remove();
                            	
                            });

                });

	        }

jQuery.preloadImages = function() {
  for(var i = 0; i<arguments.length; i++){
    jQuery("<img>").attr("src", arguments[i]);
   }
}

