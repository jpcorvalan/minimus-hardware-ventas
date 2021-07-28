<main>


    <section>


        <div class="carrito container">

            <h2 class="titulo-carrito">Carrito de compras</h2>

            <h2 class="titulo-carrito text-warning"><?php echo $message ?></h2>


        <?php 
            
            if($cart = $this->cart->contents()) {
                foreach($cart as $item){
                
        ?>
            
                <div class="productos-en-carrito">

                    <div class="contenedor-info">
                        <p class="columnas">Producto</p>                            
                        <p class="datos"><?php echo $item['name'] ?></p>
                    </div>

                    <div class="contenedor-info garantia-dato">
                        <p class="columnas">Garantía</p>
                        <p class="datos"></p>
                    </div>

                    <div class="contenedor-info">
                        <p class="columnas">Precio unitario</p>
                        <p class="datos"><?php echo "$" . $item['price'] ?></p>
                    </div>

                    <div class="contenedor-info">
                        <p class="columnas">Cantidad</p>
                        <p class="datos"><?php echo $item['qty'] ?></p>
                    </div>

                    <div class="contenedor-info">
                        <p class="columnas">Precio total</p>
                        <p class="datos"><?php echo "$" . ($item['price'] * $item['qty']) ?></p>
                    </div>

                    <div class="contenedor-info eliminar-producto-carrito">
                        <p class="columnas boton-eliminar">Acción</p>
                            <a class="" href="<?php echo base_url('borrar/' . $item['rowid']) ?>">Eliminar</a>
                        <p class="datos"></p>
                    </div>

                </div>

        <?php } ?>

            <div>
                <p class="precio-final">Total a pagar: $<?php echo $this->cart->total(); ?></p>
            </div>


            <div class="vaciar-carrito">
                <a href="<?php echo base_url('borrar/' . "all") ?>">Vaciar carrito</a>
            </div>


            <div class="formulario-carrito">

                <form action="<?php echo base_url('realizar_compra') ?>" method="post">

                    <p class="titulo-datos-envio">Datos de envío</p>

                    <div class="php-error">
                        <?php echo validation_errors(); ?>    
                    </div>

                    <label for="">
                        <p class="columnas-form">Provincia</p>
                        <!-- <input name="provincia" type="text" placeholder="Provincia"> -->
                        <select name="provincia" class="columnas-form">
                            <option value="Buenos Aires">Buenos Aires</option>
                            <option value="Capital Federal">Capital Federal</option>
                            <option value="Catamarca">Catamarca</option>
                            <option value="Chaco">Chaco</option>
                            <option value="Chubut">Chubut</option>
                            <option value="Córdoba">Córdoba</option>
                            <option value="Corrientes">Corrientes</option>
                            <option value="Entre Ríos">Entre Ríos</option>
                            <option value="Formosa">Formosa</option>
                            <option value="Jujuy">Jujuy</option>
                            <option value="La Pampa">La Pampa</option>
                            <option value="La Rioja">La Rioja</option>
                            <option value="Mendoza">Mendoza</option>
                            <option value="Misiones">Misiones</option>
                            <option value="Neuquén">Neuquén</option>
                            <option value="Río Negro">Río Negro</option>
                            <option value="Salta">Salta</option>
                            <option value="San Juan">San Juan</option>
                            <option value="San Luis">San Luis</option>
                            <option value="Santa Cruz">Santa Cruz</option>
                            <option value="Santa Fe">Santa Fe</option>
                            <option value="Santiago del Estero">Santiago del Estero</option>
                            <option value="Tierra del Fuego">Tierra del Fuego</option>
                            <option value="Tucumán">Tucumán</option>
                        </select>
                    </label>

                    <label for="">
                        <p class="columnas-form">Dirección</p>
                        <input name="direccion" type="text" placeholder="Dirección" autocomplete="off">
                    </label>

                    <label for="">
                        <p class="columnas-form">Código Postal</p>
                        <input name="codigo-postal" type="text" placeholder="Código Postal" autocomplete="off">
                    </label>

                    <label class="boton-comprar" for="">
                        <input type="submit" value="Comprar">
                    </label>

                </form>

            </div>

        <?php } ?>


        </div>


    </section>


</main>