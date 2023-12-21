<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CRUD</title>
    </head>
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


    <body>
    <?php
    $titulo="Ingreso datos-Paciente";
        include_once '../Taller2/Encabezado.php';
        ?>
        <div id="idform">
            <form method="POST">
               
                <div>
                <label>Cedula:</label>
                <input type="text" name="txtcedula" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                </div>
                <div><label>Nombres:</label>
                <input type="text" name="txtnombre">
                </div>
                <div> <label>Apellidos:</label>
                <input type="text" name="txtapellidos">
                </div>
                <div><label>Fecha de nacimiento:</label>
                <input type="text" name="txtfchnacimi">
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
                <input type="text" name="txtdir">
                </div>
                <div><label>Numero de celular:</label>
                <input type="text" name="txtncel" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                </div>
                <div><label>Correo Electronico:</label>
                <input type="text" name="txtemail">
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
      require_once '../Taller2/Conexion.php';
        
         if (($_SERVER["REQUEST_METHOD"] == "POST") ){
            
 /*$Genero = isset($_POST["RGENE"]) ? $_POST["RGENE"] : [];*/

       
            $data = array(
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
 $sql = "insert into pacientes (ID_PACIENTE, Cedula,Nombres,Apellidos ,Fecha_nacimiento,
 Provincia,Direccion,NumCelular,canton, Genero, CorreoElectronico ) " .
 "VALUES (null, :cedula, :nom, :apell, :fechnac, :provin, :direc, :ncel, :cant, :gener, :email)";
    
           $stmt = $pdo->prepare($sql);// prepara sentencia
            $stmt->execute($data);// ejecutar sentencia
            
            if ($stmt->rowCount() > 0) {// rowCount() permite conocer el numero de filas afectadas
        /*  $_SESSION["mensaje"]="Se inserto correctamente el paciente ";*/
          /*require_once '../Taller2/Consultar.php';*/
          echo "PACIENTE INGRESADO";
            }else{
                echo "Error al insertar paciente";
                
            }
      
}
        ?>


    </body>
    
</html>