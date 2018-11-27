<!DOCTYPE html>
<html>
<meta charset="utf-8">
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
    
    if(isset($_SESSION["logado"])){
        $conex = new PDO("mysql:host=$servidor;dbname=$basedados",$usuario,$senha);
        $conex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
             $comando = $conex->prepare(" SELECT Nome FROM aluno WHERE Nome=:pusername"); 
             $params = array(':pusername' => $_SESSION['logado']);
             $comando->execute($params);
        

             $comando2 = $conex->prepare(" SELECT username FROM professores WHERE username=:pusername"); 
             $params2 = array(':pusername' => $_SESSION['logado']);
             $comando2->execute($params);
        
             $comando3 = $conex->prepare(" SELECT username FROM coordenador WHERE username=:pusername"); 
             $params3 = array(':pusername' => $_SESSION['logado']);
             $comando3->execute($params);
        
        
        if ($linha = $comando->fetch(PDO::FETCH_ASSOC)) {
                if(Retirar_caracter($linha["Nome"]) == Retirar_caracter($_SESSION['logado'])) {
                    $usuario = 1;
                    $_SESSION['usuario'] = $usuario;
                }

            }
              if ($linha = $comando2->fetch(PDO::FETCH_ASSOC)) {
                if($linha["username"] == $_SESSION['logado']) {
                    $usuario = 3;
                    $_SESSION['usuario'] = $usuario;
                }
            }
              if ($linha = $comando3->fetch(PDO::FETCH_ASSOC)) {
                if($linha["username"] == $_SESSION['logado']) {
                    $usuario = 2;
                    $_SESSION['usuario'] = $usuario;
                }
            }
        
        
        
        ?>

    Olá
    <?php echo $_SESSION['logado']; ?>.<br />
    <?php
    if($usuario == 1){
        $comando4 = $conex->prepare(" SELECT * FROM aluno WHERE Nome=:pusername");
        $params4 = array(':pusername' => $_SESSION['logado']);
        $comando4->execute($params);
         while($linha = $comando4->fetch(PDO::FETCH_ASSOC)){
             $fk = $linha["Fk_Inscricao"];
         }
        
        $comando7 = $conex->prepare(" SELECT * FROM inscricao inner join aluno  on Cod_Inscricao=Fk_Inscricao where Fk_Inscricao = $fk"); 
        $params4 = array(':pusername' => $_SESSION['logado']);
        $comando7->execute($params);
    ?>


    <div style="margin-top:10vh;">
        <table>
                <?php
				$cont = 1;
					while($cont < 2 && $linha = $comando7->fetch(PDO::FETCH_ASSOC  )){
            echo "<tr>";
                
                echo "<td class='negrito'>título do projeto</td>";
                echo "<td class='negrito'>Nome</td>";
                echo "<td class='negrito'>Email</td>";
                echo "<td class='negrito'>RG</td>";
                echo "<td class='negrito'>Professor Avaliador</td>";
                echo "<td class='negrito'>Email do professor</td>";
                echo "<td class='negrito'>Nome da Escola</td>";

            echo "</tr>";
            echo "<tr>";

						
                        echo"<td>{$linha["Titulo"]}</td>";
						echo"<td>{$linha["Nome"]}</td>";
                        echo"<td>{$linha["Email"]}</td>";
                        echo"<td>{$linha["RG"]}</td>";
						echo"<td>{$linha["Prof_Resp"]}</td>";
                        echo"<td>{$linha["Email_Prof"]}</td>";
						echo "<td>{$linha["Nome_Escola"]}</td>";
                    
                
                
                
            echo "</tr>";



           echo "<tr>";
                echo "<td class='negrito'>Habilitação</td>";
                echo "<td class='negrito'>Série/Módulo</td>";
                echo "<td class='negrito'>Descrição</td>";
                echo "<td class='negrito'>Colaboradores</td>";
                echo "<td class='negrito'>Alimentação</td>";
                echo "<td class='negrito'>Local</td>";
                echo "<td class='negrito'>Necessidades</td>";
            echo "</tr>";
            echo "<tr>";
				
					
					echo "<td>{$linha["Habilitacao"]}</td>";
					echo "<td>{$linha["Modulo"]}</td>";
					echo "<td>{$linha["Descricao"]}</td>";
					echo "<td>{$linha["Patrocinadores"]}</td>";
					echo "<td>{$linha["Alimentacao"]}</td>";
					echo "<td>{$linha["Local"]}</td>";
					echo "<td>{$linha["Necessidade_Esp"]}</td>";
                        
                        $codigoProjeto = $linha["Fk_Inscricao"];
					
			$cont++;
	}
					
				?>
            </tr>

        </table>
    </div>
    <form>
        <!--input type="button" class="input form" name="alterar" value="Alterar dados"-->

    </form>
    <a href="cdi.php?cod=<?=$codigoProjeto?>" target="_blank">Autorização do uso de imagem</a>
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
        <!--input type="button" class="input" name="mudar" value="Alterar dados"-->
    </form>
    <form action="avaliacao.php" method="post">
        <button type="submit" class="input form">Avaliação na Banca</button>
    </form>
    <form action="feira.php" method="post">
        <button type="submit" class="input form">Avaliação na Feira</button>
    </form>

    <div id="my-div" style="margin-top:5vh;">
        <a href="tabprojeto.php">Tabela Projeto(para exportar)</a>
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