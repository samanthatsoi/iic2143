<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Consulta 3</title>
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

<h2>Anote un ID de usuario, una fecha de inicio y una fecha de fin, para entregar las habitaciones reservadas por ese usuario entre esas fechas:</h2>
<br/>
<form class=form action="backend_consultas/consulta3.2.php" method="post">
  ID Usuario:
  <input type="integer" name="id">
  <br>
  Fecha Inicio:
  <input type="text" name="fecha_in">
  <br>
  Fecha Fin:
  <input type="text" name="fecha_fin">
  <BR>
  <input type="submit" value="Consultar" name="miBoton"/>
  <br/>
  <br/>
  POR FAVOR ESCRIBIR FECHAS DE LA FORMA 'AAAA-MM-DD' INCLUYENDO COMILLA SIMPLE.
</form>

</body>

</html>