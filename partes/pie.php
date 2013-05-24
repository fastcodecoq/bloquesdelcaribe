  
  <div id="pedido">
      
      <form>
<br/>
          
          <span>* Nombre / Empresa</span> 
          <input type="text" name="nombre" placeholder="Nombre..." pattern="[a-zA-Z\s]*">
<br/>
<br/>
          <span>* Telefono</span> 
          <input type="text" name="telefono" placeholder="(095) 282-2011" pattern="[0-9\s+()-]*">
          <br/>
<br/>
          <span>*Dirección (Por favor especifique Barrio y Ciudad)</span> 
          <input type="text" name="direccion" placeholder="Dirección de entrega..." pattern="^[a-zA-Z0-9#-\s]*">

<br/>
<br/>
          <span>Correo </span> 
          <input type="text" name="correo" placeholder="sucorreo@correo.com" pattern="^[a-zA-Z-_.]{3,30}@[a-zA-Z_]{3,30}[.][a-zA-Z]{2,4}([.][a-z]{2})?">
<br />
<br />
<br />
          <legend>
              <span style="width:100%">Agregar productos</span>
              <select name="producto_">
                 <option value="0">Seleccione un producto...</option>

                 <option value="Bloque vibrado 0.9 Divisorio tipo 1">Bloque vibrado 0.9 Divisorio tipo 1</option>
             <option value="Bloque vibrado 0.15 Divisorio tipo 1">Bloque vibrado 0.15 Divisorio tipo 1</option>
             <option value="Bloque vibrado 0.15 estructural tipo 2">Bloque vibrado 0.15 estructural tipo 2</option>
             <option value="Bloque vibrado 0.15 aburzardado split tipo 3">Bloque vibrado 0.15 aburzardado split tipo 3</option>
             <option value="Bloque vibrado 0.20 estructural tipo 2">Bloque vibrado 0.20 estructural tipo 2</option>
             <option value="Gravilla">Gravilla</option>
             <option value="Triturado">Triturado</option>
             <option value="Arena gris lavada">Arena gris lavada</option>
             <option value="Arena de roja">Arena de roja</option>
              </select>
              <input type="text" name="cantidad_" placeholder="Cantidad...">   
              <a href="#add_pedido" class="btn btn-primary">+ agregar</a>           
              <br />   <br />
              <span>Sus productos agregados:</span>
              <ul id="ul_prods" style="width:100%; float:left; height: 70px;overflow: auto !important">
                 
                 <li class="counter">Total productos: <b>0</b></li>
              </ul>

          </legend>

          <br />

           <legend>
              <span style="width:100%">Agregar sugerencias para el pedido</span>
              <textarea name="sugerencia" style="float:left; width:70%; text-align:left; padding: .4em">Escriba aquí su sugerencia...
              </textarea>          

          </legend> <br />
          <br />


          <a href="#do_pedido" class="btn btn-primary">Hacer Pedido</a> &nbsp;
          <a href="#cerrar" rel="#pedido" class="btn ">Cerrar</a>

          <br />
          <br />

      </form>

  </div>

  <footer id="pie">

       <div class="cont-cola">

       <section class="dis-pro left">


              <figure>
                 <a href="http://argos.co" target="_blank">
                    <img src="img/logoargos.gif" alt="" width="80" />
                 </a>
              </figure>



       </section>

           <section class="copyrights right">

               <hgroup class="left">

                   <h1> BLOQUES DEL CARIBE &copy; <?php echo date("Y"); ?>. Sincelejo - Colombia.</h1>

               </hgroup>

           </section>

       </div>

   </footer>

   <script type="text/javascript" src="js/cotizador.js"></script>