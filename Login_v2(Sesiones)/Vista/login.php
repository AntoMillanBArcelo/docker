<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="/CSS/style.css">
     
</head>
<body>
    <form name="input" action="../Controlador/controlador.php" method="post" id="formulario">
        <input type="text" name="nombre" placeholder="Nombre">      
        <br>
        <input type="password" name="password" placeholder="Contraseña">       
        <br>
        <input type="checkbox" id="registro" name="registro" onclick="mostrar()">
        <label for="registro">Registrase</label>
        <br>
        <input type="text" name="rol" id="ps" style="display: none;" placeholder="Rol" maxlength="1">
        <script>
            function mostrar() {
                var x = document.getElementById("ps");
                if (x.style.display === "none") {
                    x.style.display = "block";
                } else {
                    x.style.display = "none";
                }
            }
        </script>   
        <br>
        <input type="submit" value="Enviar" name="enviar"/>
    </form>
</body>
</html>