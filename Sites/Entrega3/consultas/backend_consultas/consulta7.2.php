<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Consulta de reserva</title>
    <link rel="stylesheet" href="tabla.css">
</head>
<body>
<div id = 'main-container'>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("/home/grupo25/Sites/Entrega2/consultas/backend_consultas/config/conexion.php");

    $id = $_POST["id"];

 	$query = "SELECT reservas.id_reserva, usuarios.nombre, habitaciones.precio_habitacion
     FROM reservas INNER JOIN usuarios ON (reservas.id_usuario = usuarios.id_usuario) 
     INNER JOIN habitaciones ON (habitaciones.id_habitacion = reservas.id_habitacion)
     WHERE reservas.id_reserva = $id;";
	$result = $db -> prepare($query);
	$result -> execute();
	$reservas= $result -> fetchAll();
  ?>
	<table>
  <thead>
    <tr>
      <th>ID Reserva</th>
      <th>Nombre Usuario</th>
      <th>Precio</th>
    </tr>
    </thead>
  <?php
	foreach ($reservas as $reserva) {
  		echo "<tr> <td>$reserva[0]</td> <td>$reserva[1]</td> <td>$reserva[2]</td></tr>";
	}
  ?>
  </table>
  </div>
</body>
</html>