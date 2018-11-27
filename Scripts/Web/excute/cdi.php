<?php
include("datetime.php");
?>

<html>
    <head>
        <meta charset="utf-8">
		<?php
	require_once("conf_db.php");
    $cod=$_GET['cod'];

	$conex = new PDO("mysql:host=$servidor; dbname=$basedados", 
		    $usuario,
		    $senha
		);
	$conex->exec("SET NAMES 'utf8'");
	$conex->exec("SET CHARACTER SET utf8");
	$conex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$comando = $conex->prepare(" select * from inscricao inner join aluno on Cod_Inscricao=Fk_Inscricao where Fk_Inscricao=:pcod "); 
	$comando2 = $conex->prepare(" select * from inscricao inner join aluno on Cod_Inscricao=Fk_Inscricao where Fk_Inscricao=:pcod "); 
    $params = array(":pcod" => $cod);
	$comando->execute($params);   
	$comando2->execute($params);   
        
    $tz = 'America/Sao_Paulo';
    $timestamp = time();
    $dt = new MyDateTime("now", new DateTimeZone($tz)); //first argument "must" be a string
    $dt->setTimestamp($timestamp); //adjust the object to correct timestamp
    $ano = (int) $dt-> format('Y');
    $mes = (int) $dt-> format('m');

	//echo gettype($ano); -> mostraria integer, o tipo da variável ano


		?>
        <style>
            .tg  {border-collapse:collapse;border-spacing:0;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
.tg .tg-yw4l{vertical-align:top}
            .pula{
                color:white
            }
            body{
                
               
                
            }
            .lado{
                margin-left: %;
            }
            .meio
            {
                height: 140%;
               width: 50%;
                
                 margin-left: 25%;
                margin-right: 20%;
                
            }
            .espacao
        {
                
                
                height: 8.7%;
                width: 100%; 
                text-align: justify;
                font-size: 100%;    
                font-size: 19;
                font-family:arial;
        }
           
            .espacao1
        {
                
            
            
             
                height: 2.5%;
                 width: 100%; 
                text-align: center;
                font-size: 100%; 
                font-size: 19;
                font-family:arial;
        }
            .espacao2
        {
           
                
                height: 8%;
                width: 100%; 
                text-align: center;
                font-size: 100%; 
            font-size: 19;
                font-family:arial;
        }
             .espacao3
        {
                
                padding-top: 10%;
                height: 8.7%;
                width: 100%; 
                text-align: justify;
                font-size: 100%;    
                font-size: 19;
                font-family:arial;
        }
             .espacao4
        {
                
                
                height: 8.7%;
                width: 100%; 
                text-align: right;
                font-size: 100%;    
                font-size: 19;
                font-family:arial;
        }
        </style>
    </head>
    <body>
  <div class="meio"> <div class="espacao2" >ETEC JORGE STREET</div>

        <div class="espacao1" >TERMOS DE AUTORIZAÇÃO DA DIVULGAÇÃO DO  </div>                        <div class="espacao1" >TRABALHO DE CONCLUSÃO DE CURSO -  TCC    </div>                                          <div class="espacao2" >E AUTORIZAÇÃO DO USO DE IMAGEM, SOM DE VOZ</div>  

      <div class="espacao" >Nós, alunos abaixo assinados, regularmente matriculados na ETEC Jorge Street, município de São Caetano do Sul, autorizamos o Centro Paula Souza reproduzir integral ou parcialmente o Trabalho de conclusão de Curso e/ou disponibilizá-lo em ambientes virtuais. </div>  <div>.
      </div>                                                      
  <div class="espacao" >Como também autorizamos o uso da nossa imagem, som da nossa voz, nome e dados biográficos por nós revelados em depoimento pessoal concedido e, além de todo e qualquer material entre foto e documentos por nós apresentados na Banca e na Exposição Cultural e Tecnológica(EXCUTE). A presente autorização abrange os usos acima indicados tento em mídia impressa como também em mídia eletrônica.</div>
  <?php
      $cont=0;
      while ($cont <1 ) {
          $linha = $comando->fetch(PDO::FETCH_ASSOC);
       echo "<div class='espacao3'>Habilitação Técnica em {$linha['Habilitacao']}<div></div>";
	   echo "Projeto:{$linha['Titulo']} </div>";
          $cont++;
      
        ?>
        <div class="espacao4">São Caetano do Sul, ___ de ____________ de <?php echo $ano; ?> .</div>
      <div class="lado">
<?php
  echo "<table class='tg' style='undefined;table-layout: fixed; width: 100%'>";
          echo "<colgroup>";
	echo "<col style='width: 45%'>";
	echo "<col style='width: 27%'>";
	echo "<col style='width: 25%'>";
	echo "</colgroup>";
  echo "<tr>";
  echo "<th class='tg-yw4l'>Nome</th>";
    echo "<th class='tg-yw4l'>RG</th>";
    echo "<th class='tg-yw4l'>Assinatura</th>";
  echo "</tr>";
      
  
do{
    echo "<tr>";
    echo "<th class='tg-yw4l'>{$linha['Nome']}</th>";
    echo"<th class='tg-yw4l'>{$linha['RG']}</th>";
    echo "<th class='tg-yw4l'></th>";
  echo "</tr>";
}while($linha = $comando->fetch(PDO::FETCH_ASSOC));
      
 echo "</table>";
?>
</div>
       <div class="pula">.</div>
       <div class="pula">.</div>
     <div class="pula">.</div>
      Professor Responsável: <?php


   
    echo $linha['Prof_Resp'];
      }
 ?>
       <div class="pula">.</div>
       <div class="pula">.</div>
    <div class="pula">.</div>
      Assinatura:___________________________________________________&nbsp &nbsp &nbsp &nbsp / &nbsp &nbsp &nbsp &nbsp   / &nbsp <?=$ano ?>
        </div>
    </body>
</html>