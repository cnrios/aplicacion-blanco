<?php

include './utils/db.php';

if (isset($_COOKIE['session'])) {
  header('Location: index.php');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = $_POST['email'];
  $contrasena = $_POST['contrasena'];

  $sql = "SELECT * FROM usuario WHERE email = '$email'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      if (password_verify($contrasena, $row['contrasena'])) {
        setcookie('session', $row['id'], time() + (86400 * 30) * 360, "/");
        $id = $row['id'];
        $sql = "SELECT * FROM rol WHERE idusuario ='$id'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
            if($row['idrol']==1){header("location: alumno.php");}
            if($row['idrol']==2){header("location: preceptor.php");}
            if($row['idrol']==3){header("location: admin.php");}
            }
        } else {
              $msg = '<body> <div class="alert alert-danger">
                      <strong class="text-red-900"> Debes pedirle a un Administrador que te asigne un rol.</strong>
                      </div> </body>';}

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
  <title>Login del Suizo</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="stykit.js" defer></script>
</head>

<body>
  <?php include './partials/header.php'; ?>
  <div class="bg-rose-800 flex justify-center items-center h-screen">
    <form action="login.php" method="post" class="flex shadow-xl flex-col bg-white px-12 gap-4 py-4 rounded justify-center items-center">
      <img class="w-[200px] aspect-square" src="./assets/images/usuario.jpg" alt="Usuario">
      <input name="email" required id="" placeholder="Email" class="w-full border border-neutral-400 px-4 py-2 text-xl focus:outline-none text-neutral-700">
      <input type="password" name="contrasena" required id="" placeholder="Password" class="w-full border border-neutral-400 px-4 py-2 text-xl focus:outline-none text-neutral-700">
      <input class="bg-rose-700 text-white rounded w-full text-2xl py-3 flex justify-center items-center" type="submit" value="Iniciar sesion" class="boton">
      <a class="text-nuetral-700 text-xl">¿No tenes una cuenta?</a><a href="register.php" class="text-blue-700 text-xl"> Registrate</a>
      <?php if (isset($msg)) echo $msg ?>
    </form>
  </div>
</body>

</html>