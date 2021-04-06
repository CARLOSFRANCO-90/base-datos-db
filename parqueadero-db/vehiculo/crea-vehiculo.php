<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crea vehiculo</title>
         
</head>
<body>
    <form action="crea-vehiculo.php" method= "POST">
    <P>PARQUEADERO</P>
    <label for="nombre">Ingrese Datos</label>
    <br/> <br/>
    <input type="radio" name= "clase_vehiculo" value="0"/>Moto
    <input type="radio" name= "clase_vehiculo" value="1"/>Carro
    <br/> <br/>

    <input type="radio" name= "pago" value="2"/>Dia
    <input type="radio" name= "pago" value="3"/>Mes
    <br/> <br/>
    <input type="submit" value ="Guardar">
    </form>
</body>
</html>

<?php
    
    $clase_vehiculo =$_REQUEST["clase_vehiculo"];
    $pago =$_REQUEST["pago"];
    
    //1. cocectar base datos
    $host = "localhost";
    $dbname = "franco_parqueadero";
    $username = "root";
    $contrasena = "";

    $cnx = new PDO("mysql:host=$host;dbname=$dbname", $username, $contrasena);

    //2. construir la sentiencia SQL
    $sql = "INSERT INTO vehiculo (id, clase_vehiculo, pago) VALUES(NULL, '$clase_vehiculo', '$pago')";

    //3.preparar SQL sentencias
    $q = $cnx-> prepare($sql);
    
    //4. ejecutar SQL sentencia
    $resultado = $q->execute();

    if($resultado){
        echo "Vehiculo se guardo bien";
    }
    else{
        echo "hubo un error en la creacion del vehiculo";
    }
?>