<?php

$id = $_COOKIE["session"];


$userimg = "./assets/images/usuario.jpg";

if(file_exists("./assets/images/$id.jpg")){
  $userimg = "./assets/images/$id.jpg";
}

if(file_exists("./assets/images/$id.jpeg")){
  $userimg = "./assets/images/$id.jpeg";
}

if(file_exists("./assets/images/$id.png")){
  $userimg = "./assets/images/$id.png";
} 



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $file = $_FILES["fileTest"]["name"]; //Nombre de nuestro archivo

  if($file==''){
    $msg ='<div class="alert alert-danger">
          <strong class="text-red-700">Primero Selecciona un archivo!!</strong> 
          </div>';
          $validator = 0;
  } else {
      $validator = 1; //Variable validadora

      $file_type = strtolower(pathinfo($file,PATHINFO_EXTENSION)); //Extensión de nuestro archivo

      $url_temp = $_FILES["fileTest"]["tmp_name"]; //Ruta temporal a donde se carga el archivo 

      //dirname(__FILE__) nos otorga la ruta absoluta hasta el archivo en ejecución
      $url_insert = dirname(__FILE__) . "/assets/images"; //Carpeta donde subiremos nuestros archivos

      //Ruta donde se guardara el archivo, usamos str_replace para reemplazar los "\" por "/"
      $url_target = str_replace('\\', '/', $url_insert) . '/' . $file;

      //Si la carpeta no existe, la creamos
      if (!file_exists($url_insert)) {
        mkdir($url_insert, 0777, true);
      };

      //Validamos la extensión del archivo
      if($file_type != "jpg" && $file_type != "jpeg" && $file_type != "png") {
          $msg ='<div class="alert alert-danger">
                <strong class="text-red-700">Solo se permiten imágenes tipo JPG, JPEG o PNG.</strong> 
               </div>';           
         $validator = 0;
      }

      //movemos el archivo de la carpeta temporal a la carpeta objetivo y verificamos si fue exitoso
      if($validator == 1){

        //Mover el archivo a la ruta, borrar cualquier archivo que contenga la id del user y renombrar el archivo con la id.
        if (move_uploaded_file($url_temp, $url_target)) {
          if(file_exists("./assets/images/$id.jpg")){unlink("./assets/images/$id.jpg"); }
         if(file_exists("./assets/images/$id.jpeg")){unlink("./assets/images/$id.jpg"); }
          if(file_exists("./assets/images/$id.png")){unlink("./assets/images/$id.jpg"); }
          $success = "El archivo " . htmlspecialchars(basename($file)) . " ha sido cargado con éxito.";
          if(rename("./assets/images/$file", "./assets/images/$id.$file_type")){
            clearstatcache();
             $msg = '<div class="alert alert-success">
                     <strong class="text-green-700">'.$success.'.</strong> 
                     </div>';              
          } 
        } else {
           $msg = $msg. '<div class="alert alert-danger">
                         <strong class="text-red-700">Ha habido un error al cargar tu archivo.</strong> 
                         </div>';            
        }
      } else{
          $msg = $msg. '<div class="alert alert-danger">
                        <strong class="text-red-700">Error: el archivo no se ha cargado</strong> 
                        </div>';
        }
      }
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
  <form  action="cambiarfoto.php" method="post" enctype="multipart/form-data" class="flex shadow-xl flex-col bg-gray-200 px-12 gap-4 py-4 rounded justify-center items-center">
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