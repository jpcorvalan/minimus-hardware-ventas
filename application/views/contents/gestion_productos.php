<main>

    <section>

        <div class="gestion-productos container">

        <h3 class="titulo-form-alta-producto">Listado de productos</h1>

            <div class="busqueda-productos-admin container">
                <form action="<?php echo base_url('gestion_producto') ?>" method="post">

                    <div class="elementos-busqueda">
                        <p class="leyenda-busqueda">Realice una búsqueda: </p>
                        <input name="busqueda" class="input-busqueda" type="text" autocomplete="off">
                        <input class="boton-busqueda" type="submit" value="Buscar">
                        <a class="leyenda-busqueda reestablecer-listado" href="<?php echo base_url('gestion_producto') ?>">Reestablecer</a>
                    </div>
                    
                    <!-- <p class="leyenda-busqueda">Fecha: 
                        <input class="input-busqueda" type="text"> 
                        <input class="boton-busqueda" type="submit" value="Buscar">
                    </p> -->

                </form>

                <form action="<?php echo base_url('gestion_producto') ?>" method="post">

                    <div class="filtro-busqueda">

                        <p class="leyenda-busqueda">Ordenar por:</p>

                        <select name="seleccionar-filtro" id="">
                            <option value="-">-</option>
                            <option value="stock-alto">Stock alto</option>
                            <option value="stock-bajo">Stock bajo</option>                  
                            <option value="precio-alto">Precio alto</option>
                            <option value="precio-bajo">Precio bajo</option>
                            <option value="inactivos">Inactivos</option>      
                        </select>

                        <input class="leyenda-busqueda reestablecer-listado" type="submit" value="Ordenar">

                    </div>               

                
                </form>

            </div>

            <?php foreach($producto as $row) { ?>

            <?php if($row->stock <= 10 || $row->estado == 0) {?>

                <div class="stock-danger">

            <?php   } else {    ?>

                <div class="datos-producto">                

            <?php } ?>

                    <div class="">
                        <h2>Nombre</h2>
                        <p><?php    echo $row->nombre;   ?></p>
                    </div>

                    <div class="">
                        <h2>Fabricante</h2>
                        <p><?php    echo $row->fabricante;   ?></p>
                    </div>

                    <div class="">
                        <h2>Ensamblador</h2>
                        <p><?php    echo $row->ensambladora;   ?></p>
                    </div>

                    <div class="">
                        <h2>Precio</h2>
                        <p><?php    echo $row->precio;   ?></p>
                    </div>

                    <div class="">
                        <h2>Categoría</h2>
                        <p>
                            <?php    
                                
                                foreach($categoria as $row2){
                                    $cat[$row2->id] = $row2->categoria;
                                }

                                echo $cat[$row->id_categoria]
                        
                            ?>                        
                        </p>
                    </div>

                    <div class="">
                        <h2>Stock</h2>
                        <p><?php    echo $row->stock;   ?></p>
                    </div>

                    <div class="">
                        <h2>Garantía</h2>
                        <p><?php    echo $row->garantia;   ?></p>
                    </div>

                    <div class="">
                        <h2>Activo/Inactivo</h2>
                        <p><?php    if($row->estado == 0){
                            print("Inactivo");
                        }else{
                            print("Activo");
                        }   ?></p>
                    </div>

                    <div class="imagen-de-lista">
                        <img class="img-fluid img-thumbnail" src="<?php echo base_url()?>uploads/<?php echo $row->imagen;?>" alt="">
                    </div>

                    <div class="boton-modificar">
                        <!-- <input type="submit" value="Modificar"> -->
                        <a href="<?php echo base_url("editar_producto/$row->id"); ?>">Modificar</a>
                        <!-- <a href="<?php echo base_url("ProductControllers/form_editar_producto/$row->id"); ?>">Modificar</a> -->
                    </div>

                </div>

            <?php } ?>


            <div class="productos">



            </div>

        </div>

    </section>    

</main>