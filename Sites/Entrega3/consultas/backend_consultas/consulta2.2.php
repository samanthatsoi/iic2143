<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Consulta habitaciones según estrellas</title>
    <link rel="stylesheet" href="tabla.css">
</head>
<body>
<div id = 'main-container'>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("/home/grupo25/Sites/Entrega2/consultas/backend_consultas/config/conexion.php");

    $numero = $_POST["estrellas"];

 	$query = "SELECT HA.id_habitacion, HA.nombre_habitacion, HA.precio_habitacion, HO.id_hotel, HO.estrellas
     FROM Habitaciones AS HA, Hoteles AS HO, Habitacion_hotel AS HH
     WHERE HA.id_habitacion = HH.id_habitacion AND HH.id_hotel = HO.id_hotel AND HO.estrellas > $numero;";
	$result = $db -> prepare($query);
	$result -> execute();
	$habitaciones = $result -> fetchAll();
  ?>
	<table>
  <thead>
    <tr>
      <th>ID Habitación</th>
      <th>Nombre Habitación</th>
      <th>Precio</th>
      <th>ID Hotel</th>
      <th>Estrellas</th>
    </tr>
    </thead>
  <?php
	foreach ($habitaciones as $habitacion) {
  		echo "<tr> <td>$habitacion[0]</td> <td>$habitacion[1]</td> <td>$habitacion[2]</td> <td>$habitacion[3]</td> <td>$habitacion[4]</td></tr>";
	}
  ?>
	</table>
  </div>
</body>
</html>