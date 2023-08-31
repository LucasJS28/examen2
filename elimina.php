<?php 
require_once 'perso.php'; 
perso::eliminar();
header("Location:personajes.php");
?>