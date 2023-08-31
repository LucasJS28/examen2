<?php 
require_once 'perso.php'; 
perso::update();
header("Location:personajes.php");