<div style="margin-bottom: 20px">
    <h3>
        <?php echo isset($titulo)?$titulo:"";  ?>
    </h3>

    <nav>
        <?php
        $path="";
        if($_SERVER['PHP_SELF']!="/consultar.php"){
            $path="../";
        }
        ?>
        <a style=" text-decoration: none" href="<?php echo $path ?>../Taller2/Consultar.php">Consultar Datos</a>
        <a href="#" id="ingresarDatosLink" style=" text-decoration: none ">Ingresar Datos</a>
    </nav>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
        $("#ingresarDatosLink").click(function(e) {
            e.preventDefault(); // Evita que el enlace realice la acción predeterminada de navegación

            // Realiza la carga dinámica del contenido desde Insertar.php
            $("#resultado").load("../Taller2/Insertar.php");
        });
    });
</script>