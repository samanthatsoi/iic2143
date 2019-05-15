<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Consulta 1</title>
    <link rel="stylesheet" href="index_style.css">
</head>

<body>
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


<h2>Entregue un n&uacutemero de regi&oacuten y se mostrar&aacuten todos los platos de los restaurantes de esa regi&oacuten</h2>
<br/>
<form class=form action="backend_consultas/consulta1.2.php" method="post">
  N&uacutemero regi&oacuten:
  <input type="integer" name="numero_region">
  <br/><br/>
  <input type="submit" value="Consultar">
</form>


</body>

</html>