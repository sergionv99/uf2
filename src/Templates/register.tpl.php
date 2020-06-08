<html>
<head>
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<body class="log_in">
    <div class="caja">
        <h1><?= $title; ?></h1>
        <a href="/">Inicio</a>
        <a href="/login">Entrar</a>
        <br>
        <br>
        <form action="/register/register" method="post">
            <label for="mail">Email</label>
            <input type="email" name="email" id="mail" placeholder="Email"><br>
                <label for="name">Nombre</label>
            <input type="text" name="name" id="name" placeholder="Nombre"><br>
                <label for="surname">Apellido</label>
            <input type="text" name="surname" id="l_name" placeholder="Apellido"><br>
                <label for="contrasenya">Contraseña</label>
            <input type="password" name="contrasenya" id="pass"><br>

              <br>  <hr/><br>
                <input type="submit" id="connectar" value="Registrarse" name="registrar">
            </form>
        </div>
    </body>
</html>