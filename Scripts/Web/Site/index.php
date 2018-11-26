<!DOCTYPE html>
<?php
  session_start(); //digitar sempre que usar sessão
  $mensagem = "";
  $login = "";  
  //$password = "MTIzNA==";

require('style.css');
require('conf_db.php');
require('horario.php');
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
    //Conecta com o Banco de Dados
  
	//Configura a conexão para mostrar erros (IMPORTANTE PARA VER OS ERROS SENÃO O PDO TE ENGANA!)
    

        //Efetuar o login

          if(isset($_POST["user"]))
          {
             $login = $_POST["user"];
            $password = $_POST["password"];
             
              
             $conex = new PDO("mysql:host=$servidor;dbname=$basedados",$usuario,$senha);
             $conex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              
              
             $comando = $conex->prepare(" SELECT * FROM aluno WHERE Nome=:pusername"); 
             $params = array(':pusername' => $login);
             $comando->execute($params);
              
             $comando2 = $conex->prepare(" SELECT * FROM professores WHERE email=:pusername"); 
             $params2 = array(':pusername' => $login);
             $comando2->execute($params);
        
             $comando3 = $conex->prepare(" SELECT * FROM coordenador WHERE email=:pusername"); 
             $params3 = array(':pusername' => $login);
             $comando3->execute($params);

              
             if ($linha = $comando->fetch(PDO::FETCH_ASSOC)) {
                 
                if( $linha['Nome'] == $login
                    && $linha["senha"] == base64_encode($password)) {

                    //Login efetuado
                  $_SESSON["email"] = $login; 
                  $_SESSION["logado"] = $linha['Nome'];
                  
                    header("Location: usuario.php");
                    exit();
                }

            }
              if ($linha = $comando2->fetch(PDO::FETCH_ASSOC)) {
                if($linha["username"] == $login
                    && $linha["password"] == base64_encode($password)) {

                    //Login efetuado
                  
                  $_SESSION["logado"] = $linha['username'];
                  $_SESSION["email"] = $login;
                    header("Location: usuario.php");
                    exit();
                }
            }
              if ($linha = $comando3->fetch(PDO::FETCH_ASSOC)) {
                if($linha["username"] == $login
                    && $linha["password"] == base64_encode($password)) {

                    //Login efetuado
                  
                  $_SESSION["logado"] = $linha['username'];
                    $_SESSION["email"] = $login;
                    header("Location: usuario.php");
                    exit();
                }
            }
          }


    //deslogar
  if(isset($_POST["sair"])){
    unset($_SESSION["logado"]);
  }
//HTML

?>
<html>
<style>
    @font-face {
        font-family: 'CaviarDreams';
        src: url('CaviarDreams.ttf');


    }

    body {
        text-align: justify;
        font-family: 'CaviarDreams';
        font-weight: bold;
        background-color: dodgerblue;
    }

    div {
        /*
            border-style: solid;
            border-color: green;
            */
        background: ;
    }

    .feira {
        margin-top: 5vh;
        margin-left: 5vh;
        font-size: 20px;
        width: 50%;
        float: left;
    }

    .informacoes {
        text-align: justify;
        font-size: 15px;
        margin-top: 20vh;
        margin-right: 5vh;
        width: 40%;
        float: right;
    }

    .img {
        background: none;
        width: 40%;
        height: auto;
        float: left;
        margin-left: 10vh;
        margin-top: 10vh;
    }
    
    .login {
        margin-top: 5vh;
        margin-left: auto;
        margin-right: 20vh;
        width: 20%;
        float: right;
        height: 20vh;
        
        
    }

    .cadastro {
        margin-left: 20vh;
        margin-top: 20vh;
        margin-right: 5vh;
        width: 31%;
        float: right;
        text-align: center;

    }

    .divcontato {
        margin-top: 10vh;
        float: left;
        width: 100%;
        height: 16vh;
    }
</style>

<body>
    <title>Excute</title>
    <!--
        <div>
            <iframe src="http://excute.ga/" class="iframeInscricao"></iframe>
            <iframe src="login.php" class="iframeLogin"></iframe>
            <iframe src="contato.php" class="iframeContato"></iframe>
        </div>
        -->

    <div class="feira">Excute é uma feira que procura proporcionar uma experiência profissional tanto aos alunos quanto aos expositores de fora, onde todos possuem uma oportunidade de exibir projetos de autoria própria de uma maneira comercial à visitantes de todo o ABC.</div>
    <div class="login">
        <?php
        //Login efetuado
    if(isset($_SESSION["logado"] ) ){
      echo "Seja bem vindo(a) " . $_SESSION["logado"]; ?>
        <form action="usuario.php">
            <input type="submit" value="Área do usuário">
        </form>
        <form action="index.php" method="post">
            <input type="hidden" name="sair" value="sim">
            <input type="submit" value="Clique aqui para deslogar">
        </form>

        <?php
    }
        //Efetuar o login
    else{
    ?>
        <form action="index.php" method="post" style="">
            <div style="margin-right:5vh;">
                Email:&nbsp;
                <input type="text" name="user" value="<?php //echo $login ?>" />
                <br /> Senha:&nbsp;
                <input type="password" name="password" />
            </div>
            <br />
            <br />
            <div style="margin-right:15vh"><input type="submit" value="Entrar" /></div>
            <?php echo $mensagem ?>
        </form>
        <?php
    }
    ?>
    </div>
    <div class="img"><img src="bolita.png" style="width:100%;height:100%;"></div>
    <div class="cadastro"><a href="http://excute.ga/">Clique aqui para se inscrever</a></div>
    <div class="informacoes">A
        <?php echo $excute;?>ª Excute ocorerrá nos dias 07/12 e 08/12 das 19h às 22:30h e das 09h às 11:30h, respectivamente, na ETEC Jorge Street, situada na Rua Bell'Aliance, 149 - São Caetano do Sul. </div>
    <div class="divcontato"><iframe src="contato.php" frameborder="0" width="100%" height="100%" scrolling="no"></iframe></div>
</body>


</html>