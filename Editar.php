<!DOCTYPE html>
<html>
    <head>
        <style>
    #idform{
      
    
      border-radius: 10px;
      
      border-right:25px;
      border-left:25px;
      
      
      width:550px;
      }
      form div {
         margin-top:30px;
          margin-bottom: -20px;
          margin-right:10px;
          padding-right:10px;
          padding-left:10px;
      
         
      }
      form{
          border:3px solid rgb(194, 182, 241);
          margin-right:10px;
          padding-left:100px;
          padding-right:10px;
        margin-bottom:20px;
        padding-bottom:50px;
      }
      form input[type="submit"]{
          margin-top: 10px;
          margin-left:100px;
          padding-left: 35px;
          padding-right: 35px;
      }
      </style>
    </head>
<body>

<?php
$titulo="Editar Paciente";


include_once '../Taller2/Encabezado.php';
require_once '../Taller2/Conexion.php';

if (!empty($_GET['id'])) {

    $data = array('ID' => htmlentities($_GET['id']));
    $sql = "select * from pacientes where ID_PACIENTE = :ID";
    $stmt = $pdo->prepare($sql);// crear la sentencia preparada
    $stmt->execute($data);// ejecutar la sentencia preparada
    

    // recuperacion de datos
    
    if($fila = $stmt->fetch(PDO::FETCH_ASSOC)){
        // fecth retorna un registro 
        // como un arreglo asociativo
        ?>
       <div id="idform">
            <form method="POST">
               
                <div>
                <input type="hidden" name="txtid2" value="<?php echo $fila['ID_PACIENTE'] ?>">
                <label>Id:</label>
                <input type="text" name="txtid" readonly 
                value="<?php echo $fila['ID_PACIENTE'] ?> ">
                <label>Cedula:</label>
                <input type="text" name="txtcedula" value="<?php echo $fila['Cedula'] ?>" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                </div>
                <div><label>Nombres:</label>
                <input type="text" name="txtnombre" value="<?php echo $fila['Nombres'] ?>">
                </div>
                <div> <label>Apellidos:</label>
                <input type="text" name="txtapellidos" value="<?php echo $fila['Apellidos'] ?>">
                </div>
                <div><label>Fecha de nacimiento:</label>
                <input type="text" name="txtfchnacimi" value="<?php echo $fila['Fecha_nacimiento'] ?>">
                </div>
                <div><label>Provincia</label>
                <select name="cbprovin" required>
            <option value="">Seleccione...</option>
            <option value="MANABI">Manabi</option>
            <option value="GUAYAS">GUAYAS</option>
            <option value="SANTA ELENA">SANTA ELENA</option>
        </select>
                </div>
                <div><label>Canton:</label>
                <select name="cbcanton" required>
            <option value="">Seleccione</option>
            <option value="mnt">Manta</option>
            <option value="gye">Guayaquil</option>
            <option value="sln">Salinas</option>
        </select>
                </div>
                <div><label>Direccion:</label>
                <input type="text" name="txtdir" value="<?php echo $fila['Direccion'] ?>">
                </div>
                <div><label>Numero de celular:</label>
                <input type="text" value="<?php echo $fila['NumCelular'] ?>" name="txtncel" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                </div>
                <div><label>Correo Electronico:</label>
                <input type="text" value="<?php echo $fila['CorreoElectronico'] ?>" name="txtemail">
                </div>
                <div><label for="RGENE">Genero:</label>
                <input type="radio" name="RGENE" checked =true value="M" required> Masculino
        <input type="radio" name="RGENE" value="F" required>Femenino<br>
                </div>
                <div >
                <input type="submit" value="Agregar" id="enviar">
                </div>
            </form>
        </div>
        <?php
    }else{
        echo "algo paso";
    }
}
?>
</body>
</html>
<?php
if (($_SERVER["REQUEST_METHOD"] == "POST") ){
 

    $data = array(
        'id' => $_POST['txtid'],
        'cedula'    => $_POST['txtcedula'],
'nom'       => $_POST['txtnombre'],
'apell'     => $_POST['txtapellidos'],
'fechnac'   => $_POST['txtfchnacimi'],
'provin'    => $_POST['cbprovin'],
'direc'     => $_POST['txtdir'],
'ncel'      => $_POST['txtncel'],
'cant'      => $_POST['cbcanton'],
'gener'     => $_POST['RGENE'],
'email'     => $_POST['txtemail']
        
    );
        $sql = "update pacientes set Cedula=:cedula,Nombres=:nom,
        Apellidos=:apell ,Fecha_nacimiento=:fechnac,
        Provincia=:provin,Direccion=:direc,NumCelular=:ncel,
        canton=:cant, Genero=:gener, CorreoElectronico=:email where ID_PACIENTE=:id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute($data);

        if ($stmt->rowCount() > 0) {// rowCount permite obtener el numero de filas afectadas
          ECHO "ACTUALIZADO";
        }else{
        echo "Error al actualizar usuario";
        }
    
}
?>