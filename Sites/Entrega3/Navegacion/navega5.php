<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vinos y Viñas</title>
    <link rel="stylesheet" href="tabla.css">
</head>
<body>
<div id = 'main-container'>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("/home/grupo25/Sites/Entrega3/ConexionParque/conn.php");

$sql = "SELECT DISTINCT vina_nombre, vino_nombre FROM Vino, Vina WHERE Vino.vinaid = Vina.vinaid;";
echo "Todas las viñas y los vinos de esa viña.";
echo "<br>";
echo "<br>";
$data = $conn->query($sql)->fetchAll();
#$result_check = mysqli_num_rows($result);
  ?>
	<table>
    <thead>
    <tr>
      <th>Viña</th>
      <th>Vino</th>
    </tr>
    </thead>
  <?php
	foreach ($data as $plato) {
  		echo "<tr> <td>$plato[0]</td> <td>$plato[1]</td> </tr>";
	}
  ?>
	</table>
</div>
</body>
</html>