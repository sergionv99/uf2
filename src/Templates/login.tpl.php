<html>
<head>
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<body class="log_in">
    <div class="caja">
        <div class="zona-login">
        <h1><?= $title; ?></h1>
        <a href="/">Inicio</a>
        <a href="/register">Registro</a>
        <form action="/login/login" method="post">
                <!--usuari = "algo"/""-->
            <br>
                <label for="usuari">Usuari</label>
            <input type="email" name="email" id="email" placeholder="Email"><br>
                <!--contrasenya = "algo"/""-->
                <label for="contrasenya">Contraseña</label>
            <input type="password" name="contrasenya" id="contrasenya" placeholder="Contraseña"><br>
            <br>
                <input type="submit" id="connectar" value="Connectar" name="connectar">
            </form>
        </div>
    </div>
    </body>
</html>