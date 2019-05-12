<?php
if(isset($_GET['numero7'])){
    include_once '../../Entrega2/Conexion/conn.php';
    $parkid = $_GET['park'];
    $pregunta = "Para la ID " . $parkid . " de Parque Nacional, su nombre de parque, el numero de senderos que estan en el, y el numero total de kilometros de sendero que posee.";
    echo $pregunta;
    echo "<br>";
    echo "<br>";
    $sql = "SELECT ParqueNacional.park_nombre, t2.ct, t1.kilo FROM ParqueNacional, (SELECT COALESCE(SUM(Sendero.largo),0) AS kilo FROM Sendero WHERE Sendero.parkid = " . $parkid . ") t1,
     (SELECT COUNT(Sendero.sendid) AS ct FROM Sendero WHERE Sendero.parkid = " . $parkid . ") t2 WHERE ParqueNacional.parkid = " . $parkid . ";"; 
  #  $sql = "(SELECT coalesce(SUM(Sendero.largo),0) AS kilo FROM Sendero WHERE Sendero.parkid = " . $parkid . ") ";
  #  echo "Query: " . $sql;
    $data = $conn->query($sql)->fetchAll();
    #$result_check = mysqli_num_rows($result);

?>
<head>
  <meta charset="UTF-8">
</head>
    <table id='userTable'>
        <thead>
            <tr>
                <th>Nombre de Parque Nacional</th>
                <th>Numero de Senderos en Parque Nacional</th>
                <th>Total de Kilometros</th>
    </tr>
        </thead>
        <?php
        foreach ($data as $row) {
        ?>

        <tbody>
            <tr>
                <td><?php  echo $row['park_nombre']; ?></td>
                <td><?php  echo $row['ct']; ?></td>
                <td><?php  echo $row['kilo']; ?></td>
            </tr>
         <?php
         }
         ?>
        </tbody>
    </table>
    <?php   
}
if(!$data)
{
    echo "No hay un parque con id = " . $parkid;
}
?>