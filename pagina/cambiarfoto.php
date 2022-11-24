<?php

$id = $_COOKIE["session"];

$userimg = "./assets/images/usuario.jpg";
  if(file_exists("./assets/images/$id.jpg")){
    $userimg = "./assets/images/$id.jpg";
  }

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <link rel="shortcut icon" href="assets/images/logo.png">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar Foto</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="stykit.js" defer></script>
</head>

<body class="overflow-x-hidden bg-rose-900">
  <?php include './partials/header.php'; ?>
  <div class="bg-rose-800 flex justify-center items-center h-screen">
  <form  action="subirfoto.php" method="post" enctype="multipart/form-data" class="flex shadow-xl flex-col bg-gray-200 px-12 gap-4 py-4 rounded justify-center items-center">
        <img class="border-4 border-black w-[200px] rounded-full" src="<?php echo $userimg; ?>" alt="Usuario">
        <a class="bg-white text-nuetral-900 text-xl border-2 border-cyan-600 rounded-xl px-10 py-1"><?php echo $nombre; ?></a>
        <div class="rounded-xl bg-gray-400 px-10 py-5"
        ><label for="fileTest">Selecciona una imagen de tu ordenador:</label><br><br>
        <input id="fileTest" name="fileTest" type="file">
</div>
        <button class="rounded bg-rose-700 px-8 py-1 text-xl text-white py-1" type="submit">Cambiar foto de perfil</button>
        <?php if (isset($msg)) echo $msg ?>
    </form>
  </div>

</body>

</html>