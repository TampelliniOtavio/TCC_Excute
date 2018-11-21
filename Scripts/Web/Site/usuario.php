<!DOCTYPE html>
<html>
<?php require('style.css'); require('horario.php'); require('conf_db.php'); session_start();
    
    
?>
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
        margin-top: 5vh;
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
    if(isset($_SESSION["logado"])){
        $conex = new PDO("mysql:host=$servidor;dbname=$basedados",$usuario,$senha);
        $conex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
             $comando = $conex->prepare(" SELECT * FROM users WHERE username=:pusername"); 
             $params = array(':pusername' => $_SESSION['logado']);
             $comando->execute($params);

             $comando2 = $conex->prepare(" SELECT * FROM professores WHERE username=:pusername"); 
             $params2 = array(':pusername' => $_SESSION['logado']);
             $comando2->execute($params);
        
             $comando3 = $conex->prepare(" SELECT * FROM coordenador WHERE username=:pusername"); 
             $params3 = array(':pusername' => $_SESSION['logado']);
             $comando3->execute($params);
        
        if ($linha = $comando->fetch(PDO::FETCH_ASSOC)) {
                if($linha["username"] == $_SESSION['logado']) {
                    $usuario = 1;
                }

            }
              if ($linha = $comando2->fetch(PDO::FETCH_ASSOC)) {
                if($linha["username"] == $_SESSION['logado']) {
                    $usuario = 3;
                }
            }
              if ($linha = $comando3->fetch(PDO::FETCH_ASSOC)) {
                if($linha["username"] == $_SESSION['logado']) {
                    $usuario = 2;
                }
            }
        
        
        
        ?>
    
        Olá <?php echo $_SESSION['logado'];?>.<br />
    <?php
    if($usuario == 1){
    ?>

    
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
    
    <div id="my-div">
<a href="tabprojeto.php" class="fill-div">Tabela Projeto(para exportar)</a>
<br/><a href="tabalunos.php" class="fill-div">Tabela Aluno(para exportar)</a>
<br/><a href="tabela.php" class="fill-div">Todos Projetos(visualização geral)</a>
<br/><a href="tudo.php" class="fill-div">Todos os dados(visualização geral alunos+projetos)</a>
</div>


    <?php
    }
    if($usuario == 3){
        ?>
    
    <form action="avaliacao.php" method="post" >
        <button type="submit" class="input form">Avaliação na Banca</button>
    </form>
    <form action="feira.php" method="post">
        <button type="submit" class="input form">Avaliação na Feira</button>
    </form>

    <?php
        
    }
    ?>

    <form action="logout.php" method="post" >
        <input type="submit" class="input form" name="Sair" value="Sair" href="logout.php">
    </form>
    <div class="divcontato"><iframe src="contato.php" frameborder="0" width="100%" height="100%" scrolling="no"></iframe></div>
    <?php 
    }else{
        header('Location:index.php');
    }
    ?>
</body>

</html>
