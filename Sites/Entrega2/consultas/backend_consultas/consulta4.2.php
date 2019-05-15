<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ver los tours de las agencias que están presente en solo una region:</title>
    <link rel="stylesheet" href="tabla.css">
</head>
<body>
<div id = 'main-container'>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("/home/grupo25/Sites/Entrega2/consultas/backend_consultas/config/conexion.php");


 	$query = "SELECT T.*, A.id_agencia
   FROM Tour AS T, Agencia_tour AS A
   WHERE T.id_tour = A.id_tour AND A.id_agencia NOT IN 
  (SELECT A1.id_agencia 
  FROM Agencia_turismo AS A1, Agencia_region AS AR1, Agencia_region AS AR2
  WHERE AR1.id_region != AR2.id_region AND A1.id_agencia = AR1.id_agencia AND A1.id_agencia = AR2.id_agencia) 
  ORDER BY A.id_agencia;";
	$result = $db -> prepare($query);
	$result -> execute();
	$tours = $result -> fetchAll();
  ?>
	<table>
  <thead>
    <tr>
      <th>ID Tour</th>
      <th>Descripción Tour</th>
      <th>Precio</th>
      <th>ID Agencia</th>
    </tr>
    </thead>
  <?php
	foreach ($tours as $tour) {
  		echo "<tr> <td>$tour[0]</td> <td>$tour[1]</td> <td>$tour[2]</td> <td>$tour[3]</td> </tr>";
	}
  ?>
	</table>
  </div>
</body>
</html>