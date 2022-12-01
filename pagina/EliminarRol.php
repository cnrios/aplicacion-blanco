<?php
include './utils/db.php';

if (isset($_POST['Eliminar'])) {


$idusuario = $_POST['idusuario'];



$msqli = "DELETE FROM rol WHERE idusuario = $idusuario";



$Resultadoeliminar = mysqli_query($conn,$msqli);


if($Resultadoeliminar){

    header ("location:admin.php");

    echo $idrol;
    echo $idusuario;
}
}
?>