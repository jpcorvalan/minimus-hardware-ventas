<!-- Barra de navegación START -->
    <div class="barra">
        <nav class="navbar navbar-expand-lg navbar-dark navigationbar">
          <div class="container-fluid">
            <a class="navbar-brand " href="<?php echo base_url('inicio') ?>">
            
              <img class="minimus-logo" src="<?php echo base_url()?>assets/images/minimus_logo.svg" alt="">
              Minimus Hardware
            
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNavDropdown">
              <ul class="navbar-nav ml-auto">

                  <!-- Código PHP para verificar que haya una sesión -->
                  <?php if($this->session->userdata('login')){ ?>

                    
                        <?php if($this->session->userdata('id_perfil') == 1){ ?>

                          <li class="nav-item dropdown">
                            <div class="products-drop">
                              <a class="nav-link dropdown-toggle boton-nav" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Productos
                              </a>
                              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

                              <?php foreach($categorias as $row){ ?>

                                <a class="dropdown-item" href="<?php echo base_url("categorias/$row->id") ?>"><?php echo $row->categoria ?></a>

                              <?php } ?>


                                <!-- <a class="dropdown-item" href="<?php echo base_url('ProjectControllers/procesadores') ?>">Procesadores</a>
                                <a class="dropdown-item" href="#">Placas Madre</a>
                                <a class="dropdown-item" href="<?php echo base_url('ProjectControllers/placas_video') ?>">Tarjetas de video</a>
                                <a class="dropdown-item" href="#">Memorias RAM</a>
                                <a class="dropdown-item" href="#">Discos/SSDs</a>
                                <a class="dropdown-item" href="#">Gabinetes</a>
                                <a class="dropdown-item" href="#">Fuentes</a>
                                <a class="dropdown-item" href="#">Periféricos</a> -->

                              </div>
                            </div>
                          </li>

                          <li class="nav-item">
                            <a class="nav-link boton-nav boton-compra" href="<?php echo base_url('administrador') ?>">Panel de Administrador</a>
                          </li>

                          <li class="nav-item">
                            <a class="nav-link boton-nav boton-compra" href="<?php echo base_url('salir') ?>">Salir</a>
                          </li>

                        <?php } else { ?>

                          <li class="nav-item">
                            <a class="nav-link boton-nav" href="<?php echo base_url('comercializacion') ?>">¿Cómo comprar?</a> 
                          </li>

                          <li class="nav-item dropdown">
                            <div class="products-drop">
                              <a class="nav-link dropdown-toggle boton-nav" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Productos
                              </a>
                              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

                                  <?php foreach($categorias as $row){ ?>

                                    <a class="dropdown-item" href="<?php echo base_url("categorias/$row->id") ?>"><?php echo $row->categoria ?></a>

                                  <?php } ?>

                                <!-- <a class="dropdown-item" href="<?php echo base_url('ProjectControllers/procesadores') ?>">Procesadores</a>
                                <a class="dropdown-item" href="#">Placas Madre</a>
                                <a class="dropdown-item" href="<?php echo base_url('ProjectControllers/placas_video') ?>">Tarjetas de video</a>
                                <a class="dropdown-item" href="#">Memorias RAM</a>
                                <a class="dropdown-item" href="#">Discos/SSDs</a>
                                <a class="dropdown-item" href="#">Gabinetes</a>
                                <a class="dropdown-item" href="#">Fuentes</a>
                                <a class="dropdown-item" href="#">Periféricos</a> -->
                              </div>
                            </div>
                          </li>
                        

                          <li class="nav-item">
                            <a class="nav-link boton-nav boton-compra" href="<?php echo base_url('carrito') ?>">
                              <img class="cart" src="<?php echo base_url()?>assets/icons/cart.png" alt="">  Mi compra
                            </a>
                          </li>                      

                          <li>
                            <div class="nav-link boton-nav boton-compra" href="#">
                                <?php echo $this->session->userdata('nombre'); ?>
                             </div>
                          </li>

                          <li class="nav-item">
                            <a class="nav-link boton-nav boton-compra" href="<?php echo base_url('salir') ?>">Salir</a>
                          </li>
                      
                      <?php } ?>                      

                      <?php } else { ?>

                        <li class="nav-item">
                            <a class="nav-link boton-nav" href="<?php echo base_url('comercializacion') ?>">¿Cómo comprar?</a> 
                          </li>

                          <li class="nav-item dropdown">
                            <div class="products-drop">
                              <a class="nav-link dropdown-toggle boton-nav" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Productos
                              </a>
                              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

                                <?php foreach($categorias as $row){ ?>

                                  <a class="dropdown-item" href="<?php echo base_url("categorias/$row->id") ?>"><?php echo $row->categoria ?></a>

                                <?php } ?>


                                <!-- <a class="dropdown-item" href="<?php echo base_url('ProjectControllers/procesadores') ?>">Procesadores</a>
                                <a class="dropdown-item" href="#">Placas Madre</a>
                                <a class="dropdown-item" href="<?php echo base_url('ProjectControllers/placas_video') ?>">Tarjetas de video</a>
                                <a class="dropdown-item" href="#">Memorias RAM</a>
                                <a class="dropdown-item" href="#">Discos/SSDs</a>
                                <a class="dropdown-item" href="#">Gabinetes</a>
                                <a class="dropdown-item" href="#">Fuentes</a>
                                <a class="dropdown-item" href="#">Periféricos</a> -->


                              </div>
                            </div>
                          </li>

                          <li class="nav-item dropdown">
                            <div class="ingreso-drop">
                              <a class="nav-link dropdown-toggle boton-nav" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Ingresar
                              </a>
                              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                  <a class="dropdown-item" href="<?php echo base_url('login') ?>">Log In</a>
                                  <a class="dropdown-item" href="<?php echo base_url('registrarme') ?>">Registrarse</a>
                              </div>
                            </div>
                          </li>

                      <?php } ?>
                  
              </ul>
            </div>
          </div>
        </nav>
    </div>
      
      
<!-- Barra de navegación END -->