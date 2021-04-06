<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cliente</title>
</head>
<body>
<form action="crea-cliente.php" method="POST">
    Nombre <input type="text" name="nombre"> 
    <br/><br/>
    Direccion <input type="text" name="direccion">
     <br/><br/>
    Telefono <input type="text" name="telefono">
    <br/><br/>
    <input type="submit" value ="crear cliente"> 
</body>
</html>


<?php
    $nombre =$_REQUEST["nombre"];
    $direccion=$_REQUEST["direccion"];
    $telefono = $_REQUEST["telefono"];
    
    //1. cocectar base datos
    $host = "localhost";
    $dbname = "franco_parqueadero";
    $username = "root";
    $contrasena = "";

    $cnx = new PDO("mysql:host=$host;dbname=$dbname", $username, $contrasena);

    //2. construir la sentiencia SQL
    $sql = "INSERT INTO cliente (id, nombre, direccion, telefono) VALUES(NULL, '$nombre', '$direccion', '$telefono')";

    //3.preparar SQL sentencias
    $q = $cnx-> prepare($sql);
    
    //4. ejecutar SQL sentencia
    $resultado = $q->execute();

    if($resultado){
        echo "Cliente $nombre se guardo bien";
    }
    else
        echo "hubo un error en la creacion del cliente $nombre";

?>