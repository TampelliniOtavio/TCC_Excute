<!DOCTYPE html>
<html>
<?php require('style.css'); require('horario.php'); require('conf_db.php'); session_start();
    function Retirar_caracter($objeto){
    $arroba = "@";
    $ponto = ".";
    $underline = "_";
    $traco = "-";
    $resultado1 = str_replace($arroba,"",$objeto);
    $resultado2 = str_replace($ponto,"",$resultado1);
    $resultado3 = str_replace($underline,"",$resultado2);
    $resultado4 = str_replace($traco,"",$resultado3);
    return $resultado4;
}
    
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
        position: relative;
        bottom: 0;
        margin-top: 5vh;
    }
    </style>

<body>
    <?php 
    echo $_SESSION["email"]; echo $_SESSION['usuario'];
    if(isset($_SESSION["logado"])){
        $conex = new PDO("mysql:host=$servidor;dbname=$basedados",$usuario,$senha);
        $conex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
             $comando = $conex->prepare(" SELECT Email FROM aluno WHERE Email=:pusername"); 
             $params = array(':pusername' => $_SESSION['logado']);
             $comando->execute($params);
        

             $comando2 = $conex->prepare(" SELECT username FROM professores WHERE username=:pusername"); 
             $params2 = array(':pusername' => $_SESSION['logado']);
             $comando2->execute($params);
        
             $comando3 = $conex->prepare(" SELECT username FROM coordenador WHERE username=:pusername"); 
             $params3 = array(':pusername' => $_SESSION['logado']);
             $comando3->execute($params);
        
        
        if ($linha = $comando->fetch(PDO::FETCH_ASSOC)) {
                if(Retirar_caracter($linha["Email"]) == Retirar_caracter($_SESSION['email'])) {
                    $usuario = 1;
                    echo $_SESSION['usuario'] = $usuario;
                }

            }
              if ($linha = $comando2->fetch(PDO::FETCH_ASSOC)) {
                if($linha["username"] == $_SESSION['logado']) {
                    $usuario = 3;
                    echo $_SESSION['usuario'] = $usuario;
                }
            }
              if ($linha = $comando3->fetch(PDO::FETCH_ASSOC)) {
                if($linha["username"] == $_SESSION['logado']) {
                    $usuario = 2;
                    echo $_SESSION['usuario'] = $usuario;
                }
            }
        
        
        
        ?>

    Olá
    <?php echo $_SESSION['logado']; ?>.<br />
    <?php
    if($usuario == 1){
        $comando4 = $conex->prepare(" SELECT cod_aluno FROM aluno WHERE username=:pusername");
        $params4 = array(':pusername' => $_SESSION['logado']);
        $comando4->execute($params);
         while($linha = $comando4->fetch(PDO::FETCH_ASSOC)){
             $fk = $linha["Fk_Inscricao"];
         }
        echo $fk;
        
        $comando7 = $conex->prepare(" SELECT * FROM iscricao inner join aluno on $fk=Cod_Inscricao"); 
        //$params4 = array(':pusername' => $_SESSION['logado']);
        $comando7->execute();
        var_dump($comando7);
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
                <?php 
                    while($linha = $comando7->fetch(PDO::FETCH_ASSOC)){
                        echo"<td>{$linha["titulo"]}</td>";
                    } 
                    while($linha = $comando4->fetch(PDO::FETCH_ASSOC)){
                        echo"<td>{$linha["Nome"]}</td>";
                        echo"<td>{$linha["Email"]}</td>";
                        echo"<td>{$linha["RG"]}</td>";
                    } while($linha = $comando7->fetch(PDO::FETCH_ASSOC)){
                        echo"<td>{}</td>";
                        echo"<td>{}</td>";
                    } while($linha = $comando4->fetch(PDO::FETCH_ASSOC)){
                        echo "<td>{$linha["Nome_Escola"]}</td>";
                    }
                
                
                ?>
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
} // aluno
    if($usuario == 2){
        $comando5 = $conex->prepare(" SELECT titulo FROM inscricao"); 
        $comando5->execute();
        
        ?>

    <form>
        <table>

                <?php
                while ($linha = $comando5->fetch(PDO::FETCH_ASSOC)) {
echo "<tr><td>{$linha['titulo']} </td></tr>";
}
                ?>
        </table>
        <input type="button" class="input" name="mudar" value="Alterar dados">
    </form>
    <form action="avaliacao.php" method="post">
        <button type="submit" class="input form">Avaliação na Banca</button>
    </form>
    <form action="feira.php" method="post">
        <button type="submit" class="input form">Avaliação na Feira</button>
    </form>

    <div id="my-div" style="margin-top:5vh;">
        <a href="tabprojeto.php">Tabela Projeto(para exportar)</a>
        <br /><a href="tabalunos.php">Tabela Aluno(para exportar)</a>
        <br /><a href="tabela.php">Todos Projetos(visualização geral)</a>
        <br /><a href="tudo.php">Todos os dados(visualização geral alunos+projetos)</a>
    </div>


    <?php
    } //coordenador
    if($usuario == 3){
        $comando6 = $conex->prepare(" SELECT * FROM professores WHERE username=:pusername"); 
        $params6 = array(':pusername' => $_SESSION['logado']);
        $comando6->execute($params);
        ?>

    <form action="avaliacao.php" method="post">
        <button type="submit" class="input form">Avaliação na Banca</button>
    </form>
    <form action="feira.php" method="post">
        <button type="submit" class="input form">Avaliação na Feira</button>
    </form>

    <?php
        
    } //professor
    ?>

    <form action="logout.php" method="post">
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