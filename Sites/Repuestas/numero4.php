<?php
if(isset($_GET['numero4'])){
    include_once '../../Entrega2/Conexion/conn.php';
    $pregunta = 'El nombre de la viña a la que le pertenece el vino mas caro, junto a los detalles del vino.';
    echo "<br>";
    echo "<br>";
    $sql = "SELECT Vina.vina_nombre, 
       t1.vino_nombre, 
       t1.vino_descripcion, 
       t1.cepa, 
       t1.vino_precio 
FROM   Vino t1, 
       Vina 
WHERE  t1.vinaid = Vina.vinaid 
       AND t1.vino_precio = (SELECT Max(t2.vino_precio) 
                             FROM   Vino t2); ";
   # echo "Tu pusiste " . $tour . " para nombre de tour a vina y " . $cepa . " para cepa de vino <br> ";
    echo $pregunta;
    $data = $conn->query($sql)->fetchAll();
    #$result_check = mysqli_num_rows($result);

?>
<head>
  <meta charset="UTF-8">
</head>
    <table id='userTable'>
        <thead>
            <tr>
                <th>Vina Nombre</th>
                <th>Vino Nombre</th>
                <th>Vino Descripcion</th>
                <th>Cepa</th>
                <th>Vino Precio</th>

             </tr>
        </thead>
        <?php
        foreach ($data as $row) {
        ?>

        <tbody>
            <tr>
                <td><?php  echo $row['vina_nombre']; ?></td>
                <td><?php  echo $row['vino_nombre']; ?></td>
                <td><?php  echo $row['vino_descripcion']; ?></td>
                <td><?php  echo $row['cepa']; ?></td>
                <td><?php  echo $row['vino_precio']; ?></td>

            </tr>
         <?php
         }
         ?>
        </tbody>
    </table>
    <?php 
    
}

?>


