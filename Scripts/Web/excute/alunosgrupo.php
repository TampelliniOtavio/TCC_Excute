<?php
require_once("conf_db.php");

$codgrupo = 0;
if(isset($_GET["codgrupo"])){
  $codgrupo = $_GET["codgrupo"];
}
else{
  echo "faltou variável \$_GET utilize a URL:<br/> /alunosgrupo.php?codgrupo=1 <br/><br/>";
}

$conex = new PDO("mysql:host=$servidor;dbname=$basedados", $usuario, $senha);
$conex->exec("SET NAMES 'utf8'");
$conex->exec("SET CHARACTER SET utf8");
$conex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$consulta = " SELECT 
                Cod_Inscricao,	Titulo,	Prof_Resp,	Email_Prof,	Descricao,	Patrocinadores,	Alimentacao,	Local,	Necessidade_Esp,	Cod_Aluno,	Nome,	Email,	RG,	Modulo,	Habilitacao,	Nome_Escola,	Fk_Inscricao 
              FROM inscricao 
              INNER JOIN aluno ON Fk_Inscricao = cod_inscricao 
              WHERE Cod_Inscricao = :pcodgrupo ";
$comando = $conex->prepare($consulta); 
$params = array(":pcodgrupo" => $codgrupo);
$comando->execute($params); ?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="menu2.css" />
<meta charset="utf-8">
<table class="tabela">
  <tr>
    <td>
      Cod_Inscricao
    </td>
    <td>
      Titulo
    </td>
    <td>
      Cod_Aluno
    </td>
    <td>
      Nome
    </td>
  </tr>
<?php
//Escreve várias linhas em loop com os campos do select
while ($linha = $comando->fetch(PDO::FETCH_ASSOC)) {
  echo "<tr>";
  echo "  <td>";
  echo "    {$linha['Cod_Inscricao']} ";
  echo "  </td>";
  echo "  <td>";
  echo "    {$linha['Titulo']} ";
  echo "  </td>";
  echo "  <td>";
  echo "    {$linha['Cod_Aluno']} ";
  echo "  </td>";
  echo "  <td>";
  echo "    {$linha['Nome']} ";
  echo "  </td>";
  echo "</tr>";
}
?>
</table>
</body>
</html>