 
$(window).load(function(){

  $.slide_mediaf();


            $("select[name='sec']").change(function(){
 
                 $("form[name='tipo']").submit();


            });

            $("a[href='#!/carga-imagen']").click(function(){

                     $("input[name='image']").click();

                        $("input[name='image']").bind("change",function(){

                              var opts = {

                                tipo:"preg",
                                titulo:"Innova Espacios",
                                mensaje:"<p>Esta seguro, que quiere subir este producto? </p>",
                                info:""

                              }

                              gomo.dialog.ini(opts,function(){

                                        $("input[name='image']").unbind("click");                                     
                                        $("form[name='nueva-image'] input[type='submit']").click();

                              });
                      
                          

                         });
                     

            });


            $("a[href='#!eliminar']").bind("click",function(){

                 var src = $(this).parent().find("img:first").attr("src");
                 var that = $(this);

                    var sp = $(this).attr("id"),
                        opts = {
                               "titulo":"Innova Espacios",
                               "info":"",
                               "mensaje":"<p>Seguro que quieres eliminar esta imagen? <br/>  <br/> <img src='"+src+"' width='230' height='180' alt=''></p>",
                               "tipo":"preg",
                               top:"35%"
                        }
                      
               gomo.dialog.ini(opts,function(){

                             gomo.asy_util.ajax({
                                   url:"../class/driver_eliminar.php",
                                   data:{data:sp},
                                   success: function(json){
                                          
                                           if(json.http == "200")
                                           that.parent().fadeOut(function(){

                                              gomo.dialog.ini({
                                                  titulo:"Innova Espacios",
                                                  mensaje:"Genial, se ha eliminado el producto.",
                                                  info:""                                                  
                                              },function(){
                                                  
                                                   
                                                      $(this).remove();

                                                   });
                                              });

                                   }
                      });

               });
                                

            });

});
