<?php  

include './utils/db.php';


?>

<!DOCTYPE html>

<html>

<head> 

<link rel="shortcut icon" href="assets/images/logo.png">

  <meta charset="UTF-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Cambiar Roles</title>

  <script src="https://cdn.tailwindcss.com"></script>

  <script src="stykit.js" defer></script>

</head>

<body class="overflow-x-hidden bg-rose-900">
  <?php include './partials/header.php'; ?>
  <div class="flex flex-row">
    <?php include './partials/aside.php'; ?>

   
    <div class="bg-rose-900 gap-4 flex flex-col w-full p-4 h-full">

	
 
    <div class="relative shadow-lg bg-rose-600 rounded w-full h-[100px] p-4 gap-2 flex flex-col">


	<form method="post">

	<h1 style="color: #00FFDC">Modificar asistencia</h1>

	<section class="form-register">

		<input class="controls" type="text" name="idusuario" placeholder="Ingrese id del usuario">

		<input class="controls" type="text" name="estado" placeholder="ingresar la asistencia">


		<button type="submit" name="Asistencia" value="Asistencia">Asistencia</button>
		

	</section>
	<?php  include ("CambioEstados.php");  ?>
	</form>
	
     
    </div>
  </div>


</div>
</div>

</html>

