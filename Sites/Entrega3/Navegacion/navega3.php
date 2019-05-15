<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agencias de Turismo</title>
    <link rel="stylesheet" href="tabla.css">
</head>
<body>
<div id = 'main-container'>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("/home/grupo25/Sites/Entrega3/consultas/backend_consultas/config/conexion.php");
$results_per_page = 1000;
$querydroptemp = "DROP TABLE IF EXISTS temp;";
 	$query = "CREATE TABLE temp AS SELECT R.nombre_region, Atur.nombre_agencia, T.descripcion_tour 
  FROM Regiones R, Agencia_Region AR, Agencia_turismo Atur, Agencia_Tour AT, Tour T
 WHERE R.id_region = AR.id_region
  AND Atur.id_agencia = AT.id_agencia
  AND AT.id_tour = T.id_tour LIMIT 10000;";
  $final = "SELECT * FROM temp;";
  $drop = $db->query($querydroptemp);

	$result = $db -> prepare($query);
	$result -> execute();
	$platos = $result -> fetchAll();
    $querycount = "SELECT COUNT(*) FROM temp;";
  $countresult = $db->prepare($querycount); 
$countresult->execute(); 
$number_of_rows = $countresult->fetchColumn();
  $total_pages = ceil($number_of_rows / $results_per_page); #$total_pages = ceil($total_records / $results_per_page);
echo $number_of_rows;


  $result = $db -> prepare($final);
  $result -> execute();
  $platos = $result -> fetchAll();
    echo "Todas las agencias de turismo por región junto a los tours que ofrecen.";
echo "<br>";
echo "<br>";
  ?>
	<table>
    <thead>
    <tr>
      <th>Región</th>
      <th>Agencia</th>
      <th>Tour ofrecido</th>
    </tr>
    </thead>
  <?php
	foreach ($platos as $plato) {
  		echo "<tr> <td>$plato[0]</td> <td>$plato[1]</td> <td>$plato[2]</td> </tr>";
	}
  ?>
	</table>
  <?php
  for ($i=1; $i<=$total_pages; $i++) {  // print links for all pages
            echo "<a href='index.php?page=".$i."'";
            if ($i==$page)  echo " class='curPage'";
            echo ">".$i."</a> "; 
}; 
?>
</div>
</body>
</html>