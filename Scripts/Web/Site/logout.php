<?php
session_start();
if(isset($_POST["Sair"])){
    unset($_SESSION["logado"]);
    unset($_SESSION['email']);
    unset($_SESSION['usuario']);
}
header('Location:index.php');
exit;
?>