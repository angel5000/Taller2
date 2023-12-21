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
        <a href="<?php echo $path ?>../Taller2/Insertar.php" style=" text-decoration: none ">Ingresar Datos</a>
    </nav>
</div>
