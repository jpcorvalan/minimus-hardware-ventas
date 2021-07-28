<!-- Footer -->          

          <footer id="consultas-ubicacion">

            <div class="consultas-ubicacion">
                <h3>Consultas y ubicación</h3>                  
            </div>

            <div class="container">

                <div class="form-map">

                    <div class="item-grid-consultas">

                      <form action="<?php echo base_url('registrar_consulta') ?>" method="post">

                          <div class="php-error">
                              <?php echo validation_errors(); ?>    
                          </div>

                          <div class="nombre">
                              <label class="campos-ind" for="">
                                <input name="nombre" class="campos-ind" type="text" placeholder="Nombre" autocomplete="off">
                              </label>
                          </div>

                          <div class="apellido">
                              <label class="campos-ind" for="">
                                <input name="apellido" class="campos-ind" type="text" placeholder="Apellido" autocomplete="off">
                              </label>
                          </div>

                          <div class="dir-correo">
                              <label class="campos-ind" for="">
                                <input name="email" class="campos-ind" type="text" placeholder="E-Mail: ejemplo@email.com" autocomplete="off">
                              </label>
                          </div>

                          <div class="mensaje">
                              <label class="texto-grande" for="">
                                <textarea name="mensaje" id="" cols="30" rows="7" placeholder="Escriba su consulta"></textarea>
                                <!-- <input name="mensaje" class="texto-grande" type="text" placeholder="Escriba su consulta"> -->
                              </label>
                          </div>

                          <div class="boton-form">
                              <label class="enviar" for="">
                                <input class="enviar" type="submit" value="Enviar consulta">
                              </label>
                          </div>

                      </form>

                    </div>

                    <div class="item-grid">

                        <div class="mapa">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d601.2145683508218!2d-67.4772629489678!3d-45.862115493145!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses-419!2sar!4v1618689976303!5m2!1ses-419!2sar" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        </div>
                        
                    </div>

                </div>

                <div class="row text-center pb-4 pt-4">
                    <div class="col-12 col-lg">
                      <a href="<?php echo base_url('ProjectControllers/contacto') ?>">Información de contacto</a>
                    </div>

                    <div class="col-12 col-lg">
                      <a href="<?php echo base_url('ProjectControllers/terminos') ?>">Términos y usos</a>
                    </div>

                    <div class="col-12 col-lg">
                      <a href="<?php echo base_url('ProjectControllers/nosotros') ?>">Sobre nosotros</a>
                    </div>
                </div>

                <div class="derechos">
                  <p>Minimus Hardware es propiedad Corvalán Juan Pablo. Todos los derechos reservados</p>
                </div>
                
            </div>

         </footer>

      <!-- Footer END -->

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    -->
  </body>
</html>