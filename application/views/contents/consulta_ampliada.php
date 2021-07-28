<main>

    <section>

        <h1 class="encabezado">Consulta de: <?php echo $consulta->nombre . " " . $consulta->apellido ?></h1>

        <div class="consulta-ampliada container">

            <h3 class="correo">Correo: <?php echo $consulta->email ?></h3>

            <p class="consulta-completa"><?php echo $consulta->consulta ?></p>

        </div>

    </section>

</main>