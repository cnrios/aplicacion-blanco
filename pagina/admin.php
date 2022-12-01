<?php
include './utils/db.php';

$sql = "SELECT * FROM rol JOIN usuario WHERE rol.idusuario = usuario.id";


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
        
          echo  $actualimg; ?> " alt="Alumno">
         
            <div class="relative  shadow-lg bg-rose-600 rounded w-full h-[100px] p-4 gap-2 flex flex-col">

              <table>
                <tr>    
                    <th>ID de usuario</th>
                    <th>nombre</th>
                    <th>apellido</th>
                    <th>ID Rol</th>
                    <th>Rol</th>
                </tr>
                <tr>   
                   <form method="POST" action="admin.php" name ="formeditar" >                
                      <td><input type="text" name="id" value=<?php echo $row['id'];?> readonly></td>
                      <td><input type="text" name="nombre" value=<?php echo $row['nombre'];?> readonly></td>
                      <td><input readonly type="text" name="apellido" value=<?php echo $row['apellido'];?>></td>
                      <td><input type="text" name="rol" value=<?php echo $row['idrol'];?>></td>
                      <td><input readonly type="text" name="apellido" value=<?php 
                       if($row['idrol']==1){echo "alumno";}
                       if($row['idrol']==2){echo "preceptor";}
                       if($row['idrol']==3){echo "administrador";}     
                       if($row['idrol']==4){echo "usuario";}     
                      ?>></td>
						          <td><p><a style="color: black;" href="cambiaroles.php">Cambiar rol</a><p></td>
						          <td><p><a style="color: black;" href="eliminar.php">Eliminar rol</a><p></td>



                </tr>
              </table>

            </div>
          </div>


      <?php } ?>

    </div>
  </div>

  
</body>

</html>
