<?php
include './utils/db.php';

$sql = "SELECT * FROM rol JOIN usuario WHERE rol.idusuario = usuario.id";

if (isset($_GET['q'])) {
  $search = $_GET['q'];
  $sql = "SELECT * FROM roles JOIN usuario WHERE roles.id = usuario.id AND usuario.apellido = '$search'";
}

$resultAdmin = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <link rel="shortcut icon" href="assets/images/logo.png">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin de la Suiza</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="stykit.js" defer></script>
</head>

<body class="overflow-x-hidden bg-rose-900">
  <?php include './partials/header.php'; ?>
  <div class="flex flex-row">

    <div class="bg-rose-900 gap-4 flex flex-col w-full p-4 h-full">

      <?php while ($row = $resultAdmin->fetch_assoc()) { ?>
        <div class="p-4 z-10 shadow-2xl bg-rose-700 border gap-4 border-neutral-300 rounded flex jusitfy-center items-center">
          <img class="border-4 border-black w-[100px] rounded-full" src="<?php 
          
          $actualimg = "./assets/images/usuario.jpg";
          $acutalid = $row['id'];
        
                    if(file_exists("./assets/images/$acutalid.jpg")){
                       $actualimg = "./assets/images/$acutalid.jpg";
                    }
        
                    if(file_exists("./assets/images/$acutalid.jpeg")){
                      $actualimg = "./assets/images/$acutalid.jpeg";
                    }
        
                    if(file_exists("./assets/images/$acutalid.png")){
                     $actualimg = "./assets/images/$acutalid.png";
                     }
        
          echo  $actualimg; ?>" alt="Alumno">
         
            <div class="relative  shadow-lg bg-rose-600 rounded w-full h-[100px] p-4 gap-2 flex flex-col">

              <table>
                <tr>    
                    <th>nombre</th>
                    <th>apellido</th>
                    <th>fecha</th>
                   <th>estado</th>
                </tr>
                <tr>   
                   <form method="POST" action="preceptor.php" name ="formeditar" >                
                      <td><input type="text" name="nombre" value=<?php echo $row['nombre'];?> readonly></td>
                      <td><input type="text" name="apellido" value=<?php echo $row['apellido'];?> readonly></td>
                      <td><input type="text" name="fecha" value=<?php echo $row['fecha'];?>></td>
                      <td><input type="text" name="estado" value=<?php echo $row['estado'];?>></td>
                      <td><button type="submit" name="guardar" class="registro">Guardar cambios</button></td>
                      <td><a class="a" href="preceptor.php?id=<?php echo $row['id'];?>"> Eliminar </a></td>
                </tr>
              </table>
            </div>
          </div>


      <?php } ?>

    </div>
  </div>

</body>

</html>


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
      <textarea name="descrip" form="form" placeholder="Descripcion" id="" cols="30" rows="5" class="w-full border border-neutral-400 px-4 py-2 text-xl focus:outline-none text-neutral-700"></textarea>
    
    <select name="dificultad" id="" form="form" class="w-full border border-neutral-400 px-4 py-2 text-xl focus:outline-none text-neutral-700">
      <option value="" disabled selected>Dificultad</option>
      <option value="Basico">Basico</option>
      <option value="Intermedio">Intermedio</option>
      <option value="Avanzado">Avanzado</option>
    </select>