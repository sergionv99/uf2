<html>
<head>
    <style>

        .inp-text{
            height: 20px;
            margin: 5px;
        }
    </style>

</head>


<body style="display: flex;
    justify-content: center;
    align-items: center;">


<div class="">
    <h1><?= $title ?></h1>
<form action="/propertie/propertie" method="post">

    <label for="title">Titulo:
        <input style="margin-left: 57px" class="inp-text" type="text" name="title" id="tit" placeholder="Titulo del anuncio">
    </label><br>

    <label for="type">Inmueble
        <select name="type">
            <option value="Piso">Piso</option>
            <option value="Casa">Casa</option>
        </select>
    </label>

    <label for="state">Estado
        <select name="state">
            <option value="Alquiler">Alquiler</option>
            <option value="Venta">Venta</option>
        </select>
    </label>
<br>

    <label for="city">Ciudad:
        <input style="margin-left: 50px" class="inp-text" type="text" name="city" id="pob" placeholder="Ciudad">
    </label><br>

    <label for="province">Provincia:
        <input style="margin-left: 31px"  class="inp-text" type="text" name="province" id="pob" placeholder="Provincia">
    </label><br>

    <label for="cp">Cod postal:
        <input style="margin-left: 23px" class="inp-text" type="text" name="cp" id="pob" placeholder="Cp">
    </label><br>



    <label for="desc">Descripcion:
        <input style="margin-left: 14px" class="inp-text" type="text" name="description" id="desc" placeholder="Descripcion">
    </label><br>

    <label for="precio">Precio:
        <input style="margin-left: 59px" class="inp-text" type="number" name="price" id="precio" placeholder="Precio">
    </label><br>

    <label for="area">M cuadrados:
        <input class="inp-text" type="number" name="area" id="m2" placeholder="M2">
    </label><br>


    <br>

    <input type="submit" id="connectar" value="Publicar" name="registrar">
</form>
</div>
</body>
</html>