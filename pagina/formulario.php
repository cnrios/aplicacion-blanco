<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guia del Programador</title>
    <link rel="stylesheet" href="./assets/css/form.css">
</head>
<body>
    <form action="" method="post">
        <div class="formulario">
        <p>Formulario de Recomendacion</p>
        
        <a>Titulo</a><br>
        <input type="text" name="Titulo" id="" placeholder="...." >
        <br>
        <a>Video Recomendado</a><br>
        <input type="url" name="Video" id="" placeholder="Link de video">
        <br>
        <a>Descripcion</a><br>
        <input type="text" name="Descripcion" placeholder="....">
        <br>
        <a>Autor</a><br>
        <input type="text" name="Autor" placeholder="...">
        <br>
        <div class="check">
            <br>
        <input id="c" type="radio" name="Check" value="Basico">
        <label for="Basico">Basico</label>
        <input id="c" type="radio" name="Check" value="Intermedio">
        <label for="Intermedio">Intermedio</label>
        <input id="c" type="radio" name="Check" value="Avanzado">
        <label for="Avanzado">Avanzado</label>
        </div>
        <br><br>
        <input type="submit" value="Subir" class="boton">
        
        
    </div>
        
    </form>
</body>
</html>