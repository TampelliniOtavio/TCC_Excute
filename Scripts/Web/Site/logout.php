<?php
session_start();
if(isset($_POST["Sair"])){
    unset($_SESSION["logado"]);
}
header('Location:index.php');
exit;
?>