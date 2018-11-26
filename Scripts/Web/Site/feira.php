<!DOCTYPE html>
<style>
table {
    border-collapse: collapse;
    width: 100%;
    height: 100%;
    font-size: 50px;

}

tr:nth-child(even) {
    background-color: #d8d8d8;
}

</style>
<html>
    <?php require('style.css'); require('horario.php'); require("conf_db.php"); session_start();
    echo $_SESSION['usuario'];
    if($_SESSION["usuario"] != 1){
    if(isset($_POST['Nprojeto'])){
        $conex = new PDO("mysql:host=$servidor;dbname=$basedados",$usuario,$senha);
        $conex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $inovacao = $_POST['Inovacao'];
        $aplicabilidade = $_POST['Aplicabilidade'];
        $construcao = $_POST['Construcao'];
        $funcionabilidade = $_POST['Funcionabilidade'];
        $apresentacao = $_POST['Apresentacao'];
        $vestimentas = $_POST['Vestimentas'];
        $postura = $_POST['Postura'];
        $decoracao = $_POST['Decoracao'];
        
        if($_POST["Inovacao"] < 1){
            $inovacao = 1;
        }elseif($_POST["Inovacao"] > 10){
            $inovacao = 10;
        }
        
        if($_POST["Aplicabilidade"] < 1){
            $aplicabilidade = 1;
        }elseif($_POST["Aplicabilidade"] > 10){
            $aplicabilidade = 10;
        }
        
        if($_POST["Construcao"] < 1){
            $construcao = 1;
        }elseif($_POST["Construcao"] > 10){
            $construcao = 10;
        }
        
        if($_POST["Funcionabilidade"] < 1){
            $funcionabilidade = 1;
        }elseif($_POST["Funcionabilidade"] > 10){
            $funcionabilidade = 10;
        }
        
        if($_POST["Apresentacao"] < 1){
            $apresentacao = 1;
        }elseif($_POST["Apresentacao"] > 10){
            $apresentacao = 10;
        }
        
        if($_POST["Vestimentas"] < 1){
            $vestimentas = 1;
        }elseif($_POST["Vestimentas"] > 10){
            $vestimentas = 10;
        }
        
        if($_POST["Postura"] < 1){
            $postura = 1;
        }elseif($_POST["Postura"] > 10){
            $postura = 10;
        }
        
        if($_POST["Decoracao"] < 1){
            $decoracao = 1;
        }elseif($_POST["Decoracao"] > 10){
            $decoracao = 10;
        }
              
        $comando = $conex->prepare("insert into feira(avaliador, nprojeto, inovacao, aplicabilidade, construcao, funcionabilidade, apresentacao, vestimentas, postura, decoracao) values(:pavaliador, :pnprojeto, :pinovacao, :paplicabilidade, :pconstrucao, :pfuncionabilidade, :papresentacao, :pvestimentas, :ppostura, :pdecoracao)");
        $params = array(
        ":pavaliador" => $_POST['avaliador'],
        ":pnprojeto" =>$_POST['Nprojeto'],
        ":pinovacao" =>$inovacao,
        ":paplicabilidade" =>$aplicabilidade,
        ":pconstrucao" =>$construcao,
        ":pfuncionabilidade" =>$funcionabilidade,
        ":papresentacao" =>$apresentacao,
        ":pvestimentas" =>$vestimentas,
        ":ppostura" =>$postura,
        ":pdecoracao" =>$decoracao
        );
        $comando->execute($params);
    }
    
    
    ?>
        <body>
    <form method="post" class="boxavaliacao" action="feira.php">
        <center>
            <h2>Ficha de avaliação TCC/
                <?php echo $ano; ?>
            </h2>
            <p />
            <h2>
                <?php echo $excute; ?>ª Excute</h2>
            <p />
            <br />
            <br />
        </center>

        <div class="avaliador">
            Avaliador: <?php echo $_SESSION['logado'];?>
        </div>

        <br />
        <br />
        <br />

        <center>
            <div class="overflow">
                <table border="1px" class="overflow">
                   
                    <tr>
                        <th>
                            Nº projeto
                        </th>
                        <?php  echo"<th><input type='number' class='boxavaliacao' name='Nprojeto' pattern='(\d)' title='Deve conter apenas números'></th>";
                        ?>
                    </tr>
                    <tr>
                        <th>
                            Inovação
                        </th>
                        <?php echo"<th><input type='number' class='boxavaliacao' name='Inovacao' pattern='(\d)' title='Deve conter apenas números'></th>";
                        ?>
                    </tr>
                    <tr>
                        <th>
                            Aplicabilidade (atual ou futura)
                        </th>
                        <?php echo"<th><input type='number' class='boxavaliacao' name='Aplicabilidade' pattern='(\d)' title='Deve conter apenas números'></th>";
                        ?>
                    </tr>
                    <tr>
                        <th>
                            Construção
                        </th>
                        <?php echo"<th><input type='number' class='boxavaliacao' name='Construcao' pattern='(\d)' title='Deve conter apenas números'></th>";
                       ?>
                    </tr>
                    <tr>
                        <th>
                            Funcionalidade
                        </th>
                        <?php echo"<th><input type='number' class='boxavaliacao' name='Funcionabilidade' pattern='(\d)' title='Deve conter apenas números'></th>";
                        ?>
                    </tr>
                    <tr>
                        <th>
                            Apresentação
                        </th>
                        <?php  echo"<th><input type='number' class='boxavaliacao' name='Apresentacao' pattern='(\d)' title='Deve conter apenas números'></th>";
                        ?>
                    </tr>
                    <tr>
                        <th>
                            Vestimentas
                        </th>
                        <?php  echo"<th><input type='number' class='boxavaliacao' name='Vestimentas' pattern='(\d)' title='Deve conter apenas números'></th>";
                         ?>
                    </tr>
                    <tr>
                        <th>
                            Postura
                        </th>
                        <?php  echo"<th><input type='number' class='boxavaliacao' name='Postura' pattern='(\d)' title='Deve conter apenas números'></th>";
                       ?>
                    </tr>
                    <tr>
                        <th>
                            Decoração
                        </th>
                        <?php  echo"<th><input type='number' class='boxavaliacao' name='Decoracao' pattern='(\d)' title='Deve conter apenas números'></th>";
                       ?>
                    </tr>
                </table>
            </div>
            <input type="hidden" name="avaliador" value="<?php echo $_SESSION["logado"]; ?>" >
            <input type="submit" value="Enviar" class="textoavaliacao" style='width:70%' name="enviar">
    </form>
    <br />
    <br />
    <br />

    </center>    
    <div class="textoavaliacao">
    <b>
        Orientações:
        <p />
        Durante as apresentações:
        <p />
    </b>
    - Atribuir note de 0 a 10 nos critérios apresentados
    <p />
    - Emitir sua opinião sobre a aprovação do projeto para a apresentação na
    <?php echo $excute; ?>ª EXCUTE
    <p />
    <b>
        <br />
        Ao final das apresentações:
        <p />
    </b>
    - Deliberar em conjunto com os outros componentes da banca sobre a aprovação dos projetos
    <p />
    - Entregar esta ficha de avaliação para o professor orientador do projeto
    <p />
    - Assinar a ata e fazer um comentário geral sobre as apresentações
    <p />
        </div>
            <?php }
    else{
        header("location:index.php");
    }
    ?>
</body>
</html>