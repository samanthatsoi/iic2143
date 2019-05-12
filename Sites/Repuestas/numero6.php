<?php
if(isset($_GET['numero6'])){
    include_once '../../Entrega2/Conexion/conn.php';
    $pregunta = 'El sendero que actualmente posee mas gente que se encuentra perdida.';
    $sql1 = "DROP VIEW IF EXISTS temp;";
    $sql2 =  "CREATE VIEW temp AS SELECT Registro.sendid, COUNT(Registro.registroid) AS ct FROM Registro WHERE Registro.estado = 'perdido' GROUP BY Registro.sendid;";
    $sql3 = "SELECT DISTINCT Sendero.send_nombre, Sendero.largo, Sendero.dificultad, Sendero.duracion, ParqueNacional.park_nombre, temp.ct
FROM temp, Sendero, ParqueNacional WHERE temp.sendid = Sendero.sendid AND Sendero.parkid = ParqueNacional.parkid AND ct = (SELECT MAX(ct) FROM temp);";
  #  $sql3 = "SELECT  from parquenacional;"; #AND Sendero.parkid = ParqueNacional.parkid;";
   # echo "Tu pusiste " . $tour . " para nombre de tour a vina y " . $cepa . " para cepa de vino <br> ";
    echo $pregunta;
    echo "<br>";
    echo "<br>";
    $result1 = $conn->query($sql1)->fetchAll();
    $result2 = $conn->query($sql2)->fetchAll();
    $data = $conn->query($sql3)->fetchAll();
    #$result_check = mysqli_num_rows($result);

?>
<head>
  <meta charset="UTF-8">
</head>
    <table id='userTable'>
        <thead>
            <tr>
                <th>Nombre del Sendero</th>
                <th>Largo del Sendero</th>
                <th>Dificultad del Sendero</th>
                <th>Duracion del Sendero</th>
                <th>Nombre del Parque donde el sendero se ubica</th>
                <th>Gente que se encuentra pedido</th>
            </tr>
        </thead>
        <?php
        foreach ($data as $row) {
        ?>

        <tbody>
            <tr>
                <td><?php  echo $row['send_nombre']; ?></td>
                <td><?php  echo $row['largo']; ?></td>
                <td><?php  echo $row['dificultad']; ?></td>
                <td><?php  echo $row['duracion']; ?></td>
                <td><?php  echo $row['park_nombre']; ?></td>
                <td><?php  echo $row['ct']; ?></td>
            </tr>
         <?php
         }
         ?>
        </tbody>
    </table>
    <?php 
    
}

?>