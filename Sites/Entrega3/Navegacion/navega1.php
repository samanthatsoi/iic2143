<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hotel y Habitación</title>
    <link rel="stylesheet" href="tabla.css">
</head>
<body>
<div id = 'main-container'>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../consultas/backend_consultas/config/conexion.php");


 	$query = "SELECT HO.nombre_hotel, HA.nombre_habitacion  FROM Habitaciones AS HA, Hoteles AS HO, Habitacion_hotel AS HH
     WHERE HA.id_habitacion = HH.id_habitacion AND HH.id_hotel = HO.id_hotel;";
  echo "Todos los hoteles y las habitaciones disponibles.";
echo "<br>";
echo "<br>";
  $result = $db -> prepare($query);
  $result -> execute();
  $platos = $result -> fetchAll();
  ?>
	<table>
    <thead>
    <tr>
      <th>Hotel</th>
      <th>Habitación</th>
    </tr>
    </thead>
  <?php
	foreach ($platos as $plato) {
  		echo "<tr> <td>$plato[0]</td> <td>$plato[1]</td> </tr>";
	}
  ?>
	</table>
</div>
</body>
</html>