<?php
    //1. cocectar base datos
    $host = "localhost";
    $dbname = "franco_parqueadero";
    $username = "root";
    $contrasena = "";

    $cnx = new PDO("mysql:host=$host;dbname=$dbname", $username, $contrasena);

    //2. construir la sentiencia SQL
    $sql = "SELECT id, nombre FROM cliente";
    //3.preparar SQL sentencias
    $q = $cnx-> prepare($sql);
    //4. ejecutar SQL sentencia
    $resultado = $q->execute();
    $cliente = $q->fetchAll();

     //2. construir la sentiencia SQL
     $sql = "SELECT clase_vehiculo, pago FROM vehiculo";
     //3.preparar SQL sentencias
     $q = $cnx-> prepare($sql);
     //4. ejecutar SQL sentencia
     $resultado = $q->execute();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crea ingreso</title>
</head>
<body>
<form action="crea-ingresos.php" method="POST">
    Clientes
    <select name="fk_cliente" id="">

    <?php
        for($i =0; $i<count($cliente); $i++){       
?>
           <option value="<?php echo $cliente [$i]["id"] ?>">
           <?php echo $cliente [$i]["nombre"] ?>
           </option>
<?php
        }
    ?>

    </select>
    <br/><br/>
    <br/>
    Vehiculo
    <select name="fk_vehiculo" id="">
     <option value="0">Moto</option>
     <option value="1">Carro</option>
    <br/> <br/>
    </select>
    <p>Entrada</p>
    <input type="radio" name= "entrada" value="2"/>Dia
    <input type="radio" name= "entrada" value="3"/>Noche
    <br/><br/>
    <input type="submit" value ="Registrar Ingreso">
    <br/><br/>
    </select>
</body>
</html>

<?php

    $cliente =$_REQUEST["fk_cliente"];
    $vehiculo=$_REQUEST["fk_vehiculo"];
    $ingresos = $_REQUEST["entrada"];
    
    //1. cocectar base datos
    $host = "localhost";
    $dbname = "franco_parqueadero";
    $username = "root";
    $contrasena = "";

    $cnx = new PDO("mysql:host=$host;dbname=$dbname", $username, $contrasena);

    //2. construir la sentiencia SQL
    $sql = "INSERT INTO ingresos (id, fk_cliente, fk_vehiculo, entrada) VALUES(NULL, '$cliente', '$vehiculo', '$ingresos')";
    //3.preparar SQL sentencias
    $q = $cnx-> prepare($sql);
    //4. ejecutar SQL sentencia
    $resultado = $q->execute();

    if($resultado){
        echo "Ingreso se guardo bien";
    }
    else{
        echo "hubo un error en el ingreso";
    }
?>