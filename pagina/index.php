<?php
include './utils/db.php';

$sql = "SELECT * FROM cursos";

if (isset($_GET['q'])) {
  $search = $_GET['q'];
  $sql = "SELECT * FROM cursos WHERE titulo LIKE '%$search%'";
}

$resultCursos = $conn->query($sql);

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

<body class="overflow-x-hidden bg-rose-900">
  <?php include './partials/header.php'; ?>
  <div class="flex flex-row">
    <?php include './partials/aside.php'; ?>

    <div class="bg-rose-900 gap-4 flex flex-col w-full p-4 h-full">

      <?php while ($row = $resultCursos->fetch_assoc()) { ?>
        <div class="p-4 z-10 shadow-2xl bg-rose-700 border gap-4 border-neutral-300 rounded flex jusitfy-center items-center">
          <iframe class="h-[200px] aspect-video rounded z-50 shadow-lg" src="<?php echo $row['link']; ?>" frameborder="0" allowfullscreen></iframe>
          <div class="relative  shadow-lg bg-rose-600 rounded w-full h-[200px] p-4 gap-2 flex flex-col">
            <a href="<?php echo $row['link']; ?>" target="_blank" class="cursor-pointer text-4xl text-white"><?php echo $row['titulo']; ?></a>
            <p class="text-2lx text-white h-12 overflow-hidden"><?php echo $row['descrip']; ?></p>
            <div class="absolute bottom-0 left-0 flex gap-2 m-3">
              <p class="rounded-full px-4 py-1 text-white bg-rose-900 shadow-lg"><?php echo $row['lenguaje']; ?></p>
              <p class="rounded-full px-4 py-1 text-white bg-rose-900 shadow-lg"><?php echo $row['dificultad']; ?></p>
            </div>
          </div>
        </div>
      <?php } ?>

    </div>
  </div>

</body>

</html>