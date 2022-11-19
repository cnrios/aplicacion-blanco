<?php

include './utils/db.php';

if (isset($_COOKIE['session'])) {
  header('Location: index.php');
}

if (isset($_POST['nombre'])) $nombre = $_POST['nombre'];
if (isset($_POST['apellido'])) $apellido = $_POST['apellido'];
if (isset($_POST['email'])) $email = $_POST['email'];
if (isset($_POST['contrasena'])) $contrasena = $_POST['contrasena'];
if (isset($_POST['telefono'])) $telefono = $_POST['telefono'];

$hashcontra = password_hash($contrasena, PASSWORD_DEFAULT);
$idunico = uniqid();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $sql = "select * from usuario where email = '$email'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $msg = '
			<div class="alert alert-danger">
				<strong  class="text-red-700">Este usuario ya existe</strong>.
        	</div>';
  } else {
    $sql2 = "select * from usuario where nombre = '$nombre'";
    $result2 = $conn->query($sql);
    if ($result2->num_rows > 0) {
      $msg = '
			<div class="alert alert-danger">
				<strong  class="text-red-700">Este nombre ya existe</strong>.
        	</div>';
    } else {
      $sql = "insert into usuario (nombre,apellido,email,telefono,contrasena) values ('$nombre','$apellido', '$email','$telefono', '$hashcontra')";

      if ($conn->query($sql) === TRUE) {
        $msg = '
			<div class="alert alert-success">
				<strong class="text-green-700">El usuario se ha creado correctamente!!.</strong> 
        	</div>';

        $sql = "select idusuario from usuario where email = '$email'";

        $result = $conn->query($sql);
        $string = strval($result);
        echo $string;

       
      }

      }

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
    <form action="register.php" method="post" class="flex shadow-xl flex-col bg-white px-12 gap-4 py-4 rounded justify-center items-center">
      <img class="w-[200px] aspect-square" src="./assets/images/usuario.jpg" alt="Usuario">
      <input name="nombre" id="" placeholder="Nombre" class="w-full border border-neutral-400 px-4 py-2 text-xl focus:outline-none text-neutral-700">
      <input name="apellido" id="" placeholder="Apellido" class="w-full border border-neutral-400 px-4 py-2 text-xl focus:outline-none text-neutral-700">
      <input name="email" id="" placeholder="Email" class="w-full border border-neutral-400 px-4 py-2 text-xl focus:outline-none text-neutral-700">
      <input type="password" name="contrasena" id="" placeholder="Password" class="w-full border border-neutral-400 px-4 py-2 text-xl focus:outline-none text-neutral-700">
      <input type="tel" name="telefono" id="" placeholder="Telefono" class="w-full border border-neutral-400 px-4 py-2 text-xl focus:outline-none text-neutral-700">
      <p><?php  echo "Tu tag es: $idunico"; ?></p>
      <input class="bg-rose-700 text-white rounded w-full text-2xl py-3 flex justify-center items-center" type="submit" value="Registrarse" class="boton">
      <a href="login.php" class="text-nuetral-700 text-xl">Ya tenes una cuenta? Inicia sesion</a>
      <?php if (isset($msg)) echo $msg ?>
    </form>
  </div>
</body>

</html> 