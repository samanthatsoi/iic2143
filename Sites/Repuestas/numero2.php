<?php
if(isset($_GET['numero2'])){
    include_once '../../Entrega2/Conexion/conn.php';
    $sql = "SELECT DISTINCT region_nombre, vina_nombre FROM Vina, Region WHERE Vina.rid = Region.rid and Region.rid = 6 UNION SELECT region_nombre, park_nombre FROM ParqueNacional, Region WHERE ParqueNacional.rid = Region.rid AND Region.rid = 6;";
    echo "Los nombres de todas las viñas y parques nacionales de la region con identificador VI (6).";
    echo "<br>";
    echo "<br>";
    $data = $conn->query($sql)->fetchAll();
    #$result_check = mysqli_num_rows($result);

?>
<head>
  <meta charset="UTF-8">
</head>
    <table id='userTable'>
        <thead>
            <tr>
                <th>Region Nombre</th>
                <th>Parque or Vina</th>

            </tr>
        </thead>
        <?php
        foreach ($data as $row) {
        ?>

        <tbody>
            <tr>
                <td><?php  echo $row['region_nombre']; ?></td>
                <td><?php  echo $row['vina_nombre']; ?></td>

            </tr>
         <?php
         }
         ?>
        </tbody>
    </table>
    <?php



}

?>