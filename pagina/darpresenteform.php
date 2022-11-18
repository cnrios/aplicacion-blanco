<?php
include './utils/db.php';

if (!isset($_COOKIE['session'])) {
  header('Location: index.php');
}

if (isset($_POST['link'])) $link = $_POST['link'];
if (isset($_POST['titulo'])) $titulo = $_POST['titulo'];
if (isset($_POST['lenguaje'])) $lenguaje = $_POST['lenguaje'];
if (isset($_POST['dificultad'])) $dificultad = $_POST['dificultad'];
if (isset($_POST['descrip'])) $descrip = $_POST['descrip'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (str_contains($link, "https://youtu.be/")) $link = str_replace("https://youtu.be/", "https://www.youtube.com/embed/", $link);
  if (str_contains($link, "https://www.youtube.com/watch?v=")) $link = str_replace("https://www.youtube.com/watch?v=", "https://www.youtube.com/embed/", $link);
  $sql = "insert into cursos (link, titulo, lenguaje, dificultad, descrip) values ('$link', '$titulo', '$lenguaje', '$dificultad', '$descrip')";

  if ($conn->query($sql) === TRUE) {
    unset($_POST['link']);
    unset($_POST['titulo']);
    unset($_POST['lenguaje']);
    unset($_POST['dificultad']);
    unset($_POST['descrip']);
    $msg = '
			<div class="alert alert-success">
				<strong class="text-green-700"> El curso se ha subido correctamente. </strong>  
        	</div>';
  }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Guia del Programador</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="stykit.js" defer></script>
</head>

<body>
  <?php include './partials/header.php'; ?>
  <div class="bg-rose-800 flex justify-center items-center h-screen">
    <form id="form" action="subir.php" method="post" class="flex flex-col bg-white p-6 gap-4 rounded justify-center items-center">
      <input name="titulo" id="" placeholder="Titulo" class="w-full border border-neutral-400 px-4 py-2 text-xl focus:outline-none text-neutral-700">
      <input name="link" id="" placeholder="Link" class="w-full border border-neutral-400 px-4 py-2 text-xl focus:outline-none text-neutral-700">
      <textarea name="descrip" form="form" placeholder="Descripcion" id="" cols="30" rows="5" class="w-full border border-neutral-400 px-4 py-2 text-xl focus:outline-none text-neutral-700"></textarea>
      <select name="lenguaje" id="" form="form" class="w-full border border-neutral-400 px-4 py-2 text-xl focus:outline-none text-neutral-700">
        <option value="" disabled selected>Lenguaje</option>
        <option value="">HTML</option>
        <option value="CSS">CSS</option>
        <option value="JavaScript">JavaScript</option>
        <option value="C++">C++</option>
        <option value="C++">C</option>
        <option value="C++">C#</option>
        <option value="PHP">PHP</option>
        <option value="Unity">Unity</option>
        <option value="Java">Java</option>
        <option value="Python">Python</option>
        <option value="Python">Kotlin</option>
        <option value="Python">Swift</option>
        <option value="Python">Dart</option>
      </select>
      <select name="dificultad" id="" form="form" class="w-full border border-neutral-400 px-4 py-2 text-xl focus:outline-none text-neutral-700">
        <option value="" disabled selected>Dificultad</option>
        <option value="Basico">Basico</option>
        <option value="Intermedio">Intermedio</option>
        <option value="Avanzado">Avanzado</option>
      </select>
      <input class="cursor-pointer bg-rose-700 text-white rounded w-full text-2xl py-3 flex justify-center items-center" type="submit" value="Subir curso" class="boton">
      <?php if (isset($msg)) echo $msg ?>
    </form>
  </div>
</body>

</html>