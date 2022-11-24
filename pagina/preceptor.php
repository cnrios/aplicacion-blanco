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
  <title>Confederacion Suiza</title>
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
          <iframe class="h-[200px] aspect-video rounded z-50 shadow-lg" src="<?php echo $row['id']; ?>" frameborder="0" allowfullscreen></iframe>
          <div class="relative  shadow-lg bg-rose-600 rounded w-full h-[200px] p-4 gap-2 flex flex-col">

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
                    
                    <td>
                    <div class="grid grid-cols-3 gap-4">    
                    <div class="grid grid-cols-3 gap-4"> <button type="submit" name="guardar" class="registro">Guardar cambios</button> </div>
                    </div>
                        <br>
                    <a class="a" href="preceptor.php?id=<?php echo $row['id'];?>"> Eliminar </a>
                    </td>
            </tr>
            </table>
            <div class="absolute bottom-0 left-0 flex gap-2 m-3">
              <p class="rounded-full px-4 py-1 text-white bg-rose-900 shadow-lg"><?php echo $row['estado']; ?></p>
              <p class="rounded-full px-4 py-1 text-white bg-rose-900 shadow-lg"><?php echo $row['fecha']; ?></p>
            </div>
          </div>
        </div>

      <?php } ?>

    </div>
  </div>

</body>

</html>