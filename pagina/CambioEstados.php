<?php
include './utils/db.php';

if (isset($_POST['Asistencia'])) {


$idusuario = $_POST['idusuario'];
$estado = $_POST['estado'];

$mAsql = "UPDATE asistencia SET estado = $estado WHERE idusuario = $idusuario";


$ResultadoAsistencia = mysqli_query($conn,$mAsql);


if($ResultadoAsistencia){
    header ("location:preceptor.php");
}
}
?>