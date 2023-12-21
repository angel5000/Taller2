
<?php
$titulo="Eliminar Paciente";


include_once '../Taller2/Encabezado.php';
require_once '../Taller2/Conexion.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = ['id' => htmlentities($_GET['id'])];
    $sql = "select * from pacientes where ID_PACIENTE = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute($data);

    if($fila = $stmt->fetch(PDO::FETCH_ASSOC)){
    ?>
    <div>
    <form method="post" onsubmit="if(!confirm('Esta seguro de eliminar el usuario?'))return false;">
        <label>Id:</label>
        <input type="text" name="txtid" readonly=""
         value="<?php echo $fila['ID_PACIENTE'] ?>">
        <label>Usuario:</label>
        <input type="text" name="txtusuario"
         readonly="" value="<?php echo $fila['Nombres'] ?>">
        <input type="submit" value="Eliminar">
    </form>

</div>
  

  
    <?php 
    }
}
?>
<?php 
 if (!empty($_POST['txtid'])) {
    $sql = "DELETE FROM pacientes WHERE ID_PACIENTE = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]); 
    alert ("PACIENTE ELIMINADO");
}
    ?>



