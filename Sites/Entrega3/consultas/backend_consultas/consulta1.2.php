<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Consulta Platos Región</title>
    <link rel="stylesheet" href="tabla.css">
</head>
<body>
<div id = 'main-container'>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("/home/grupo25/Sites/Entrega2/consultas/backend_consultas/config/conexion.php");

    $numero = $_POST["numero_region"];

 	$query = "SELECT P.id_producto, P.nombre_producto, P.descripcion_producto, P.precio_producto, PR.id_restaurant 
   FROM Productos AS P, productos_restaurantes AS PR 
   WHERE PR.id_producto = P.id_producto 
   AND PR.id_restaurant IN (SELECT r.id_restaurant FROM Restaurantes AS r, Restaurantes_Region AS RR WHERE R.id_restaurant = RR.id_restaurant  AND RR.id_region = $numero);";
	$result = $db -> prepare($query);
	$result -> execute();
	$platos = $result -> fetchAll();
  ?>
	<table>
    <thead>
    <tr>
      <th>ID Producto</th>
      <th>Nombre</th>
      <th>Descripción</th>
      <th>Precio</th>
      <th>ID Restaurant</th>
    </tr>
    </thead>
  <?php
	foreach ($platos as $plato) {
  		echo "<tr> <td>$plato[0]</td> <td>$plato[1]</td> <td>$plato[2]</td> <td>$plato[3]</td> <td>$plato[4]</td> </tr>";
	}
  ?>
	</table>
</div>
</body>
</html>