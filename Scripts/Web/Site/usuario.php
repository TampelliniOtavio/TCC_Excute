<!DOCTYPE html>
<html>
<?php require('style.css'); require('horario.php'); session_start(); ?>
<head>

</head>
<script>
    function mudarEstado(lbl){
        var disp = document.getElementById(lbl).style.display;
        if(disp == "none"){
            document.getElementById(lbl).style.display = 'block';
        }
        else{
            document.getElementById(lbl).style.display = 'none';
        }
    }
    </script>
<body>
    <?php 
    $usuario = 3;
    if($usuario == 1){
    ?>
    
    Olá projeto .<br/>
    <form>
    <input type="button" name="alterar" value="Alterar dados" onclick="mudarEstado('enviar')">
        <div id="enviar"><input type="submit"  name="eenviar" value="Enviar" onclick="mudarEstado('enviar')"></div>
    </form>

    <?php
}
    if($usuario == 2){
        ?>
    Olá Administrador.<br/>
    <form>
    projetos.
        <input type="button" name="mudar" value="Alterar dados">
    </form>
    <form action="avaliacao.php" method="post">
    <button type="submit">Avaliação na Banca</button>
    </form>
    <form action="feira.php" method="post">
    <button type="submit">Avaliação na Feira</button>
    </form>
    
    
    <?php
    }
    if($usuario = 3){
        ?>
    Olá professor avaliador.<br/>
    <form action="avaliacao.php" method="post">
    <button type="submit">Avaliação na Banca</button>
    </form>
    <form action="feira.php" method="post">
    <button type="submit">Avaliação na Feira</button>
    </form>
    
    <?php
        
    }
    ?>
    
        <form action="logout.php">
        <input type="submit" value ="Sair" href="logout.php">
    </form>
</body>

</html>