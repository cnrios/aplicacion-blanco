<?php

$id = $_COOKIE["session"];

$file = $_FILES["fileTest"]["name"]; //Nombre de nuestro archivo

if($file==''){
  $msg ='<div class="alert alert-danger">
        <strong class="text-red-700">Primero Selecciona un archivo!!</strong> 
        </div>';
         header('Location: cambiarfoto.php');
} else {
    $validator = 1; //Variable validadora

    $file_type = strtolower(pathinfo($file,PATHINFO_EXTENSION)); //Extensión de nuestro archivo

    $url_temp = $_FILES["fileTest"]["tmp_name"]; //Ruta temporal a donde se carga el archivo 

    //dirname(__FILE__) nos otorga la ruta absoluta hasta el archivo en ejecución
    $url_insert = dirname(__FILE__) . "/assets/images"; //Carpeta donde subiremos nuestros archivos

    //Ruta donde se guardara el archivo, usamos str_replace para reemplazar los "\" por "/"
    $url_target = str_replace('\\', '/', $url_insert) . '/' . $file;
  }
//Si la carpeta no existe, la creamos
if (!file_exists($url_insert)) {
    mkdir($url_insert, 0777, true);
};

//Validamos la extensión del archivo
if($file_type != "jpg" && $file_type != "jpeg" && $file_type != "png") {
    $msg ='<div class="alert alert-danger">
          <strong class="text-red-700">Solo se permiten imágenes tipo JPG, JPEG o PNG.</strong> 
            </div>';
            header('Location: cambiarfoto.php?$msg=$msg');
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
      $msg = '<div class="alert alert-success">
			  	    <strong class="text-green-700">'.$success.'.</strong> 
          	  </div>';
              header('Location: cambiarfoto.php');
    }
    
} else {
    $msg = $msg. '<div class="alert alert-danger">
          <strong class="text-red-700">Ha habido un error al cargar tu archivo.</strong> 
            </div>';
            header('Location: cambiarfoto.php');
}
}else{
    $msg = $msg. '<div class="alert alert-danger">
          <strong class="text-red-700">Error: el archivo no se ha cargado</strong> 
            </div>';
            header('Location: cambiarfoto.php');

}
?>


