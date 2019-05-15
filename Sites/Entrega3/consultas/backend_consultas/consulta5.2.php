<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Consulta habitación más reservada según región</title>
    <link rel="stylesheet" href="tabla.css">
</head>
<body>
<div id = 'main-container'>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("/home/grupo25/Sites/Entrega2/consultas/backend_consultas/config/conexion.php");


 	$query = "SELECT c.id_region, hh.id_habitacion, c.max
   FROM consulta5 c, hoteles_habitaciones hh, cantidad_reservas cr, hoteles_region hr
   WHERE hr.id_region = hh.id_region AND hh.id_hotel = hr.id_hotel AND hh.id_habitacion = cr.id_habitacion AND c.max = cr. numero_reservas AND hr.id_region = c.id_region
   ORDER BY c.id_region DESC, hh.id_habitacion;";
	$result = $db -> prepare($query);
	$result -> execute();
	$habitaciones = $result -> fetchAll();
  ?>
	<table>
  <thead>
    <tr>
      <th>ID Región</th>
      <th>ID Habitación</th>
      <th>Número de Reservas</th>
      
    </tr>
    </thead>
  <?php
	foreach ($habitaciones as $habitacion) {
  		echo "<tr> <td>$habitacion[0]</td> <td>$habitacion[1]</td> <td>$habitacion[2]</td> </tr>";
	}
  ?>
  </table>
  </div>
</body>
</html>