<main>

    <section class="ofertas">

        <div class="contenedor">
            <h2 class="titulo animate__animated animate__fadeInDown">
                <?php             
                    if(!empty($productos[0])){
                        echo $productos[0]->categoria;
                    }else{
                        echo "No hay productos disponibles";
                    }
                ?>
            </h2>
        </div>

        <?php if(!empty($productos[0])) { ?>

        <!-- Buscador -->
        <div class="busqueda-productos container">
            
            <form action="<?php echo base_url("categorias/" . $productos[0]->id_categoria) ?>" method="post">

                <div class="elementos-busqueda">
                    <p class="leyenda-busqueda">Realice una búsqueda: </p>
                    <input name="busqueda" class="input-busqueda" type="text" autocomplete="off">
                    <input class="boton-busqueda" type="submit" value="Buscar">
                    <a class="leyenda-busqueda reestablecer-listado" href="<?php echo base_url("categorias/" . $productos[0]->id_categoria) ?>">Reestablecer</a>
                </div>
                
                <!-- <p class="leyenda-busqueda">Fecha: 
                    <input class="input-busqueda" type="text"> 
                    <input class="boton-busqueda" type="submit" value="Buscar">
                </p> -->

            </form>

        </div>

        <?php } ?>

        <div class="container animate__animated animate__fadeIn">

            <div class="productos">

                <!-- Productos -->

                <?php foreach($productos as $row) { 
      
                    if($row->estado == 1 && $row->stock > 0) {?>

                        <a href="<?php echo base_url("producto/$row->id_producto") ?>" class="items">

                            <!-- Imagen de muestra -->
                            <img class="img-producto img-fluid" src="<?php echo base_url()?>uploads/<?php echo $row->imagen;?>" alt="">
                
                            <!-- Nombre del producto -->
                            <p class="nombre-producto"><?php    echo $row->ensambladora, " ", $row->nombre;   ?></p>

                        </a>

                    <?php } ?>

                <?php } ?>

                <!-- Productos END -->

            </div>

        </div>

    </section>

</main>