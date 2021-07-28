<main>

    <section>

        <div class="container">

            <h3 class="titulo-form-alta-producto">Formulario para dar de alta un producto</h1>

            <!-- <form method="POST" action="" class="needs-validation form-alta-producto" novalidate> -->

            <?php echo form_open_multipart('registrar_producto') ?>

                <div class="php-error">
                    <?php echo validation_errors(); ?>    
                </div>

                <label class="alta-producto-campos" for="">
                    <div class="alta-producto-indicadores">Nombre del producto</div>
                    <input name="nombre" type="text" class="alta-producto-campos" placeholder="Nombre del producto" autocomplete="off" required>
                    <div class="invalid-feedback">Especifique el nombre</div>
                </label>

                <label class="alta-producto-campos" for="">
                    <div class="alta-producto-indicadores">Fabricante</div>
                    <input name="fabricante" type="text" class="alta-producto-campos" placeholder="Fabricante del producto" required>
                    <div class="invalid-feedback">Especifique el fabricante</div>
                </label>

                <label class="alta-producto-campos" for="">
                    <div class="alta-producto-indicadores">Ensambladora</div>
                    <input name="ensambladora" type="text" class="alta-producto-campos" placeholder="Ensambladora del producto" required>
                    <div class="invalid-feedback">Especifique la empresa ensambladora</div>
                </label>

                <label class="alta-producto-campos" for="">
                    <div class="alta-producto-indicadores">Precio</div>
                    <input name="precio" type="text" class="alta-producto-campos" placeholder="Precio del producto" autocomplete="off" required>
                    <div class="invalid-feedback">Especifique el precio</div>
                </label>

                <label class="alta-producto-campos" for="">
                    <div class="alta-producto-indicadores">Descripción</div>
                    <textarea name="descripcion" class="alta-producto-campos" id="" rows="10" placeholder="Escriba la descripción del producto"></textarea>
                    <div class="invalid-feedback">Escriba una descripción del producto</div>
                </label>

                <label for="categoria" class="alta-producto-campos" for="">
                    <div class="alta-producto-indicadores">Categoría</div>
                    <?php
                        
                        $lista['0'] = 'Seleccione categoría...';

                        foreach ($categorias as $row){
                            $lista[$row->id] = $row->categoria;
                        }

                        echo form_dropdown('categoria', $lista, '0', 'class="alta-producto-campos"');

                    ?>
                    <div class="invalid-feedback">Especifique la categoría</div>
                </label>

                <label class="alta-producto-campos" for="">
                    <div class="alta-producto-indicadores">Stock</div>
                    <input name="stock" type="text" class="alta-producto-campos" placeholder="Cantidad de stock disponible" autocomplete="off" required>
                    <div class="invalid-feedback"></div>
                </label>

                <label class="alta-producto-campos" for="">
                    <div class="alta-producto-indicadores">Garantía</div>
                    <input name="garantia" type="text" class="alta-producto-campos" placeholder="Garantía (Especifique año/días)" required>
                    <div class="invalid-feedback"></div>
                </label>

                <label class="alta-producto-campos" for="">
                    <div class="alta-producto-indicadores">Estado</div>

                    <?php 
                        
                        $estados[0] = "Inactivo";
                        $estados[1] = "Activo";

                        echo form_dropdown('estado', $estados, 1, 'class="alta-producto-campos"');

                    ?>
                    
                    <!-- <input name="estado" type="text" class="alta-producto-campos" placeholder="Estado: 1 = Activo | 0 = Inactivo" required> -->
                    <div class="invalid-feedback"></div>
                </label>


                <label class="" for="">
                    <div class="alta-producto-indicadores">Suba la imagen del producto</div>

                    <?php echo form_input([
                        'name' => 'imagen',
                        'id' => 'imagen',
                        'type' => 'file',
                        'value' => set_value('imagen')
                    ]); ?>

                    <!-- <input id="imagen" name="imagen" type="file" class="alta-producto-campos" required> -->
                    <div class="invalid-feedback"></div>
                </label>

                <div class="boton-agregar-producto">
                    <input type="submit" value="Agregar producto">
                </div>

            <?php echo form_close(); ?>
            <!-- </form> -->

        </div>
        
    </section>


</main>