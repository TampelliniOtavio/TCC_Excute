<!DOCTYPE html>
<html>
<?php require('style.css'); require('horario.php'); session_start(); ?>

<head>

</head>
<style>
    body{
                text-align: justify;
        font-family: 'CaviarDreams';
        font-size: 30px;
        background-color:aliceblue;
    }
    table{
        font-size: 15px;
        width: 100%;
        background-color: white;
    }
    .form{
        margin-top: 7vh;
    }
    .input{
    font-size: 30px;
    }
    .negrito{
        font-weight: bold;
    }
    div{/*
        border-style: solid;
        border-color: green;*/
    }
    tr:nth-child(even) {
    background-color: #d8d8d8;
}
    .divcontato {
        float: left;
        width: 99%;
        height: 20vh;
        position: absolute;
        bottom: 0;
    }
    </style>
<body>
    <?php 
    $usuario = 3;
    if($usuario == 1){
    ?>

    Olá Excute.<br />
    <div style="margin-top:10vh;">
    <table>
        
        <tr>
            <td class="negrito">título do projeto</td>
            <td class="negrito">Nome</td>
            <td class="negrito">Email</td>
            <td class="negrito">RG</td>
            <td class="negrito">Professor Avaliador</td>
            <td class="negrito">Email do professor</td>
            <td class="negrito">Nome da Escola</td>

        </tr>
        <tr>
            <td>Excute</td>
            <td>João da Silva</td>
            <td>joao.silva@email.com</td>
            <td>911225341</td>
            <td>Ângela Piazentin</td>
            <td>angelapiazentin@gmail.com</td>
            <td>ETEC Jorge Street</td>
        </tr>

    
        
        <tr>
            <td class="negrito">Habilitação</td>
            <td class="negrito">Série/Módulo</td>
            <td class="negrito">Descrição</td>
            <td class="negrito">Colaboradores</td>
            <td class="negrito">Alimentação</td>
            <td class="negrito">Local</td>
            <td class="negrito">Necessidades</td>
        </tr>
        <tr>

            <td>Informática Integrado</td>
            <td>3</td>
            <td>Informatizar o processo da Excute</td>
            <td>Nenhum</td>
            <td>127V</td>
            <td>Quadra</td>
            <td>Nenhum</td>
        </tr>
            
    </table>
        </div>
    <form>
        <input type="button" class="input form" name="alterar" value="Alterar dados">

    </form>

    <?php
}
    if($usuario == 2){
        ?>
    Olá Administrador.<br />
    <form>
        <table>
        <tr>
            <td>Projeto 1</td>
            <td>Projeto 2</td>
            <td>Projeto 3</td>
        </tr>
        <tr>
            <td>Projeto 4</td>
            <td>Projeto 5</td>
            <td>projeto 6</td>
        </tr>
            </table>
        <input type="button" class="input" name="mudar" value="Alterar dados">
    </form>
    <form action="avaliacao.php" method="post">
        <button type="submit" class="input form">Avaliação na Banca</button>
    </form>
    <form action="feira.php" method="post">
        <button type="submit" class="input form">Avaliação na Feira</button>
    </form>


    <?php
    }
    if($usuario == 3){
        ?>
    Olá Ângela Piazentin.<br />
    <form action="avaliacao.php" method="post" >
        <button type="submit" class="input form">Avaliação na Banca</button>
    </form>
    <form action="feira.php" method="post">
        <button type="submit" class="input form">Avaliação na Feira</button>
    </form>

    <?php
        
    }
    ?>

    <form action="logout.php">
        <input type="submit" class="input form" value="Sair" href="logout.php">
    </form>
    <div class="divcontato"><iframe src="contato.php" frameborder="0" width="100%" height="100%" scrolling="no"></iframe></div>
</body>

</html>
