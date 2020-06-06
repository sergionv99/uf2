<html>
<head>
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<body class="log_in">
    <div class="caja">
        <h1><?= $title; ?></h1>
        <a href="/">Inicio</a>
        <a href="/register">Registro</a>
        <form action="/login/login" method="post">
                <!--usuari = "algo"/""-->
                <label for="usuari">Usuari</label>
            <input type="email" name="email" id="usuari" placeholder="Email"><br>
                <!--contrasenya = "algo"/""-->
                <label for="contrasenya">Contrasenya</label>
            <input type="password" name="contrasenya" id="contrasenya" placeholder="Contraseña"><br>
                <input type="submit" id="connectar" value="Connectar" name="connectar">
            </form>
        </div>
    </body>
</html>