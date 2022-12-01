<?php
include './utils/db.php';

if (isset($_POST['Cambiar'])) {


$idusuario = $_POST['idusuario'];
$idrol = $_POST['idrol'];

$msql = "UPDATE rol SET idrol = $idrol WHERE idusuario = $idusuario";


$Resultado = mysqli_query($conn,$msql);


if($Resultado){

    header ("location:admin.php");

}
}
?>