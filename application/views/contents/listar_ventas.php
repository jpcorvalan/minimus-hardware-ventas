<main>

    <section class="container">

        <h2 class="encabezado-listado-ventas">Listado de Ventas</h2>

        <div class="busqueda-ventas">

        <form action="<?php echo base_url('ventas_realizadas') ?>" method="post">

            <div class="elementos-busqueda">
                <p class="leyenda-busqueda">Realice una búsqueda: </p>
                <input name="busqueda" class="input-busqueda" type="text" autocomplete="off">
                <input class="boton-busqueda" type="submit" value="Buscar">
                <a class="leyenda-busqueda reestablecer-listado" href="<?php echo base_url('ventas_realizadas') ?>">Reestablecer</a>
            </div>
            
            <!-- <p class="leyenda-busqueda">Fecha: 
                <input class="input-busqueda" type="text"> 
                <input class="boton-busqueda" type="submit" value="Buscar">
            </p> -->

        </form>

        </div>
        

        <?php foreach($ventas as $row) { ?>

            <div class="container ventas-listadas">

                <div class="datos-venta">
                    <h2>Cliente</h2>
                    <p><?php echo $row->nombre . " " . $row->apellido ?></p>
                </div>
                
                <div class="datos-venta">
                    <h2>Documento</h2>
                    <p><?php echo $row->documento ?></p>
                </div>
                
                <div class="datos-venta fecha">
                    <h2>Fecha</h2>
                    <p><?php echo $row->fecha_venta ?></p>
                </div>

                <div class="datos-venta boton-accion">
                    <a href="<?php echo base_url("detalle_venta/$row->id"); ?>">Ver Detalle</a>
                </div>
            
            </div>

        <?php } ?>
        
    
    </section>


</main>