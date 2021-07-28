<main>

    <section>

        <div class="container form-edicion-producto">

            <h3 class="titulo-form-alta-producto">Formulario para editar un producto</h1>

            <!-- <form method="POST" action="" class="needs-validation form-alta-producto" novalidate> -->

            <?php echo form_open_multipart("actualizar_producto/$id") ?>

                <div class="php-error">
                    <?php echo validation_errors(); ?>    
                </div>

                <label class="alta-producto-campos" for="">

                    <div class="alta-producto-indicadores">Nombre actual</div>

                    <!-- Método con HTML puro -->
                    <input name="nombre" type="text" class="alta-producto-campos" value="<?php echo $nombre ?>" placeholder="Nombre del producto" autocomplete="off" required>

                    <!-- Método con CodeIgniter PHP -->
                    <!-- <?php echo form_input([

                        'name' => 'nombre',
                        'id' => 'nombre',
                        'class' => 'alta-producto-campos',
                        'placeholder' => 'Nombre del producto',
                        'value' => "$nombre"]); 
                        
                    ?> -->

                    <div class="invalid-feedback">Especifique el nombre</div>
                </label>

                <label class="alta-producto-campos" for="">
                    <div class="alta-producto-indicadores">Fabricante actual</div>
                    <input name="fabricante" type="text" class="alta-producto-campos" value="<?php echo $fabricante ?>" placeholder="Fabricante del producto" required>
                    <div class="invalid-feedback">Especifique el fabricante</div>
                </label>

                <label class="alta-producto-campos" for="">
                    <div class="alta-producto-indicadores">Ensambladora actual</div>
                    <input name="ensambladora" type="text" class="alta-producto-campos" value="<?php echo $ensambladora?>" placeholder="Ensambladora del producto" required>
                    <div class="invalid-feedback">Especifique la empresa ensambladora</div>
                </label>

                <label class="alta-producto-campos" for="">
                    <div class="alta-producto-indicadores">Precio actual</div>
                    <input name="precio" type="text" class="alta-producto-campos" value="<?php echo $precio?>" placeholder="Precio del producto" autocomplete="off" required>
                    <div class="invalid-feedback">Especifique el precio</div>
                </label>

                <label class="alta-producto-campos" for="">
                    <div class="alta-producto-indicadores">Descripción actual</div>
                    <textarea name="descripcion" class="alta-producto-campos" id="" rows="10" placeholder="Escriba la descripción del producto"><?php echo $descripcion?></textarea>
                    <div class="invalid-feedback">Escriba una descripción del producto</div>
                </label>

                <label for="categoria" class="alta-producto-campos" for="">
                    <div class="alta-producto-indicadores">Categoría actual</div>
                    <?php
                        
                        // $lista['0'] = 'Seleccione categoría...';

                        foreach ($categorias as $row){
                            $lista[$row->id] = $row->categoria;                            
                        }

                        echo form_dropdown('categoria', $lista, $categoria, 'class="alta-producto-campos"');

                    ?>
                    <div class="invalid-feedback">Especifique la categoría</div>
                </label>

                <label class="alta-producto-campos" for="">
                    <div class="alta-producto-indicadores">Stock actual</div>
                    <input name="stock" type="text" class="alta-producto-campos" value="<?php echo $stock?>" placeholder="Cantidad de stock disponible" autocomplete="off" required>
                    <div class="invalid-feedback"></div>
                </label>

                <label class="alta-producto-campos" for="">
                    <div class="alta-producto-indicadores">Garantía actual</div>
                    <input name="garantia" type="text" class="alta-producto-campos" value="<?php echo $garantia?>" placeholder="Garantía (Especifique año/días)" required>
                    <div class="invalid-feedback"></div>
                </label>

                <label class="alta-producto-campos" for="">
                    <div class="alta-producto-indicadores">Estado</div>

                    <?php 
                        
                        $estados[0] = "Inactivo";
                        $estados[1] = "Activo";

                        echo form_dropdown('estado', $estados, $estado, 'class="alta-producto-campos"');
                    
                    ?>

                    <!-- <input name="estado" type="text" class="alta-producto-campos" value="<?php echo $estado?>" placeholder="Estado: 1 = Activo | 0 = Inactivo" required> -->
                    <div class="invalid-feedback"></div>
                </label>


                <label class="" for="">                    

                    <div class="container contenedor-img-actual">
                        <div class="alta-producto-indicadores">Imagen actual del producto</div>
                        <img class="imagen-actual img-fluid img-thumbnail" src="<?php echo base_url()?>uploads/<?php echo $imagen;?>" alt="">
                        <div class="alta-producto-indicadores text-center">Si desea cambiar, suba la nueva<br> imagen del producto</div>
                    </div>
                    
                    
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
                    <input type="submit" value="Actualizar datos del producto">
                </div>

            <?php echo form_close(); ?>
            <!-- </form> -->

        </div>
        
    </section>


</main>