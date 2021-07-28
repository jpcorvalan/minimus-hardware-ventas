<main>

    <section class="container pagina-ingreso">

        <div class="logueo-contenedor">

            <div class="logueo-tarjeta animate__animated animate__fadeInUp">

                <h2 class="ingresar">Login</h2>

                    <div class="logueo-formulario">

                        <form method="post" action="<?php echo base_url('ingresar') ?>" class="needs-validation" novalidate>

                            <div class="php-error-login">
                                <?php echo validation_errors(); ?>    
                            </div>

                            <label class="logueo-campos" for="">
                                <input name="email" class="logueo-campos" type="text" placeholder="Ingrese su email">
                            </label>

                            <label class="logueo-campos" for="">
                                <input name="password" class="logueo-campos" type="password" placeholder="Contraseña">
                            </label>                        

                            <div class="logueo-boton">
                                <input type="submit" value="Ingresar">
                            </div>

                        </form>
                        
                    </div>

                <p class="aviso-registro">Si aún no dispone de una cuenta en Minimus, entonces debe <a href="<?php echo base_url('ProjectControllers/registro') ?>">REGISTRARSE</a></p>

            </div>

        </div>


    </section>


</main>