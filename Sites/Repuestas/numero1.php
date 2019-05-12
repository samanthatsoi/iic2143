<?php
if(isset($_GET['numero1']))
{
    include_once '../../Entrega2/Conexion/conn.php';
    $input = $_GET['input'];
    $sql = "SELECT DISTINCT Usuario.uid, Usuario.user_nombre from Usuario, Sendero, Registro where Usuario.uid = Registro.uid and Sendero.sendid = Registro.sendid and Usuario.uid = " . $input . ";";
    echo "Todos los senderos realizados por un usuario con identificador i.";
    echo "<br>";
    echo "<br>";
    echo "i: " . $input;
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
                <th>Uid</th>
                <th>User Nombre</th>

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

?>