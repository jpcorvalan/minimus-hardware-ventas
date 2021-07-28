    <!-- Bloque de contenido -->

          <main>

            <!-- Carrusel de imágenes -->

            <section class="carrusel">            
              
              <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel" data-bs-pause="false">

                <div class="carousel-inner">
                    <div class="carousel-item active">

                      <!-- Fuente de la imagen 1 -->
                      <img src="<?php echo base_url()?>assets/images/placa_bienvenida.jpg" class="d-block w-100" alt="...">       

                      <div class="carousel-caption d-block d-md-block">
                        <h5 class="d-none d-md-block">Atención personalizada</h5>
                        <p>Nos encargamos de resolver todas tus dudas en forma rápida</p>
                      </div>
                    </div>

                    <div class="carousel-item">

                      <!-- Fuente de la imagen 2 -->
                      <img src="<?php echo base_url()?>assets/images/rtx3090_475p.png" class="d-block w-100" alt="...">

                      <div class="carousel-caption d-block d-md-block">
                        <h5>Llega la Nvidia RTX 3090</h5>
                        <p class="d-none d-md-block">La tarjeta de video más poderosa de Nvidia dedicada al gaming</p>
                      </div>
                    </div>

                    <div class="carousel-item">

                      <!-- Fuente de la imagen 3 -->
                      <img src="<?php echo base_url()?>assets/images/amd_radeon.jpg" class="d-block w-100" alt="...">

                      <div class="carousel-caption d-block d-md-block">
                        <h5>Llega la AMD Radeon RX 5700 XT</h5>
                        <p class="d-none d-md-block">La perfecta mezcla entre potencia, calidad y precio</p>
                      </div>
                    </div>
                </div>

                <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>

                <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>

              </div>

            </section>

            <!-- Carrusel de imágenes END -->


            <!-- Productos en oferta -->

            <section class="ofertas">

              <div class="contenedor">
                <h2 class="titulo animate__animated animate__fadeInDown">Todos los productos</h2>
              </div>

              <div class="container animate__animated animate__fadeIn">

                <div class="productos">

                  <!-- Productos -->

                  <?php foreach($productos as $row) { 
                    
                    if($row->estado == 1 && $row->stock > 0) {?>

                      <a href="<?php echo base_url("producto/$row->id") ?>" class="items">

                          <!-- Imagen de muestra -->
                          <img class="img-producto img-fluid" src="<?php echo base_url()?>uploads/<?php echo $row->imagen;?>" alt="">
                          
                          <!-- Nombre del producto -->
                          <p class="nombre-producto"><?php    echo $row->ensambladora, " ", $row->nombre;   ?></p>

                      </a>

                    <?php } ?>

                  <?php } ?>

                  <!-- Productos END -->

                </div>

              </div>

            </section>

            <!-- Productos en oferta END-->
          
          </main>
      <!-- Bloque de contenido END -->