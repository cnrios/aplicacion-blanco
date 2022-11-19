<?php

include './utils/db.php';

if (isset($_COOKIE['session'])) {
  header('Location: index.php');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $dato = $_POST['email'];
  $contrasena = $_POST['contrasena'];

  if (strpos($dato, '@')) {
    $sql = "SELECT * FROM usuarios WHERE email = '$dato'";
  } else {
    $sql = "SELECT * FROM usuarios WHERE nombre = '$dato'";
  }

  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      if ($hashcontra == $row['contrasena']) {
        setcookie('session', $row['email'], time() + (86400 * 30) * 360, "/");
        header("location: index.php");
      } else {
        $msg = '<body> <div class="alert alert-danger">
        <strong class="text-red-900"> La contraseña ingresada es incorrecta.</strong>
      </div> </body>';
      }
    }
  } else {
    $msg = '<body> <div class="alert alert-danger">
    <strong  class="text-red-900">El usuario no existe.</strong> 
  </div> </body>';
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
    <form action="login.php" method="post" class="flex shadow-xl flex-col bg-white px-12 gap-4 py-4 rounded justify-center items-center">
      <img class="w-[200px] aspect-square" src="./assets/images/usuario.jpg" alt="Usuario">
      <input name="email" id="" placeholder="Email" class="w-full border border-neutral-400 px-4 py-2 text-xl focus:outline-none text-neutral-700">
      <input type="password" name="contrasena" id="" placeholder="Password" class="w-full border border-neutral-400 px-4 py-2 text-xl focus:outline-none text-neutral-700">
      <input class="bg-rose-700 text-white rounded w-full text-2xl py-3 flex justify-center items-center" type="submit" value="Iniciar sesion" class="boton">
      <a href="register.php" class="text-nuetral-700 text-xl">No tenes una cuenta? Registrate</a>
      <?php if (isset($msg)) echo $msg ?>
    </form>
  </div>
</body>

</html>