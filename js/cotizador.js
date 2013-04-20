
     function lisHash(){

        $("a[href='#cotizar']").click(function(){

             $("form[name='cotizador']").submit();

        });

         $("a[href='#cerrar']").click(function(){

              $($(this).attr("rel")).fadeOut();
              $(".over").fadeOut();

         });

         $(".over").click(function(){

            $(this).fadeOut();
            $(".popUp").fadeOut();

         });

       }


         function valCant(nombre,val,um,cMin){

          var preg = false;

          if(!cMin)
            var cMin = 7;

            if(val < cMin && val != 0)
            { 

               preg = confirm("La cantidad mínima de "+ nombre +" es "+ cMin +" "+um+", Desea realizar la cotización con "+ cMin +" "+um+"?");
            

            }


            if(cMin == val )
               preg = true;

            if(val > cMin)
               return val;

               if(preg){
                 
                  return cMin;
                  console.log(cMin);
                 
                  }
                else{

                  return 0;
                  console.log(val);

                  }



         }


         function formEve() {

           $("form[name='cotizador']").submit( function(){

            var v = {

                pBloque : parseInt($("select[name='bloque']").val()),
                cBloque : ($("input[name='cbloques']").val() == "") ? 0 : $("input[name='cbloques']").val(),
                pGravilla : 480000 / 7,
                cGravilla : ($("input[name='gravilla']").val() == "") ? 0 : $("input[name='gravilla']").val(),
                triturado : 480000 / 7,
                cTriturado : ($("input[name='triturado']").val() == "") ? 0 : $("input[name='triturado']").val(),
                balastro : 180000 / 7,
                cBalastro : ($("input[name='balastro']").val() == "") ? 0 : $("input[name='balastro']").val(),
                pArena : parseInt($("select[name='arena']").val()) / 7,
                cArena : ($("input[name='arena']").val() == "") ? 0 : $("input[name='arena']").val(),
                ciudad : parseInt($("select[name='ciudad']").val())
 
            };



            var cant = $(this).find("input"); // seleccionamos los input quienes hacen referencia a las cantidades en este caso. Esta linea nos regresará un vector con los elementos
                        //$(this) hace referencia al elemento form[name='cotizador'] ya que estamos dentro de su evento submit $("input[name='cotizador']).submit(callback); ")

            console.log(cant); // imprimimos el objeto cant en la consola 

            //recorremos el vector cant para validar que los datos son numericos en caso que hallan sido seteados por el usuario

           for(var i = 0 ; i < cant.length ; i++)
            if( !/^[0-9]/.test( trim($(cant[i]).val().toString()) ) && trim( $(cant[i]).val().toString() ) != "") // validamos con un patron /^[0-9]/g (númerico) y también validamos que no este vacio "" el elemento
            {

              // si el campo no esta vacio y no es númerico entonces lanzamos la alerta notificando al usuario 
              alert("Las Cantidades deben ser númericas ej. 12");
              return false;

            }

            var tCant = new Array(); // iniciamos un arreglo 

            if(v.cBloque != 0 && v.pBloque == 0)  // verificamos que el usuario halla seteado una cantidad pero no halla seleccionado un tipo de bloque
                tCant.push("bloque"); // añadimos al arreglo la palabra bloque ya que no ha selecciondado un tipo
            if(v.cArena != 0 && v.pArena == 0) // verificamos que el usuario halla seteado una cantidad pero no halla seleccionado un tipo de arena
                tCant.push("arena");// añadimos al arreglo la palabra arena ya que no ha selecciondado un tipo

              //ahora verificamos que el arreglo tiene algun registro, si es asi entonces concatenamos cadena para mostrar un mensaje amigable al usuario

          if(tCant.length > 0){

            var msg = "Debes seleccionar un tipo de "; // iniciamos mensaje

             alert(msg + tCant.join(" y ")); // convertimos el arreglo a String con .join y lo concatenamos con la y ( bloque y arena)
                                            // en caso que solo tenga un registro muestra solo bloque o arena

            return false;


          }

          // este paso es el mismo que la linea 503 a la 520 solo que ahora miramos si el usuario selecciono un tipo pero no una cantidad

          if(v.cBloque == 0 && v.pBloque != 0)
                tCant.push("bloques (und)");
            if(v.cArena == 0 && v.pArena != 0)
                tCant.push("arena (mts3)");

          if(tCant.length > 0){

            var msg = "Debes especificar cantidad de ";

             alert(msg + tCant.join(" y "));

            return false;


          }       


          // validamos las cantidades mínimas llamando a la función valCant que recibe 
          //valCant(String nombre del elemento,int cantidad seteada por el usuario,String unidad de medida del elemento,int cantidad minima permitida)

            v.cBloque = valCant("Bloque",v.cBloque,"unds",20);
            v.cGravilla = valCant("Gravilla",v.cGravilla,"mts3");
            v.cTriturado = valCant("Triturado",v.cTriturado,"mts3");
            v.cBalastro = valCant("Balastro",v.cBalastro,"mts3");
            v.cArena = ( v.pArena != 0 ) ? valCant("Arena",v.cArena,"mts3") : v.cArena;

            //calculamos el total de cada elemento multiplicando su precio por su cantidad

            var bloque = v.pBloque * v.cBloque;
            var gravilla = v.pGravilla * v.cGravilla;
            var triturado = v.cTriturado * v.triturado;
            var balastro = v.cBalastro * v.balastro;
            var arena = v.pArena * v.cArena;
            var ciudad = v.ciudad;

            //consolidamos todos los elementos sumandolos en esta variable
            var total = bloque + gravilla + triturado + arena + balastro;

            //miramos si el usuario selecciono una ubicacion, si es así entonces calculamos
            //sumando segun el % de la ubicacion a la variable total
            if(ciudad != 0 ) 
              total += ( (ciudad * total) / 100) ;

            //seteamos el valor de total en el elemento span.valor quien es el que 
            //que muestra el total en la caja de cotización al usuario
            $(".popUp span.valor").text("$" + total.toFixed(1));

            //Los elementos que muestran la cotización están ocultos los mostramos con el 
            //método fadeIn()
            $(".over").fadeIn();
            $(".popUp").fadeIn();


            //mostramos en consola el objeto v quien es quien contiene toda la info del
            //formulario cotizador (esto es a nivel de producción)
            console.log(v);


            //retornamos false para que el evento por defecto del form no se dispare
            //el evento defecto de un form es redireccionar la web a lo seteado en el 
            //atributo action, y pasando las variables del form ya sea por URL o por Cabeceras
            //si deseas saber más lee acerca Cabeceras http 
              return false;

          });
  
             }

      //esta funcion es donde llamamos todos los metodos que hacen parte del 
      // app cotizador (es quien la inicia)

      function ini(){

              lisHash();
              formEve();

      }


        //este es el evento JQuery que se ejecuta cuando el documento ha sido cargado
        //incluyendo la libreria JQuery es algo similar al evento Javascript
        // document.onLoad(callback);
          $(document).ready(function(){

               ini();

              //dentro de este evento iniciamos el app llamando a ini();

          });



//esta funcion que viene abajo hace parte de la libreria phpjs, y lo que hace es
//es eliminar los espacios en blanco al final y al inicio de una cadena
//esto nos es muy util para formatear cadenas y ver si el usuario en verdad ingresa un número (los numeros no tienen espacios " ")

          function trim (str, charlist) {
  // http://kevin.vanzonneveld.net
  // +   original by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
  // +   improved by: mdsjack (http://www.mdsjack.bo.it)
  // +   improved by: Alexander Ermolaev (http://snippets.dzone.com/user/AlexanderErmolaev)
  // +      input by: Erkekjetter
  // +   improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
  // +      input by: DxGx
  // +   improved by: Steven Levithan (http://blog.stevenlevithan.com)
  // +    tweaked by: Jack
  // +   bugfixed by: Onno Marsman
  // *     example 1: trim('    Kevin van Zonneveld    ');
  // *     returns 1: 'Kevin van Zonneveld'
  // *     example 2: trim('Hello World', 'Hdle');
  // *     returns 2: 'o Wor'
  // *     example 3: trim(16, 1);
  // *     returns 3: 6
  var whitespace, l = 0,
    i = 0;
  str += '';

  if (!charlist) {
    // default list
    whitespace = " \n\r\t\f\x0b\xa0\u2000\u2001\u2002\u2003\u2004\u2005\u2006\u2007\u2008\u2009\u200a\u200b\u2028\u2029\u3000";
  } else {
    // preg_quote custom list
    charlist += '';
    whitespace = charlist.replace(/([\[\]\(\)\.\?\/\*\{\}\+\$\^\:])/g, '$1');
  }

  l = str.length;
  for (i = 0; i < l; i++) {
    if (whitespace.indexOf(str.charAt(i)) === -1) {
      str = str.substring(i);
      break;
    }
  }

  l = str.length;
  for (i = l - 1; i >= 0; i--) {
    if (whitespace.indexOf(str.charAt(i)) === -1) {
      str = str.substring(0, i + 1);
      break;
    }
  }

  return whitespace.indexOf(str.charAt(0)) === -1 ? str : '';
}