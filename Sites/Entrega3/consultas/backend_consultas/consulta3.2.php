<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Consulta habitaciones según precio</title>
    <link rel="stylesheet" href="tabla.css">
</head>
<body>
<div id = 'main-container'>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("/home/grupo25/Sites/Entrega2/consultas/backend_consultas/config/conexion.php");

    $id = $_POST["id"];
    $fecha_in = $_POST["fecha_in"];
    $fecha_fin = $_POST["fecha_fin"];

 	$query = "SELECT *
     FROM Reservas
     WHERE id_usuario = $id AND fecha_inicio > $fecha_in AND fecha_fin < $fecha_fin;";
	$result = $db -> prepare($query);
	$result -> execute();
	$reservas = $result -> fetchAll();
  ?>
	<table>
  <thead>
    <tr>
      <th>ID Reserva</th>
      <th>ID Usuario</th>
      <th>ID Habitación</th>
      <th>Fecha Inicio</th>
      <th>Fecha Fin</th>
     
    </tr>
    </thead>
  <?php
	foreach ($reservas as $reserva) {
  		echo "<tr> <td>$reserva[0]</td> <td>$reserva[1]</td> <td>$reserva[2]</td> <td>$reserva[3]</td> <td>$reserva[4]</td></tr>";
	}
  ?>
  </table>
  </div>
</body>
</html>