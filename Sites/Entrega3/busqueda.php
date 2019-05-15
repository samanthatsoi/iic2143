<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Busqueda</title>
    <link rel="stylesheet" href="Navegacion/tabla.css">
</head>
<body>
<div id = 'main-container'>
<?php
#Llama a conexión, crea el objeto PDO y obtiene la variable $db
require("/home/grupo25/Sites/Entrega2/consultas/backend_consultas/config/conexion.php"); #hotel
require("/home/grupo25/Sites/Entrega3/ConexionParque/conn.php"); #parque

$nombre = $_POST["search"];
$cat    = $_POST["cat"];

#1
# Hotel Alemán-Olivas
if ($cat == "hotel") {
//echo $cat;
  $query = "SELECT HO.* FROM Hoteles AS HO WHERE HO.nombre_hotel ilike '%" . $nombre . "%';";
  echo "Información sobre " . $nombre . ":";
  //  echo $query;
    $result = $db->prepare($query);
    $result->execute();
    $platos = $result->fetchAll();
?>
         <table>
          <thead>
          <tr>
            <th>ID</th>
            <th>Hotel</th>
            <th>Direccion</th>
            <th>Telefono</th>
            <th>Descripcion</th>
          </tr>
          </thead>
        <?php
    foreach ($platos as $plato) {
        echo "<tr> <td>$plato[0]</td> <td>$plato[1]</td> <td>$plato[2]</td> <td>$plato[3]</td><td>$plato[4]</td></tr>";
    }
}

#2
//de León S.C.
if ($cat == "restaurante") {

  $query = "SELECT R.* FROM Restaurantes R WHERE R.nombre_restaurant ilike '%" . $nombre . "%';";
    echo "Información sobre " . $nombre . ":";
 //   echo $query;
    $result = $db->prepare($query);
    $result->execute();
    $platos = $result->fetchAll();
?>
         <table>
          <thead>
          <tr>
            <th>ID</th>
            <th>Hotel</th>
            <th>Direccion</th>
            <th>Telefono</th>
            <th>Descripcion</th>
          </tr>
          </thead>
        <?php
    foreach ($platos as $plato) {
        echo "<tr> <td>$plato[0]</td> <td>$plato[1]</td> <td>$plato[2]</td> <td>$plato[3]</td><td>$plato[4]</td></tr>";
    }
}



#3
#Mapa Viajero Vive Ahora
if ($cat == "agencia") {
    $query = "SELECT DISTINCT Atur.nombre_agencia, Atur.direccion_agencia, Atur.telefono_agencia
        FROM Agencia_turismo Atur WHERE Atur.nombre_agencia ilike '%" . $nombre . "%';";
    echo "Información sobre " . $nombre . ":";
    $result = $db->prepare($query);
    $result->execute();
    $platos = $result->fetchAll();
?>
         <table>
          <thead>
          <tr>
            <th>Agencia</th>
            <th>Direccion</th>
            <th>Telefono</th>
          </tr>
          </thead>
        <?php
    foreach ($platos as $plato) {
        echo "<tr> <td>$plato[0]</td> <td>$plato[1]</td> <td>$plato[2]</td> </tr>";
    }
}

#4
# CASTILLO MEDIEVAL DE GIGONZA DEL DESCANSADERO
if ($cat == "parque") {
$sql = "SELECT park_nombre, hectare, parque_descripcion, tarifa FROM ParqueNacional 
WHERE ParqueNacional.park_nombre ilike '%" . $nombre . "%';";

echo "Información sobre " . $nombre . ":";
echo "<br>";
echo "<br>";
$data = $conn->query($sql)->fetchAll();
#$result_check = mysqli_num_rows($result);
  ?>
  <table>
    <thead>
    <tr>
      <th>Parque</th>
      <th>Hectare</th>
      <th>Descripcion</th>
      <th>Tarifa</th>
    </tr>
    </thead>
  <?php
  foreach ($data as $plato) {
      echo "<tr> <td>$plato[0]</td> <td>$plato[1]</td> <td>$plato[2]</td><td>$plato[3]</td></tr>";
  }
}

#5
#MARISMAS DEL BARBATE CANALIZO DE LA SIERRA DE LÍJAR
#GARGANTA DE BOGAS LADERA
if ($cat == "sendero") {
$sql = "SELECT ParqueNacional.park_nombre, Sendero.send_nombre, Sendero.largo, Sendero.dificultad, Sendero.duracion FROM Sendero, ParqueNacional
WHERE ParqueNacional.parkid = Sendero.parkid AND Sendero.send_nombre ilike '%" . $nombre . "%';";
echo "Información sobre " . $nombre . ":";
echo "<br>";
echo "<br>";
$data = $conn->query($sql)->fetchAll();
#$result_check = mysqli_num_rows($result);
  ?>
  <table>
    <thead>
    <tr>
      <th>Sendero</th>
      <th>Largo</th>
      <th>Dificultad</th>
      <th>Duracion</th>
    </tr>
    </thead>
  <?php
  foreach ($data as $plato) {
      echo "<tr> <td>$plato[0]</td> <td>$plato[1]</td> <td>$plato[2]</td><td>$plato[3]</td></tr>";
  }
}

#6
#VIÑA DEL VERDE
if ($cat == "vina") {
$sql = "SELECT vina_nombre, vina_telefono, vina_descripcion FROM Vina
WHERE Vina.vina_nombre ilike '%" . $nombre . "%';";
echo "Información sobre " . $nombre . ":";
echo "<br>";
echo "<br>";
$data = $conn->query($sql)->fetchAll();
#$result_check = mysqli_num_rows($result);
  ?>
  <table>
    <thead>
    <tr>
      <th>Viña</th>
      <th>Teléfono</th>
      <th>Descripción</th>
    </tr>
    </thead>
  <?php
  foreach ($data as $plato) {
      echo "<tr> <td>$plato[0]</td> <td>$plato[1]</td> <td>$plato[2]</td> </tr>";
  }
}

?>
   </table>
</div>
</body>
</html>