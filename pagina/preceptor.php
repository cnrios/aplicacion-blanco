  <?php
  include './utils/db.php';

  
  $sql = "SELECT * FROM asistencia JOIN usuario WHERE asistencia.idusuario = usuario.id";

  if (isset($_GET['q'])) {
    $search = $_GET['q'];
    $sql = "SELECT * FROM asistencia JOIN usuario WHERE asistencia.idusuario = usuario.id AND usuario.apellido = '$q'";
  }


  $resultAsistencias = $conn->query($sql);
  ?>

  <!DOCTYPE html>
  <html lang="es">

  <head>
    <link rel="shortcut icon" href="assets/images/logo.png">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preceptores</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="stykit.js" defer></script>
  </head>

  <body class="overflow-x-hidden bg-rose-900">
    <?php include './partials/header.php'; ?>
    <div class="flex flex-row">
      <?php include './partials/aside.php'; ?>

      <div class="bg-rose-900 gap-4 flex flex-col w-full p-4 h-full">

        <?php while ($row = $resultAsistencias->fetch_assoc()) { ?>
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
            <th><div class="w-45 px-1 bg-black "><p class="py-1 text-white text-center">Nombre</p></div></th>
            <th><div class="w-45 px-1 bg-black "><p class="py-1 text-white text-center">Apellido</p></div></th>
            <th><div class="w-45 px-1 bg-black "><p class="py-1 text-white text-center">Fecha</p></div></th>
            <th><div class="w-45 px-1 bg-black "><p class="py-1 text-white text-center">Estado</p></div></th>
            <th><div class="w-45 px-1 bg-black "><p class="py-1">.</p></div></th>
            <th><div class="w-45 px-1 bg-black "><p class="py-1">.</p></div></th>
        </tr>
                <tr>   
                   <form method="POST" action="preceptor.php" name ="formeditar" >                
                      <td><div class="w-45 px-1 py-1 bg-black "><input class="py-1 bg-white text-center" type="text" name="nombre"  value=<?php echo $row['nombre'];?> readonly></div></td>
                      <td><div class="w-45 px-1 py-1 bg-black "><input class="py-1 bg-white text-center" type="text" name="apellido" value=<?php echo $row['apellido'];?> readonly></div></td>
                      <td><div class="w-45 px-1 py-1 bg-black "><input class="py-1 bg-white text-center" type="text" name="fecha" value=<?php echo $row['fecha'];?>></div></td>
                      <td><div class="w-45 px-1 py-1 bg-black "><input class="py-1 bg-white text-center" type="text" name="estado" value=<?php echo $row['estado'];?>></div></td>

						          <td><p><a style="color: black;" href="cambiarEstado.php">Cambiar Estado </a><p></td>
						          <td><p><a style="color: black;" href="eliminarAlumnno.php">Eliminar Alumno</a><p></td>                
                  </tr>
              </table>
            </div>
          </div>

        <?php } ?>

      </div>
    </div>

  </body>

  </html>

