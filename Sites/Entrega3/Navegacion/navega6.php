<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tours de Entourismo</title>
    <link rel="stylesheet" href="tabla.css">
</head>
<body>
<div id = 'main-container'>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("/home/grupo25/Sites/Entrega3/ConexionParque/conn.php");

$sql = "SELECT DISTINCT tour_nombre, vina_nombre, vino_nombre FROM Enoturismo
INNER JOIN TourVino ON Enoturismo.tourid = TourVino.tourid
INNER JOIN Vino ON TourVino.vinoid = Vino.vinoid 
INNER JOIN Vina ON Vino.vinaid = Vina.vinaid LIMIT 10000;";
echo "Todos los tours de enoturismo, junto a las viñas que participan en él y los vinos por viña.";
echo "<br>";
echo "<br>";
$data = $conn->query($sql)->fetchAll();
#$result_check = mysqli_num_rows($result);
  ?>
	<table>
    <thead>
    <tr>
      <th>Nombre de Enoturismo</th>
      <th>Viña</th>
      <th>Vino</th>
    </tr>
    </thead>
  <?php
	foreach ($data as $plato) {
  		echo "<tr> <td>$plato[0]</td> <td>$plato[1]</td> <td>$plato[2]</td> </tr>";
	}
  ?>
	</table>
</div>
</body>
</html>