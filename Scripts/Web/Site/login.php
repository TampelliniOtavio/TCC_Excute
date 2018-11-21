
<?php
  session_start(); //digitar sempre que usar sessão
  $mensagem = "";
  $login = "";  
  //$password = "MTIzNA==";

require('style.css');
require('conf_db.php');
    
    //Conecta com o Banco de Dados
  
	//Configura a conexão para mostrar erros (IMPORTANTE PARA VER OS ERROS SENÃO O PDO TE ENGANA!)
    

        //Efetuar o login

          if(isset($_POST["user"]))
          {
             $login = $_POST["user"];
            $password = $_POST["password"];
              
              
             $conex = new PDO("mysql:host=$servidor;dbname=$basedados",$usuario,$senha);
             //$conex = new PDO("mysql:server=$servidor;userid=$basedados;password=$senha;database=$basedados");
             $conex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
             $comando = $conex->prepare(" SELECT * FROM users WHERE username=:pusername"); 
             $params = array(':pusername' => $login);
             $comando->execute($params);

              
             if ($linha = $comando->fetch(PDO::FETCH_ASSOC)) {
                if($linha["username"] == $login
                    && $linha["password"] == base64_encode($password)) {

                    //Login efetuado
                  $mensagem = "Logado com sucesso";
                  $_SESSION["logado"] = $linha['username'];
                }


                  //Usuario incorreto
                if($linha["username"] != $login) {
                  $mensagem = "<br><br> usuario incorreto";
                }


                  //Senha incorreta
                  if($linha["password"] != base64_encode($password)) {
                      $mensagem = "<br><br> senha incorreta";
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

<head>
</head>
<style>
    body{
        align-items: center;
        text-align:justify;
            font-family: 'CaviarDreams';
        font-weight: bold;
    }
    
    </style>
<body>
    <?php
        //Login efetuado
    if(isset($_SESSION["logado"] ) ){
      echo "Seja bem vindo(a) " . $_SESSION["logado"]; ?>
    <form action="login.php" method="post">
        <input type="hidden" name="sair" value="sim">
        <input type="submit" value="Clique aqui para deslogar">
    </form>
    <?php
    }
        //Efetuar o login
    else{
    ?> 
    <form action="login.php" method="post" style="">
        <div class="login">
        Login:
            <input type="text" name="user" value="<?php //echo $login ?>" />
        <br /> Senha:
        <input type="password" name="password" />
        <br />
        <br />
        <input type="submit" value="Entrar" />
        <?php echo $mensagem ?>
        </div>
        
    </form>
    <?php
    }
    ?>
</body>

</html>