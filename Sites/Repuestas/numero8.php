<?php
if(isset($_GET['numero8'])){
    include_once '../../Entrega2/Conexion/conn.php';
    $i = $_GET['i'];
    $iint = intval($i) -1;
    $pregunta = "8. Entregue el nombre del i-esimo sendero mas largo. En caso de empate muestre los dos.";
    echo $pregunta;
    $sql = "SELECT * FROM Sendero s1 WHERE (SELECT COUNT(*) FROM Sendero s2 WHERE s2.largo > s1.largo) = '" . $iint . "';";
   # echo "Tu pusiste " . $tour . " para nombre de tour a vina y " . $cepa . " para cepa de vino <br> ";
    echo "Query: " . $sql;
    $data = $conn->query($sql)->fetchAll();
    #$result_check = mysqli_num_rows($result);

?>
<head>
  <meta charset="UTF-8">
</head>
    <table id='userTable'>
        <thead>
            <tr>
                <th>Nombre de Sendero</th>
                <th>Largo</th>
                <th>Dificultad</th>
                <th>Duracion</th>
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
            </tr>
         <?php
         }
         ?>
        </tbody>
    </table>
    <?php 
    
}

?>