<html>
<head>
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<body class="log_in">
    <div class="caja">
        <h1><?= $title; ?></h1>
        <a href="/">Inicio</a>
        <a href="/login">Log In</a>
        <form action="/register/register" method="post">
                <!--usuari = "algo"/""-->
                <label for="usuari">Usuari</label><input type="text" name="usuari" id="usuari" placeholder="Nom d'usuari"><br>
                <!--contrasenya = "algo"/""-->
                <label for="contrasenya">Contrasenya</label><input type="password" name="contrasenya" id="contrasenya" placeholder="Contrasenya del compte"><br>
                <label for="mail">Correu</label><input type="email" name="mail" id="mail" placeholder="Email"><br>
                <label for="tlf">Telefon</label><input type="tel" name="tlf" id="tlf" placeholder="Telefon"><br>
                <label for="name">Nombre</label><input type="text" name="name" id="name" placeholder="Nombre"><br>
                <label for="l_name">Apellido</label><input type="text" name="l_name" id="l_name" placeholder="Apellido"><br><br>
                <hr/><br>
                <input type="submit" id="connectar" value="Connectar" name="registrar">
            </form>
        </div>
    </body>
</html>