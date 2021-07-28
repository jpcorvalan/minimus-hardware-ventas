<main>

    <section>
    
        <div class="listado-consultas container">

        <h1 class="encabezado">Consultas de usuarios</h1>


            <div class="busqueda-consultas container">
                <form action="<?php echo base_url('lista_consultas') ?>" method="post">

                    <div class="elementos-busqueda">
                        <p class="leyenda-busqueda">Realice una búsqueda: </p>
                        <input name="busqueda" class="input-busqueda" type="text" autocomplete="off">
                        <input class="boton-busqueda" type="submit" value="Buscar">
                        <a class="leyenda-busqueda reestablecer-listado" href="<?php echo base_url('lista_consultas') ?>">Reestablecer</a>
                    </div>
                    
                    <!-- <p class="leyenda-busqueda">Fecha: 
                        <input class="input-busqueda" type="text"> 
                        <input class="boton-busqueda" type="submit" value="Buscar">
                    </p> -->

                </form>
            </div>

        <?php foreach($consultas as $row){ ?>

            <?php if($row->leido == 0) { ?>
                <div class="consultas-grid-no-leido">
            <?php }else{ ?>
                <div class="consultas-grid-leido">
            <?php } ?>
                    <div class="datos nombre-completo">
                        <h2>Nombre</h2>
                        <p><?php echo $row->nombre . " " . $row->apellido ?></p>
                    </div>

                    <div class="datos email">
                        <h2>Email</h2>
                        <p><?php echo $row->email ?></p>
                    </div>            
                    
                    <div class="datos consulta">
                        <h2>Consulta (Presione para ampliar)</h2>
                        <a class="texto" href="<?php echo base_url("consulta_ampliada/$row->id")?>"><?php echo $row->consulta ?></a>
                    </div>
        
                    <div class="datos leido">                                             
                        <h2>¿Leído?</h2>

                        <?php if($row->leido == 0){ ?>
                            <a href="<?php echo base_url("consulta_leida/$row->id") ?>">No leído</a>
                        <?php }else{ ?>
                            <a href="<?php echo base_url("consulta_leida/$row->id") ?>">Leído</a>
                        <?php } ?>
                    </div>
                
                </div>

        <?php  } ?>
        
                    
        
        </div>
    
    </section>

</main>