<?php
    //1. cocectar base datos
    $host = "localhost";
    $dbname = "franco_parqueadero";
    $username = "root";
    $contrasena = "";

    $cnx = new PDO("mysql:host=$host;dbname=$dbname", $username, $contrasena);

    //2. construir la sentiencia SQL
    $sql = "SELECT cli.nombre, as nombre_cliente, cli.direccion, ing.entrada, veh.clase_vehiculo FROM cliente as cli JOIN ingresos AS ing ON cli.id = ing.fk_cliente JOIN vehiculo veh ON ing.id = veh.id ORDER BY cli.nombre ASC";
    //3.preparar SQL sentencias
    $q = $cnx-> prepare($sql);
    //4. ejecutar SQL sentencia
    $resultado = $q->execute();

    $ingresos = $q-> fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Infreso listado</title>
</head>
<body>
    <h1>Lista Ingresos</h1>
     <table>
          <tr>
              <dt>
                  Nombre Cliente
              </dt>
              <dt>
                  Dirrecion
              </dt>
              <dt>
                  Ingresos Entrada
              </dt>
              <dt>
                  Clase Vehiculo
              </dt>
            </tr>

<?php
    for($i =0; $i<count($ingresos); $i++){
?>
    <tr>
      <dt>
         <?php echo $ingresos[$i]["nombre_cliente"] ?>
      </dt>

      <dt>
      <?php echo $ingresos[$i]["dirrecion"] ?>
      </dt>

      <dt>
      <?php echo $ingresos[$i]["ingresos_entrada"] ?>
      </dt>

      <dt>
      <?php 
          $clase_vehiculo = $ingresos[$i]["clase_vehiculo"];
          if($clase_vehiculo == "0"){
              echo "Moto";
          }
          else{
              echo "Carro";
          }
           ?>
      </dt>

      <dt>
      </dt>

    </tr>    
    
<?php
    }
?>      
     </table>
    
</body>
</html>