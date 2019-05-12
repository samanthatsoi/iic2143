<?php
if(isset($_GET['numero3'])){
    include_once '../../Entrega2/Conexion/conn.php';
    $tour = $_GET['tour'];
    $cepa = $_GET['cepa'];
    $pregunta = 'Todos los nombres de los vinos presentes en ese tour que sean de esa cepa.';
    $sql = "SELECT DISTINCT Vino.vino_nombre FROM Enoturismo, TourVino, Vino 
    WHERE Enoturismo.tourid = TourVino.tourid AND TourVino.vinoid = Vino.vinoid AND tour_nombre ilike '" . $tour . "' AND cepa ilike '" . $cepa . "';";
    echo $pregunta ."<br>";
    echo "<br>";
    echo "Nombre de tour a vina: " . $tour ."<br>";
    echo "Cepa de Vino: " . $cepa ."<br>";
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
                <th>Vino Nombre</th>

            </tr>
        </thead>
        <?php
        foreach ($data as $row) {
        ?>

        <tbody>
            <tr>
                <td><?php  echo $row['vino_nombre']; ?></td>

            </tr>
         <?php
         }
         ?>
        </tbody>
    </table>
    <?php 
    
}

?>

