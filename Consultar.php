<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CRUD</title>
    </head>
<style>
    body{
        margin: 0;
    padding: 0;
    }
#divtb{
margin-left:20px;
margin-top:50px;
margin-right:50px;
padding-left: 1px;
overflow-x: scroll;
width:950px;
border:3px solid rgb(194, 182, 241);
border-radius: 10px;
}
table{
 border-collapse: collapse;

background-color:rgba(162, 207, 205, 0.658);

}
th, td {
    border: #b2b2b2 1px solid;
        text-align: center;
    
    }
    th {
        font-size: 14px;
        padding-left:10px;
        padding-right:16px;

        background-color: #f2f2f2;
    }
    th:nth-child(8){
        padding-left:30px;
        padding-right:30px;
    }
    th:nth-child(11){
        padding-left:1px;
        padding-right:3px;
    }
    #resultado{
        margin-left:300px;
margin-top:20px;
margin-right:10px;
padding-left: 1px;
height:100px;
    }
</style>

    <body>
    <?php
        $titulo="Consulta de Datos-Paciente";
        include_once '../Taller2/Encabezado.php';
        require_once '../Taller2/Conexion.php';
        ?>
         <?php
        
         $sql = "select * from pacientes";
         $data = array();
         $stmt = $pdo->prepare($sql);// preparar la sentencia
         $stmt->execute($data);
        ?>
       <div id="divtb">
       <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>CEDULA</th>
                        <th>NOMBRES</th>
                        <th>APELLIDOS</th>
                        <th>FECHA DE NACIMIENTO</th>
                        <th>PROVINCIA</th>
                        <th>CANTON</th>
                        <th>DIRECCION</th>
                        <th>NUMERO CELULAR</th>
                        <th>EMAIL</th>
                        <th>GENERO</th> 
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $filas = $stmt->fetchAll(PDO::FETCH_ASSOC); // recuperar resultados
                    // fetchAll  siempre retorna un arreglo
                    // fetchAll va a retornar un arreglo
                    // donde cada elemento del arreglo (registro)
                    // es un arreglo asociativo
                    foreach ($filas as $fila) {
                        ?>
                        <tr>
                            <td><?php echo $fila['ID_PACIENTE'] ?></td>
                            <td><?php echo $fila['Cedula'] ?></td>
                            <td><?php echo $fila['Nombres'] ?></td>
                            <td><?php echo $fila['Apellidos'] ?></td>
                            <td><?php echo $fila['Fecha_nacimiento'] ?></td>
                            <td><?php echo $fila['Provincia'] ?></td>
                            <td><?php echo $fila['canton'] ?></td>
                            <td><?php echo $fila['Direccion'] ?></td>
                            <td><?php echo $fila['NumCelular'] ?></td>
                            <td><?php echo $fila['CorreoElectronico'] ?></td>
                            <td><?php echo $fila['Genero'] ?></td>
                           
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
       
       </div>
<div id="resultado">  
      
        
      
        </div>
    </body>


</html>