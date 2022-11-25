<?php
include './utils/db.php';
$id = $_COOKIE["session"];

$sql = "SELECT * FROM asistencia JOIN usuario WHERE asistencia.idusuario = usuario.id AND usuario.id = '$id' ";

if (isset($_GET['q'])) {
  $search = $_GET['q'];
  $sql = "SELECT * FROM asistencia JOIN usuario WHERE asistencia.idusuario = usuario.id AND usuario.apellido = '$q' AND usuario.id = '$id'";
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
  <title>Asistencia del Alumno</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="stykit.js" defer></script>
</head>

<body class="overflow-x-hidden bg-rose-900">
  <?php include './partials/header.php'; ?>
  <div class="flex flex-row">
    <?php include './partials/aside.php'; ?>

    <div class="bg-rose-900 gap-4 flex flex-col w-full p-4 h-full">

      <?php while ($row = $resultAsistencias->fetch_assoc()) { ?>
        <div class="p-1 pl-3 z-10 shadow-2xl bg-rose-700 border gap-4 border-neutral-300 rounded flex jusitfy-center items-center">
        <img class="border-4 border-black w-[100px] rounded-full" src="<?php echo  $userimg; ?>" alt="Usuario">
        <div class="relative shadow-lg bg-rose-600 rounded w-full h-[100px] p-4 gap-2 flex flex-col">

          <table>
        <tr>    
            <th><div class="w-60 px-1 bg-black "><p class="py-1 text-white text-center">Nombre</p></div></th>
            <th><div class="w-60 px-1 bg-black "><p class="py-1 text-white text-center">Apellido</p></div></th>
            <th><div class="w-60 px-1 bg-black "><p class="py-1 text-white text-center">Fecha</p></div></th>
            <th><div class="w-60 px-1 bg-black "><p class="py-1 text-white text-center">Estado</p></div></th>
        </tr>
        <tr>                  
              <td><div class="w-60 px-1 py-1 bg-black "><p class="py-1 bg-white text-center"> <?php echo $row['nombre'];?> </p></div></td>
              <td><div class="w-60 px-1 py-1 bg-black "><p class="py-1 bg-white text-center"><?php echo $row['apellido'];?> </p></td>
              <td><div class="w-60 px-1 py-1 bg-black "><p class="py-1 bg-white text-center"><?php echo $row['fecha'];?> </p></td>
              <td><div class="w-60 px-1 py-1 bg-black "><p class="py-1 bg-white text-center"><?php echo $row['estado'];?> </p></td>
        </tr>
      </table>
      
          </div>
        </div>

      <?php } ?>

    </div>
  </div>

</body>

</html>