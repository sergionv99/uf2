<html>
    <head>
        <link rel="stylesheet" href="../public/css/style.css">
    </head>
    <body class="home">

    <section class="menu">
        <article></article>
    <?php
    session_start();


    echo "<article class='navegador'>";
    if (isset($_SESSION['user'])){
        echo "<a href='/propertie'>Añadir anuncio</a>";
        echo "<form action='/login/logout' method='post'>
                    <input type='submit' value='Salir'> ";
    }
    else{
      echo "<a href='/login'>Entrar </a>";
    }
    echo "</article>";
    ?>

    </section>
        <h1 class="titulazo"><?= $title ?></h1>

        <hr/>
        <nav><?= $html ?></nav>
    <section class="buscador-section">
        <form class="buscador">
            <input type="text" placeholder="buscador">
        </form>

    </section>
        <section class="ficha">
<?php
        foreach ($propiedades as $propiedad){
        echo "<article><h1 class='titulos'>".$propiedad['title']."</h1>
              <p>".$propiedad['type']." en ".$propiedad['city'].",".$propiedad['province']."</p>
              <p>".($propiedad['state']=='Alquiler'? $propiedad['price'].'€/mes': $propiedad['price'].'€').
              "</p>
              <p>".$propiedad['state']."</p>
              <p>".$propiedad['area']."m2</p>
              <p>".$propiedad['city']."</p>
              <form method='post' action='inmueble/inmueble'></form><a href='/inmueble/".$propiedad['id']."'>Mas informacion</a>      




</article>";
        }
        ?>

        </section>
    <div class="img-back"></div>
    </body>
</html>