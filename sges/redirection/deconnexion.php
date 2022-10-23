<?php 
session_start();
$_SESSION['succes']='false';
session_destroy();
header('Location: ../index.php');
?>