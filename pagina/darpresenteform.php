<?php
include './utils/db.php';

if (!isset($_COOKIE['session'])) {
  header('Location: index.php');
}
$id = $_COOKIE["session"];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sql = "INSERT INTO asistencia (idusuario, estado) VALUES ('$id','presente')";

    if ($conn->query($sql) === TRUE) {
      $msg = '
			  <div class="alert alert-success">
				  <strong class="text-green-700"> Usted esta presente. </strong>  
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
    <form id="form" action="darpresenteform.php" method="post" class="flex flex-col bg-white p-6 gap-4 rounded justify-center items-center">
      <p class="w-full border border-neutral-400 px-4 py-2 text-xl focus:outline-none"><?php echo "ID de usuario: $id" ?></p>
      <p class="w-full border border-neutral-400 px-4 py-2 text-xl focus:outline-none"><?php echo "Fecha y hora: Actual" ?></p>
      <p class="w-full border border-neutral-400 px-4 py-2 text-xl focus:outline-none"><?php echo "Estado: Presente" ?></p>
      <input class="cursor-pointer bg-rose-700 text-white rounded w-full text-2xl py-3 flex justify-center items-center" type="submit" value="Dar presente" class="boton">
      <?php if (isset($msg)) echo $msg ?>
    </form>
  </div>
</body>

</html>