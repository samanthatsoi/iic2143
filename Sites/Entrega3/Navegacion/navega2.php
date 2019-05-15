<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Restaurante y Platos</title>
    <link rel="stylesheet" href="tabla.css">
</head>
<body>
<div id = 'main-container'>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("/home/grupo25/Sites/Entrega3/consultas/backend_consultas/config/conexion.php");


 	$query = "SELECT R.nombre_restaurant, P.nombre_producto FROM Restaurantes R, productos_restaurantes PR, Productos P
  WHERE R.id_restaurant = PR.id_restaurant AND PR.id_producto = P.id_producto;";
  echo "Todos los restaurantes y sus platos disponibles.";
echo "<br>";
echo "<br>";
	$result = $db -> prepare($query);
	$result -> execute();
	$platos = $result -> fetchAll();
  ?>
	<table>
    <thead>
    <tr>
      <th>Restaurante</th>
      <th>Platos</th>
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