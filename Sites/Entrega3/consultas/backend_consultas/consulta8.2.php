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

    $numero = $_POST["numero"];

 	$query = "SELECT * from habitaciones as h1 where h1.precio_habitacion = 
   (select h2.precio_habitacion from habitaciones as h2 order by h2.precio_habitacion desc limit 1 offset $numero -1);";
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