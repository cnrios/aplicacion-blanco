<?php

include 'utils/db.php';

if (isset($_COOKIE['session'])) {
  $email = $_COOKIE["session"];
  $sql = "select nombre from usuarios where email = '$email'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $nombre = $row['nombre'];
    }
  }
}

$search = "";
if (isset($_GET['q'])) $search = $_GET['q'];

?>


<div class="flex flex-col sticky top-0 left-0 w-full z-20 relative">
  <div class="flex bg-blue-700 shadow-xl font-semibold justify-between px-4 py-3 relative">
    <div class="flex items-center gap-16">
      <a href="index.php" class="text-white text-4xl relative -top-[2.5px] drop-shadow-2xl">Ingreso Confederacion Suiza</a>
    </div>
    <div class="flex items-center gap-8">
      <form action="index.php" method="get" class="flex">
        <input type="text" value="<?php echo $search; ?>" placeholder="Buscar curso" name="q" id="" class="rounded-l shadow-lg text-xl px-2 py-1">
        <input type="submit" value="Buscar" class="text-white bg-rose-900 px-4 py-1 text-xl rounded-r cursor-pointer">
      </form>
      <nav>
        <?php if (isset($_COOKIE['session'])) { ?>
          <div class="flex gap-4">
            <p class="text-xl text-white cursor-pointer bg-rose-900 rounded px-2 py-1 click-display-#dropdown select-none shadow-lg"><?php echo $nombre ?></p>
          </div>

        <?php } else { ?>
          <a href="login.php" class="text-xl bg-rose-900 px-4 py-2 text-white rounded shadow-lg">Iniciar sesion</a>
          <a href="register.php" class="text-xl bg-rose-900 px-4 py-2 text-white rounded shadow-lg">Registrarse</a>
        <?php } ?>
      </nav>
    </div>
  </div>

  <?php if (isset($_COOKIE['session'])) { ?>
    <div id="dropdown" class="absolute flex flex-col justify-end items-end right-0 top-16">
      <div class="flex flex-col justify-center items-center p-4 gap-2 bg-rose-700">
        <a href="darpresentetag.php" class="text-xl text-white cursor-pointer bg-rose-900 rounded p-2 w-full">Dar presente con TAG</a>
		<a href="darpresenteform.php" class="text-xl text-white cursor-pointer bg-rose-900 rounded p-2 w-full">Dar presente por formulario</a>
        <a href="logout.php" class="text-xl text-white cursor-pointer bg-rose-900 rounded p-2 w-full">Cerrar sesion</a>
      </div>
    <?php } ?>


    </div>
</div>