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
$arroba = "@";
$hashcontra = password_hash($contrasena, PASSWORD_DEFAULT);
$idunico = uniqid();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $consulta = "SELECT * from usuario where email = '$email'";
  $result = $conn->query($consulta);

  if ($result->num_rows > 0) {
    $msg = '
			<div class="alert alert-danger">
				<strong  class="text-red-700">Este usuario ya existe</strong>.
        	</div>';
  } else {
    if (strpos($email, $arroba) !== false ){
      $consultaInsert = "INSERT INTO usuario (nombre,apellido,email,telefono,contrasena) values ('$nombre','$apellido', '$email','$telefono', '$hashcontra')";
      $resultInsert = mysqli_query($conn, $consultaInsert);

      if ($resultInsert) {
        $msg = '<div class="alert alert-success">
				<strong class="text-green-700">El usuario se ha creado correctamente!!.</strong> 
        	</div>';

        $CONSULTA4 = "SELECT * from usuario where email = '$email'";
        $result2 = $conn->query($CONSULTA4);
          while ($row = $result2->fetch_assoc()) {
            $id = $row['id'];
          }
          $consultaInsertROL = "INSERT INTO rol( idusuario, idrol) VALUES ('$id', 4)";
          $resultadoROL = mysqli_query($conn, $consultaInsertROL);


        $sql = "INSERT into tag (tag,idusuario) values ('$idunico','$id')";     
        if ($conn->query($sql) === TRUE) {
          $msg = $msg.'
            <div class="alert alert-success">
          <strong class="text-green-700">El TAG '.$idunico.' se asigno correctamente al usuario.</strong><br> 
            </div>';} else {
              $msg = $msg.'
              <div class="alert alert-danger">
                <strong class="text-rose-700">Hubo un error al asignar el TAG.</strong> 
                </div>';}
      }
      
    }
    else {
      $msg = '<div class="alert alert-success">
      <strong class="text-rose-700">Use un formato email correcto.</strong> 
        </div>';}
      }

      /*if($result){
        $resultado = "SELECT id FROM usuarios WHERE email = '$email' ";
        $s = mysqli_query($conn,$resultado);
        while($row = $s->fetch_assoc())
        {
          $messi = $row['id'];
          $z = "INSERT INTO rol( idusuario, idrol) VALUES ('$messi', 4)"; 
          $resultadoTAG = mysqli_query($conn,$z);
           
         }
        }*/
    

  
  }


?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro del Suizo</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="stykit.js" defer></script>
</head>

<body class="overflow-x-hidden bg-rose-900">
  <?php include './partials/header.php'; ?>
  <div class="bg-rose-800 flex justify-center items-center">
    <form action="register.php" method="post" class="flex shadow-xl flex-col bg-white px-12 gap-4 py-4 rounded justify-center items-center">
      <img class="w-[200px] aspect-square" src="./assets/images/usuario.jpg" alt="Usuario">
      <input name="nombre" required id="" placeholder="Nombre" class="w-full border border-neutral-400 px-4 py-2 text-xl focus:outline-none text-neutral-700">
      <input name="apellido" required id="" placeholder="Apellido" class="w-full border border-neutral-400 px-4 py-2 text-xl focus:outline-none text-neutral-700">
      <input type="email" name="email" required id="" placeholder="Email" class="w-full border border-neutral-400 px-4 py-2 text-xl focus:outline-none text-neutral-700">
      <input type="password" name="contrasena" required id="" placeholder="Password" class="w-full border border-neutral-400 px-4 py-2 text-xl focus:outline-none text-neutral-700">
      <input type="tel" name="telefono" id="" required placeholder="Telefono" class="w-full border border-neutral-400 px-4 py-2 text-xl focus:outline-none text-neutral-700">
      <input class="bg-rose-700 text-white rounded w-full text-2xl py-3 flex justify-center items-center" type="submit" value="Registrarse" class="boton">
      <a class="text-nuetral-700 text-xl">¿Ya tenés una cuenta?</a><a href="login.php" class="text-blue-700 text-xl"> Iniciar sesion</a>
      <?php if (isset($msg)) echo $msg ?>
    </form>
  </div>
</body>

</html>