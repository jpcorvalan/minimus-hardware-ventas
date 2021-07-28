<main>

    <section>

        <div class="container detalle-venta">

            <h2 class="encabezado-detalle-venta">Detalle de Venta</h2>

            <div class="nombre-fecha">
                <p><?php echo $detalle_venta[0]->nombre . " " . $detalle_venta[0]->apellido ?></p>
                <p><?php echo $detalle_venta[0]->fecha_venta ?></p>
            </div>

            <div class="columnas-lista">
                <h2>Producto</h2>
                <h2>Precio</h2>
                <h2>Cantidad</h2>
            </div>

            <?php foreach($detalle_venta as $row) { ?>

                <div class="detalle-productos">

                    <div class="detalle">
                        <!-- <h2>Producto</h2> -->
                        <p> <?php echo $row->ensambladora . " " . $row->producto_comprado ?> </p>
                    </div>

                    <div class="detalle">
                        <!-- <h2>Precio</h2> -->
                        <p> <?php echo "$" . $row->precio ?> </p>
                    </div>

                    <div class="detalle">
                        <!-- <h2>Cantidad</h2> -->
                        <p class="text-center"> <?php echo $row->cantidad ?></p>
                    </div>


                </div>

            <?php } ?>

        </div>

    </section>

</main>