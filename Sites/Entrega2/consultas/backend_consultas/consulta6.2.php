<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Usuarios que han reservado la habitación más barata de la región II</title>
    <link rel="stylesheet" href="tabla.css">
</head>
<body>
<div id = 'main-container'>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("/home/grupo25/Sites/Entrega2/consultas/backend_consultas/config/conexion.php");


 	$query = "SELECT u.id_usuario, u.nombre
     FROM Reservas AS r, Habitaciones AS ha, Hoteles AS ho, Usuarios AS u, Habitacion_Hotel AS hh, Hoteles_region AS hr
     WHERE hh.id_hotel = ho.id_hotel AND ha.id_habitacion = hh.id_habitacion AND r.id_habitacion = ha.id_habitacion 
     AND hr.id_hotel = ho.id_hotel AND hr.id_region = 2 AND u.id_usuario = r.id_usuario
     AND ha.precio_habitacion = (SELECT MIN(Habitaciones.precio_habitacion) 
                                FROM Habitaciones, Hoteles, Habitacion_Hotel, Hoteles_region 
                               WHERE Habitacion_Hotel.id_hotel = Hoteles.id_hotel 
                               AND Habitacion_Hotel.id_habitacion = Habitaciones.id_habitacion
                               AND Hoteles_region.id_hotel = Hoteles.id_hotel AND Hoteles_region.id_region = 2);";
	$result = $db -> prepare($query);
	$result -> execute();
	$usuarios = $result -> fetchAll();
  ?>
	<table>
  <thead>
    <tr>
      <th>ID Usuario</th>
      <th>Nombre </th>
    </tr>
    </thead>
  <?php
	foreach ($usuarios as $usuario) {
  		echo "<tr> <td>$usuario[0]</td> <td>$usuario[1]</td></tr>";
	}
  ?>
  </table>
  </div>
</body>
</html>