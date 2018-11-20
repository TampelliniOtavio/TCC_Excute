<?php
//print_r($_POST);

	/*
    $servidor = "localhost:3307";
    $usuario = "root";
    $senha = "usbw";
    $basedados = "excute";
    */
    
    require("style.css");
    $servidor = "robb0360.publiccloud.com.br:3306";
    $usuario = "rcaru_excute";
    $senha = "@2Info#Vai";
    $basedados = "rcaruso_excute";
    
	/*
    $servidor = "mysql01-farm13.kinghost.net";
    $usuario = "educatronica";
    $senha = "sala72";
    $basedados = "educatronica";
    */
    $conex = new PDO("mysql:host=$servidor; dbname=$basedados", 
		    $usuario,
		    $senha
		);
	$conex->exec("SET NAMES 'utf8'");
	$conex->exec("SET CHARACTER SET utf8");
    $conex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    if($conex==false)
    {
        echo"Nao foi possivel conectar ao !!!MYSQL!!!";
        mysql_error();
        exit;
    }

    else
    {
        //$banco = mysql_select_DB($basedados);
      
        if($basedados==false)
        {
          echo "Não foi possivel conectar ao banco de dados";
          mysql_error();
          exit;
                }   

        $txtTP = "";
        $txtNE="";
        $txtNPO="";
        $txtEPO="";
        $hab="";
        $sm="";
        $txtDP="";
        $txtEI="";
        $ali="";
        $ap="";
        $nec="";
        $txtoutra="";
        $txtoutro="";

        if( isset($_POST["txtTP"]) )
        {
            $txtTP = $_POST["txtTP"];
            $txtNE=$_POST["txtNE"];
            if($txtNE=="Outra")$txtNE=$_POST["txtOutraEscola"];
            $txtNPO=$_POST["txtNPO"];
            $txtEPO=$_POST["txtEPO"];
            $hab=$_POST["hab"];
            $sm=$_POST["sm"];
            $txtDP=$_POST["txtDP"];
            $txtEI=$_POST["txtEI"];

            if(isset($_POST["ali"]))
            {
                $ali=$_POST["ali"];
            }

            if(isset($_POST["ap"]))
                {
                    $ap=$_POST["ap"];
                }

            if(isset($_POST["nec"]))
            {
                $nec=$_POST["nec"];
            }
/*
            if(isset($_POST["txtoutra"]) && $_POST["txtoutra"]!= "")
            {
                $ali=$_POST["txtoutra"];
            }

            if(isset($_POST["txtoutro"]) && $_POST["txtoutro"]!= "")
            {
                $ali=$_POST["txtoutro"];
            } */
            
            
            $comando = $conex->prepare("INSERT INTO inscricao(Titulo, Prof_Resp, Email_Prof, Descricao, Patrocinadores, Alimentacao, Local, Necessidade_Esp) 
              VALUES(:pTitulo, :pProf_Resp, :pEmail_Prof, :pDescricao, :pPatrocinadores, :pAlimentacao, :pLocal, :pNecessidade_Esp) ");
            if($ali!="") $ali = implode("/" , $ali);
            $params = array(
              ":pTitulo" => $txtTP,
              ":pProf_Resp" => $txtNPO,
              ":pEmail_Prof" => $txtEPO,
              ":pDescricao" => $txtDP,
              ":pPatrocinadores" => $txtEI,
              ":pAlimentacao" => $ali,
              ":pLocal" => $ap,
              ":pNecessidade_Esp" => $nec
            );
            $comando->execute($params);
            
            //O codigo abaixo tenta recuperar o código do projeto que acabou de inserir
            $codigoProjeto = 0;
            $comando2 = $conex->prepare("SELECT LAST_INSERT_ID() AS ULTIMOID;"); /*Faz select no último código de auto-increment*/
            $comando2->execute($params);
            if($linha = $comando2->fetch(PDO::FETCH_ASSOC))
            {
                  $codigoProjeto = $linha['ULTIMOID'];
            }

            
            $contalunos = 1;
            while(isset($_POST["nome_" . $contalunos ]))
            {
              $nome_x = $_POST["nome_" . $contalunos];
              $email_x = $_POST["email_" . $contalunos];
              $rg_x = $_POST["rg_" . $contalunos];
              $comando = $conex->prepare("INSERT INTO aluno(Nome, Email, RG, Modulo, Habilitacao, Nome_Escola,Fk_Inscricao) 
              VALUES(:pnome_x, :pemail_x, :prg_x, :psm, :phab, :pne, :pinsc) ");
              $params = array(
              ":pnome_x" => $nome_x,
              ":pemail_x" => $email_x,
              ":prg_x" => $rg_x,
              ":psm" => $sm,
              ":phab" => $hab,
              ":pne" => $txtNE,
              ":pinsc" => $codigoProjeto
              );

              $comando->execute($params);
              
              $contalunos++;
            }
            /**/
            
            ?>
            <script>
                alert("Registro gravado com sucesso");
                location.href=  "inscrito.php?inscricao=<?=$codigoProjeto?>";
            </script>
            <?php
            
        }
    }
?>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="menu1.css" />
<style>
  .clsoption{
    padding-left: 30px;
    line-height: 22px;
  }
  body
            { 
            
            margin:0px;
            background-color:background-color: background: #000; /* For browsers that do not support gradients */
  background: -webkit-radial-gradient(#010610,#232C3E,#364868); /* Safari 5.1 to 6.0 */
  background: -o-radial-gradient(#010610,#232C3E,#364868); /* For Opera 11.6 to 12.0 */
  background: -moz-radial-gradient(#010610,#232C3E,#364868); /* For Firefox 3.6 to 15 */
  background: radial-gradient(#010610,#232C3E,#364868); /* Standard syntax */;

  }
            .caixa
            {
    background-color: #000;
               padding-left:23% ;
                
                margin: auto auto auto auto;
    width:auto;
    
    height:7.5%;
                box-shadow: 0px 0px 1em #333;
-webkit-box-shadow: 0px 0px 1em #333;
-moz-box-shadow: 0px 0px 1em #333;
            -webkit-transition: opacity 2s ease-in;
            font-family:Arial;

}
            .menucontato
            {
              
     width:100%;
     height:auto;
                color:white;
                background-color: black;
                margin-top: 1px;
                padding-bottom:1%;
                   
          font-family:Arial;
                box-shadow: 0px 0px 1em #333;
-webkit-box-shadow: 0px 0px 1em #333;
-moz-box-shadow: 0px 0px 1em #333;
            -webkit-transition: opacity 2s ease-in;
                 margin-left: -0.5%;
                margin-right: -0.5%;
                
            }
           
            .oi
            {
                color:black;
            }
            .contato
            {
            font-family:arial;
                margin-left:10%;
                width: auto;
               
                
            }
            .espacao
            {
               margin: 0px auto; 
                
                height: auto;
                
                
                width: auto;
                	min-width: 600px;
                	max-width: 800px;
               
               font-family:Arial;
               border:1px solid black;
              
              background:#FFFFFF;
               
               
            box-shadow: 0px 0px 1em #333;
-webkit-box-shadow: 0px 0px 1em #333;
-moz-box-shadow: 0px 0px 1em #333;
            -webkit-transition: opacity 2s ease-in;
          
            }
            .image
            {
               
                width: auto;
                height: auto;
                margin-left: 69%
                    
            }
            .image2
            {
               margin-top: -5%;
                width: auto;
                height: auto;
                    margin-right: 4%;
                margin-left: 68.25%;     
            }
             .align
            {
                text-align: center;
            }
            .titulo{
                width: 50%;
                height:5%;
                border: 1px solid red;
          margin-left: 24.5%;
                padding-top: 1%;
                color:white;
                text-align: center;
                font-size: 35;
            }
            table 
            { 
			
				color:black;
                
                
             	/*margin-left: 12.5%;*/
             	margin: 0px auto;
                width: 100%;
                line-height: 200%;

            }
            td , th
            {
              align:left;
             font-size: 20;
   
         line-height: 250%;
                 
            }
                        td1 , th1
            {
              align:left;
             font-size: 20;
   
         line-height: 100%;
                 
            }
            .borda
            {
                border: 1px solid orange;
            } 
			.alinha
			{
				text-align:center;
			}
			.alinha1
			{
				margin: 10px auto 10px auto;
			}
			.ins
            {
            padding-top:1%;
                padding-left: 34.9%;
                font-size: 65;
                font-family:arial;
                }
                .branco{
                	
                color :white;
                font-size: 35;
                }
    .site{
        color:white;
        text-decoration: none;
    }
            div{
				/*border: dashed 2px red;*/
			}
			input[type=text]{
				width:100%;
			}
</style>
<script type="text/javascript">
  var cont_alunos=1;
  
	function addlinha(){
    cont_alunos++;
    var table = document.getElementById("tblAlunos");
    //var parte = "<tr id='aluno_"+cont_alunos+"'><td><input type='text' name='nome_"+cont_alunos+"'value=''/></td><td><input type='text' name='email_"+cont_alunos+"' value=''/></td><td><input type='text' name='rg_"+cont_alunos+"' value=''></td><td><input type='button' onclick='remove("+cont_alunos+")' value='-'></td></tr>";
    var parte = "<td><input type='text' name='nome_"+cont_alunos+"'value=''/></td><td><input type='text' name='email_"+cont_alunos+"' value=''/></td><td><input type='text' name='rg_"+cont_alunos+"' value=''></td><td></td>";
    //.innerHTML += parte;
    var row  = table.insertRow(-1);
    row.id = "aluno_" + cont_alunos;
    row.innerHTML = parte;
	}
	
	function remove(){
    var id = "aluno_" + cont_alunos;
    var elem = document.getElementById(id);
    if(elem != null){
      elem.parentNode.removeChild(elem);
    }
    cont_alunos--;
	}
	
	function exibeLocalOutro(){
    var checado = document.getElementById("localOutro").checked;
		document.getElementById("txtoutr").style.visibility = (checado) ? '' : 'hidden';
	}
	function exibeNeceOutro(checado){
		document.getElementById("txtoutra").style.visibility = (checado) ? '' : 'hidden';
	}
	
	function nenhumaAlim(noneChecked){
    var a127 = document.getElementById("ali127");
    var a220 = document.getElementById("ali220");
    var aTri = document.getElementById("aliTri");
    if(noneChecked){
      a127.disabled = 'disabled';
      a220.disabled = 'disabled';
      aTri.disabled = 'disabled';
      a127.checked = 0;
      a220.checked = 0;
      aTri.checked = 0;
    }
    else{
      a127.disabled = '';
      a220.disabled = '';
      aTri.disabled = '';
      a127.checked = 0;
      a220.checked = 0;
      aTri.checked = 0;
    }
	}
	
	function consisteEnvio(){
    
    //Verifica se os dados necessários estão preenchidos antes de enviar
    
    if(document.getElementsByName("txtTP")[0].value == ""){
      alert("Favor preencher o título do projeto");
      return;
    }
    
    var contAlunos = 1;
    while(document.getElementsByName("nome_" + contAlunos).length){
      if( document.getElementsByName("nome_" + contAlunos)[0].value == ""){
        alert("Favor preencher todas os nomes dos alunos");
        return;
      }
      if( document.getElementsByName("email_" + contAlunos)[0].value == ""){
        alert("Favor preencher todas os e-mails dos alunos");
        return;
      }
      if( document.getElementsByName("rg_" + contAlunos)[0].value == ""){
        alert("Favor preencher todos os RGs dos alunos");
        return;
      }
      contAlunos++;
    }
    
    //Envia o formulário
    document.forms[0].submit();
    //alert("Enviado com sucesso!")
  }
  
  function outraescola(opcao){
    if(opcao == 3){
      document.getElementById("txtOutraEscola").style.display = "block";
    }
    else{
      document.getElementById("txtOutraEscola").style.display = "none";
    }
  }
</script>
<div class="caixa">

<div class="espaço">

        <nav id="menu">
<ul>  
  <li><a class="site" href="http://www.jorgestreet.com.br/">Site da ETEC Jorge Street</a></li>
</ul></nav> <br/> </div> </div>
</head>
<body>
<iframe src="login.php" class="iframeLogin"></iframe>
<div class="espacao">
<div class="ins">EXCUTE</div>
<div class="branco">.</div>
<div class="ins">Inscrição:</div>
 <form method="POST" action="<?=basename(__FILE__)?>"  autocomplete="off">
    <div class="alinha1" style="width: 90%;"> 
    <table  border=0 >
      <tr>
        <td width="200px">Título do Projeto</td><td><input type="text" name="txtTP" value="<?=$txtTP?>"/></td>
      </tr>
      <tr>
        <td colspan="2" align="left"> 
          Dados dos Alunos <br/>
          <table border=0 id="tblAlunos" align="left" style="float:left; background-color: #e9e9e9" width="100%">
            <tr>
              <td class="subitem">Nome</td><td class="subitem">E-mail de um Responsável</td><td class="subitem">RG</td><td><input type="button" onclick="addlinha()" value="+"><input type='button' onclick='remove();' value='-'></td>
            </tr>
            <tr> 
              <td><input type="text" name="nome_1" value=""/></td><td><input type="text" name="email_1" value=""/></td><td><input type="text" name="rg_1" value=""/></td>
              <td></td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
    <table >
      <tr><td width="50%" >Nome do Professor Orientador:</td><td><input type="text" name="txtNPO" value="<?=$txtNPO?>"/></td></tr>
      <tr><td >E-mail do Professor Orientador:</td><td><input type="text" name="txtEPO" value="<?=$txtEPO?>"/></td></tr>
      <tr><td >Nome da Escola:</td>
          <td>
              <select name="txtNE" onchange="outraescola(this.selectedIndex)">
                <option>Etec Jorge Street</option>
                <option>Extensão - Torloni</option>
                <option>Extensão - CEU Parque Bristol</option>
                <option value="Outra">Outra</option>
              </select>
              <br>
              <input type="text" name="txtOutraEscola" id="txtOutraEscola" value="<?=$txtNE?>" style="display:none"/>
          </td>
      </tr>
      <tr>
        <td >Habilitação:</td><td>
          <select name="hab" value="<?=$hab?>">
          <option value="">Escolher</option>
          <option value="admNT">Administração Noite - Torloni</option>
          <option value="admNP">Administração Noite - Parque Bristol</option>
          <option value="admI">Administração Integrado</option>
          <option value="autoIN">Automação Industrial Noite</option>
          <option value="autoI">Automação Industrial Integrado</option>
          <option value="eletroN">Eletronica Noite</option>
          <option value="eletroI">Eletronica Integrado</option>
          <option value="eletrotecN">Eletrotécncia Noite</option>
          <option value="infoT">Informática Tarde</option>
          <option value="infoI">Informática Integrado</option>
          <option value="mecaN">Mecânica Noite</option>
          <option value="mecaI">Mecânica Integrado</option>
          <option value="logN">Logísta Noite</option>
          <option value="mecatroT">Mecatrônica Tarde</option>
          <option value="mecatroN">Mecatrônica Noite</option>
          <option value="mecatroI">Mecatrônica Integrado</option>
          <option value="manu">Manutenção Automotiva</option>
          <option value="serJurN">Serviços Jurídicos Noite</option>
          <option value="outra">Outra Escola</option>
          </select>
        </td>
      </tr>
      <tr>
        <td >Série/Módulo:</td><td>
          <select name="sm" value="<?=$sm?>">
          <option value="">Escolher</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">Outra Escola</option>
          </select>
        </td>
      </tr>
      <tr><td >Descrição do Projeto:</td><td><input type="text" name="txtDP" value="<?=$txtDP?>"/></td></tr>
      <tr><td >Patrocinadores/colaboradores:</td><td><input type="text" name="txtEI" value="<?=$txtEI?>"/></td></tr>
      <tr><td  colspan="2">Alimentação do Projeto:</td>

      <tr><td class="clsoption"><input type="checkbox" id="ali127" name="ali[]" value="127">127</td></tr>
      <tr><td class="clsoption"><input type="checkbox" id="ali220" name="ali[]" value="220">220</td></tr>
      <tr><td class="clsoption"><input type="checkbox" id="aliTri" name="ali[]" value="tri">Trifásico</td></tr>
      <tr><td class="clsoption"><input type="checkbox" id="aliNone" name="ali[]" value="none" onclick="nenhumaAlim(this.checked);">Nenhuma</td></tr>
      </tr>

      <tr><td colspan="2">Local de apresentação do projeto:</td>

      <tr><td class="clsoption"><input type="radio" name="ap" value="quadra" onchange="exibeLocalOutro()">Quadra</td></tr>
      <tr><td class="clsoption"><input type="radio" name="ap" value="patio" onchange="exibeLocalOutro()">Pátio</td></tr>
      <tr><td class="clsoption"><input type="radio" name="ap" id="localOutro" value="outro" onchange="exibeLocalOutro()">Outro</td><td><input type="text" id="txtoutr" name="txtoutr" value="<?=$txtoutro?>" style="visibility:hidden"></td></tr>
      </tr>
      <tr><td  colspan="2">Necessidades Especiais:</td>

      <tr><td class="clsoption"><input type="checkbox" name="nec" value="Ponto de ar comprimido">Ponto de ar comprimido</td></tr>
      <tr><td class="clsoption"><input type="checkbox" name="nec" value="Ponto de água corrente">Ponto de água corrente</td></tr>
      <!--tr><td class="clsoption"><input type="checkbox" name="nec" value="Nenhuma">Nenhuma</td></tr-->
      <tr><td class="clsoption"><input type="checkbox" name="nec" value="Outra" onchange="exibeNeceOutro(this.checked)">Outro</td><td><input type="text" id="txtoutra" name="txtoutra" value="<?=$txtoutra?>" style="visibility:hidden"></td></tr>
      </tr>
    </table>
    
	</div>
	
    <br/><br/><div class="alinha"><input type="button" value="Enviar Projeto" onclick="consisteEnvio();" /></div><br/> 
    </form> </div>


   
	 <div class="menucontato"><divc class="oi">.</divc><div class="contato">Contato <div></div><div>.....................................................................</div><div><divc class="oi">.</divc></div>ETEC Jorge Street<div></div>
Rua Bell´Aliance,<div></div> 149 - São Caetano do Sul
Tel: 4238-0424
</div>
            
</body>

</html>