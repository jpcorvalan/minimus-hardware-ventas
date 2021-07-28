<main>
    <section class="pagina-registro">

    <div>

        <div class="items-registro animate__animated animate__fadeInUp">

            <h2 class="registrar">Registro</h2>

                    <div class="registro-formulario">

                        <form method="post" action="<?php echo base_url('registrar') ?>" class="needs-validation" novalidate>

                            <div class="php-error">
                                <?php echo validation_errors(); ?>    
                            </div>
                        
                            <label class="registro-campos" for="">
                                <input name="usuario" class="registro-campos" type="text" placeholder="Ingrese un usuario" required autocomplete="off">
                                <div class="invalid-feedback">No ha especificado su nombre de usuario</div>
                            </label>
        
                        
                            <label class="registro-campos" for="">
                                <input name="password" class="registro-campos" type="password" placeholder="Ingrese una contraseña" required autocomplete="off">
                                <div class="invalid-feedback">No ha especificado su contraseña</div>
                            </label>

                        
                            <label class="registro-campos" for="">
                                <input name="passconf" class="registro-campos" type="password" placeholder="Confirme su contraseña" required autocomplete="off">
                                <div class="invalid-feedback">Este campo es obligatorio</div>
                            </label>

                        
                            <label class="registro-campos" for="">
                                <input name="email" class="registro-campos" type="text" placeholder="Ingrese un correo" required autocomplete="off">
                                <div class="invalid-feedback">No ha especificado su correo electrónico</div>
                            </label>

                        
                            <label class="registro-campos" for="">
                                <input name="nombre" class="registro-campos" type="text" placeholder="Nombre" required autocomplete="off">
                                <div class="invalid-feedback">No ha especificado su Nombre</div>
                            </label>

                        
                            <label class="registro-campos" for="">
                                <input name="apellido" class="registro-campos" type="text" placeholder="Apellido" required autocomplete="off">
                                <div class="invalid-feedback">No ha especificado su apellido</div>
                            </label>

                        
                            <label class="registro-campos" for="">
                                <input name="documento" class="registro-campos" type="text" placeholder="Número de documento" required autocomplete="off">
                                <div class="invalid-feedback">No ha especificado su número de documento</div>
                            </label>

                            <div class="registro-boton">
                                <input type="submit" value="Registrarme">
                            </div>

                            <!-- <input type="submit" class="btn btn-primary" value="Guardar"> -->

                        </form>

                        <p class="aviso-logueo">Si ya tiene una cuenta en Minimus, entonces debe <a href="<?php echo base_url('ProjectControllers/ingreso') ?>">INGRESAR</a></p>
                    </div>
                
        </div>

    </div>


        <!-- Código JS para evitar formulario vacío -->

            <script>
                // Example starter JavaScript for disabling form submissions if there are invalid fields
                (function() {
                'use strict';
                window.addEventListener('load', function() {
                    // Fetch all the forms we want to apply custom Bootstrap validation styles to
                    var forms = document.getElementsByClassName('needs-validation');
                    // Loop over them and prevent submission
                    var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                    });
                }, false);
                })();
            </script>

    </section>
</main>

<!-- <?php echo base_url('ProjectControllers/ingreso') ?> -->