<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todos los parques nacionales</title>
    <link rel="stylesheet" href="tabla.css">
</head>
<body>
<div id = 'main-container'>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("/home/grupo25/Sites/Entrega3/ConexionParque/conn.php");

$sql = "SELECT park_nombre, send_nombre, atract_nombre FROM ParqueNacional, Sendero, Atractivo WHERE ParqueNacional.parkid = Sendero.parkid AND Atractivo.parkid = ParqueNacional.parkid;";
echo "Todos los parques nacionales, junto a sus senderos y atractivos.";
echo "<br>";
echo "<br>";
$data = $conn->query($sql)->fetchAll();
#$result_check = mysqli_num_rows($result);
  ?>
	<table>
    <thead>
    <tr>
      <th>Parque</th>
      <th>Sendero</th>
      <th>Atractivo</th>
    </tr>
    </thead>
  <?php
	foreach ($data as $plato) {
  		echo "<tr> <td>$plato[0]</td> <td>$plato[1]</td> <td>$plato[2]</td></tr>";
	}
  ?>
	</table>
</div>
</body>
</html>