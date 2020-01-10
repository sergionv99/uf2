<html>
<head>
    <link rel=stylesheet" href="../public/css/style.css">
</head>
<body>
<h1><?= $title ?></h1>

<form action="/add/add" method="post">

    <label for="tit">Titulo:
        <input type="text" name="tit" id="tit" placeholder="Titulo del anuncio">
    </label><br>

    <label for="desc">Descripcion:
        <input type="text" name="desc" id="desc" placeholder="Descripcion">
    </label><br>

    <label for="precio">Precio:
        <input type="number" name="precio" id="precio" placeholder="Precio">
    </label><br>

    <label for="m2">M2:
        <input type="number" name="m2" id="m2" placeholder="M2">
    </label><br>

    <label for="pob">Poblacion:
        <input type="text" name="pob" id="pob" placeholder="Poblacion">
    </label><br>

    <label for="select"> Tipo de anuncio
        <select name="select">
            <option value="1">Alquiler</option>
            <option value="2">Venta</option>
        </select>
    </label>
    <br>

    <label for="select2"> Tipo de inmueble
        <select name="select2">
            <option value="1">Piso</option>
            <option value="2">Casa</option>
            <option value="3">Duplex</option>
            <option value="4">Plaza coche</option>
            <option value="5">Local</option>
        </select>
    </label>
    <br><br>

    <hr/><br>
    <input type="submit" id="connectar" value="Publicar" name="registrar">
</form>
</body>
</html>