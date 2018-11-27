<?php
require_once("conf_db.php");

$conex = new PDO("mysql:host=$servidor; dbname=$basedados", 
		    $usuario,
		    $senha
		);
	$conex->exec("SET NAMES 'utf8'");
	$conex->exec("SET CHARACTER SET utf8");
    $conex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$comando = $conex->prepare(" select Titulo from inscricao"); 
$comando->execute();   

$tz = 'America/Sao_Paulo';
    $timestamp = time();
    $dt = new DateTime("now", new DateTimeZone($tz)); //first argument "must" be a string
    $dt->setTimestamp($timestamp); //adjust the object to correct timestamp
    $ano = (int) $dt-> format('Y');
    $mes = (int) $dt-> format('m');

	//echo gettype($ano); -> mostraria integer, o tipo da variável ano


?>
<html>
<head>
<meta charset="utf-8" />
    <title>Etec Jorge Street</title>
</head>
<body>
    <center>
    <h2>ATA DA BANCA DE VALIDAÇÃO - TCC - <?php
        if($mes<=6){
            echo "1";
        }else{
            echo "2";
        }
        ?>º semestre <?php echo $ano; ?></h2><!--Mudar o 1 e o 2017 com PHP-->
    </center>
    <p />
    <p />
    Aos treze dias do mês de junho de dois mil e dezessete, às dezenove horas, realizou-se a Banca de Validação do Trabalho de Conclusão do Curso Técnico em Logística,
    sob a presidência do Professor Thiago Fabiano Lopes e contando com a presença dos seguintes grupos de alunos:
    <!--Mudar data, horário, curso e professor com PHP-->
    
    <p />
    <p />
    <center>
    <table>
        <tr>
            <th>
                Trabalho de Conclusão de Curso
            </th>
            <th></th>
            <th></th>
            <th></th>
            <th>
                Validado
            </th>
            <th></th>
            <th></th>
            <th></th>
            <th>
                Classificado para EXCUTE
            </th>
        </tr>
        <?php
        
        $cont=0;
            while($linha = $comando->fetch(PDO::FETCH_ASSOC)){
                
        echo "<tr>";
            
         echo   "<td>";
        echo    "{$linha['Titulo']}";
        echo    "</td>";
        echo    "<td></td>";
        echo   " <td></td>";
        echo    "<td></td>";
        echo    "<td>";
        echo        "( )";
        echo    "</td>";
        echo    "<td></td>";
        echo   " <td></td>";
        echo    "<td></td>";
        echo    "<td>";
        echo       " ( )";
        echo    "</td>";
        echo     "</tr>";
                $cont++;
            }
            
            ?>
    </table>
    </center>
    <!--PS: Podem conter mais ou menos projetos, dependendo do curso ;)-->
    <p />
    <p />
    Ocorrências:<hr align=left width=1500 size=1 color=black><p />
    <hr align=left width=1500 size=1 color=black><p />
    <hr align=left width=1500 size=1 color=black>
    <p />
    <p />
    Banca de Validação:
    <p />
    <p />
    <table border="1">
        <th>
        Nome:<hr align=left width=800 size=1 color=black><p />
        </th>
    </table>
</body>
</html>