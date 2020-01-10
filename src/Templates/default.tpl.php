<html>
    <head>
        <link rel="stylesheet" href="../public/css/style.css">
    </head>
    <body class="home">
        <h1><?= $title ?></h1>
        <a href="/login">Log In</a>
        <?php
            if (isset($_SESSION['user'])){
                echo "<a href='/add'>Añadir anuncio</a>";
            }
        ?>
        <hr/>
        <nav><?= $html ?></nav>
    </body>
</html>