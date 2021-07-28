<main>

    <section class="contenedor-todos-usuarios container">

        <h2 class="encabezado">Todos los usuarios</h2>

        <?php foreach($usuarios as $row){?>

            <div class="info-usuarios-grid container">

                <div class="datos">
                    <h2>Usuario</h2>
                    <p><?php echo $row->usuario ?></p>
                </div>

                <div class="datos">
                    <h2>Nombre completo</h2>
                    <p><?php echo $row->nombre . " " . $row->apellido ?></p>
                </div>

                <div class="datos">
                    <h2>Documento</h2>
                    <p><?php echo $row->documento ?></p>
                </div>

                <div class="datos">
                    <h2>Email</h2>
                    <p><?php echo $row->email ?></p>
                </div>

                <div class="datos">
                    <h2>Tipo de usuario</h2>
                    <p>
                        <?php 
                            if($row->id_perfil == 1){
                                echo "Administrador";
                            }else{
                                echo "Cliente";
                            }                        
                        ?>                
                    </p>
                </div>

                <div class="datos boton">
                    <h2>Acción</h2>

                    <?php if($row->estado == 1){ ?>
                            <a class="dar-baja" href="<?php echo base_url("activar_desactivar_usuario/$row->id") ?>">Dar de baja</a>
                        <?php }else{ ?>
                            <a class="dar-alta" href="<?php echo base_url("activar_desactivar_usuario/$row->id") ?>">Activar</a>
                        <?php } ?>
                </div>


            </div>

        <?php } ?>

    </section>


</main>