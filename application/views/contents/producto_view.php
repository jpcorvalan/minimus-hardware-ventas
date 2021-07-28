<main>


    <section>


        <div class="container vista-producto">


            <div class="tarjeta-producto">

                <h2 class="nombre-producto">
                    <?php echo $ensambladora, " ", $nombre ?>
                </h2>

                <img class="img-fluid img-thumbnail" src="<?php echo base_url()?>uploads/<?php echo $imagen;?>" alt="">

                <div class="informacion-producto">

                    <p class="info-tarjeta">Precio: <?php echo $precio ?></p>

                    <!-- Se aclarará el stock dependiendo de la cantidad que haya -->
                    <?php if($stock > 10){ ?>                        
                        <p class="info-tarjeta bg-success">Stock: Alto</p>
                        <p class="info-tarjeta">Puede ordenar hasta 10 unidades como máximo</p>
                    <?php }else{ ?>
                        <p class="info-tarjeta bg-danger">Stock: Bajo</p>
                        <p class="info-tarjeta">Como el stock es bajo, podrá ordenar 1 sola unidad</p>
                    <?php } ?>                                        
                    

                    <?php if($this->session->userdata('login')){ ?>

                        <form action="<?php echo base_url('carrito') ?>" method="post">

                            <?php if($stock > 10) { ?>

                                <p class="info-tarjeta">Cantidad: 
                                    <input name="cantidad" class="cantidad-pedido" min="1" max="10" type="number" value="1">
                                </p>  
                            
                            <?php } else { ?>

                                <p class="info-tarjeta">Cantidad: 
                                    <input name="cantidad" class="cantidad-pedido" min="1" max="1" type="number" value="1">
                                </p>  

                            <?php } ?>

                            <input name="id" type="hidden" value="<?php echo $id ?>">
                            <input name="producto" type="hidden" value="<?php echo $ensambladora . " " . $nombre ?>">
                            <input name="precio" type="hidden" value="<?php echo $precio ?>">


                            <?php if($this->session->userdata('id_perfil') != 1) { ?>
                                <?php  
                                    $cart = $this->cart->contents();    

                                    if(!empty($cart)){
                                        foreach($cart as $item){
                                            if($item['id'] == $id){ ?>
                                                <p class="info-tarjeta text-danger">Ya tiene este producto en el carro. Bórrelo para modificar la cantidad a llevar.</p>
                                                <?php $bandera = 1 ?>
                                    <?php   }
                                        }
                                    }
                                    
                                ?>
                                <?php if(empty($bandera)) { ?>
                                    <label for="">
                                        <input type="submit" value="Agregar al carrito">
                                    </label>
                                <?php } ?>

                            <?php } ?>

                        </form>

                    <?php } else { ?>

                            <p class="info-tarjeta text-warning">Debe iniciar sesión para poder comprar.</p>

                    <?php } ?>

                </div>
                

            </div>

            <p class="info-especificaciones">Especificaciones</p>

            <!-- <p class="contenido-especificaciones"><?php echo $descripcion ?></p> -->
            <p class="contenido-especificaciones"><?php echo nl2br($descripcion); ?></p>


        </div>


    </section>


</main>