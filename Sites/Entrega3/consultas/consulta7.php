<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Consulta 7</title>
    <link rel="stylesheet" href="index_style.css">
</head>


<header>
        <a href="../index.html">
            <div class="contenedor" id="uno">
                <img class="icon" src="../home.png">
                <p class="texto">Inicio</p>
            </div>
        </a>

        <a href="../consultas_index.html">
            <div class="contenedor" id="dos">
                <img class="icon" src="../database.png" alt="">
                <p class="texto">Consultas</p>
            </div>
        </a>

        <a href="../info.html">
            <div class="contenedor" id="tres">
                <img class="icon" src="../information.png" alt="">
                <p class="texto">Info</p>
            </div>
        </a>

    </header>


<h2>Anote un ID de reserva y se entregar&aacute el nombre del usuario que hizo la reserva junto al monto total que paga por esa reserva</h3>
<br/>
<form class=form action="backend_consultas/consulta7.2.php" method="post">
  ID Reserva:
  <input type="integer" name="id">
  <br/><br/>
  <input type="submit" value="Consultar">
</form>


</body>

</html>