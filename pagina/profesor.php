<?php
include './utils/db.php';

$sql = "SELECT * FROM asistencia";

if (isset($_POST['estado'])) $estado = $_POST['estado'];



if ($conn->query($sql) === TRUE) {


    if ($result->num_rows > 0) {
                
          $sql = "insert into asistencia (estado) values ('$estado'')";
          
$sql = "select * from asistencia where estado = '$estado'";
$result = $conn->query($sql);
  while ($row = $result->fetch_assoc()) {
    $estado = $row['estado'];
  }

}
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Asistencias de los profesores</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="stykit.js" defer></script>
</head>

<body class="overflow-x-hidden bg-rose-900">
  <?php include './partials/header.php'; ?>
  <div class="flex flex-row">
    <?php include './partials/aside.php'; ?>

    <div class="bg-rose-900 gap-4 flex flex-col w-full p-4 h-full">

   
    </div>
  </div>

</body>

</html>