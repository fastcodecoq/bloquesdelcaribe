<?php 

  include( $_SERVER["DOCUMENT_ROOT"] . "/config.php");


?>

<header>

       <figure class="left">

           <a href="inicio" >

               <h1 id="logo">Bloques del Caribe</h1>

           </a>

       </figure>

      <section class="redes-sociales">

      <?php if(!empty($facebook)): ?>
          <figure style="right: 35px">
                <a href="<?php echo $facebook ?>" target="_blank">
                    <span class="icono-fbk"></span>
                </a>
          </figure>
      <?php endif; ?> 

       <?php if(!empty($twitter)): ?>
          <figure style="right: -10px; top: 30px">
              <a href="#" target="_blank">
                  <span class="icono-twitter" ></span>
              </a>
          </figure>
       <?php endif; ?>      

    <?php if(!empty($youtube)): ?>
          <figure style="bottom: 0; right: 40px">
              <a href="#" target="_blank">
                  <span class="icono-mail"></span>
              </a>
          </figure>
    <?php endif; ?>  

      </section>

  </header>