<?php
if(isset($_GET['numero5'])){
    include_once '../../Entrega2/Conexion/conn.php';

    $sql = "SELECT Usuario.uid, Usuario.user_nombre 
    FROM Sendero, Registro, Usuario 
    WHERE Registro.sendid = Sendero.sendid 
    AND Usuario.uid = Registro.uid 
    AND Registro.estado = 'en ruta' 
    AND Sendero.largo = (SELECT Max(Sendero.largo) 
        FROM Sendero); ";
   # echo "Tu pusiste " . $tour . " para nombre de tour a vina y " . $cepa . " para cepa de vino <br> ";
    echo "Todos los usuarios que estén en ruta en el sendero más largo.";
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
                <th>Usuario id</th>
                <th>Usuario nombre</th>

            </tr>
        </thead>
        <?php
        foreach ($data as $row) {
        ?>

        <tbody>
            <tr>
                <td><?php  echo $row['uid']; ?></td>
                <td><?php  echo $row['user_nombre']; ?></td>
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
    echo "No hay.";
}
?>