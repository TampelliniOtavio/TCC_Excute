<!DOCTYPE html>
<html>
    
<?php require('teste.php'); require('style.css'); require('conf_db.php');

if($_SERVER['REQUEST_METHOD'] == "POST"){
    try{
        
    
    $conex = new PDO("mysql:host=$servidor;dbname=$basedados",$usuario,$senha);
    $conex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
     
    
    
        $turma = $_POST["turma"];
        $avaliador = $_POST["avaliador"];
        $nome_projeto = $_POST["Nome" ];
        $pertinencia_tema = $_POST["PertinenciaTema" ];
        $inovacao = $_POST["Inovacao" ];
        $aplicabilidade = $_POST["Aplicabilidade" ];
        $construcao = $_POST["Construcao" ];
        $funcionabilidade = $_POST["Funcionabilidade"];
        $dominio = $_POST["DominioTecnico"];
        $apresentacao = $_POST["Apresentacao"];
        $total = $_POST["Total"];
        $aprovado = $_POST["radio"];
        
        if($_POST["PertinenciaTema"] < 1){
            $pertinencia_tema = 1;
        }elseif($_POST["PertinenciaTema"] > 10){
            $pertinencia_tema = 10;
        }
        
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
        
        if($_POST["DominioTecnico"] < 1){
            $dominio = 1;
        }elseif($_POST["DominioTecnico"] > 10){
            $dominio = 10;
        }
        
        if($_POST["Apresentacao"] < 1){
            $apresentacao = 1;
        }elseif($_POST["Apresentacao"] > 10){
            $apresentacao = 10;
        }
        
        if($_POST["Total"] < 1){
            $total = 1;
        }elseif($_POST["Total"] > 10){
            $total = 10;
        }
        
       if($nome_projeto != ""){
            $comando = $conex->prepare(" INSERT INTO avaliacao(turma, avaliador, nome_projeto, pertinencia_tema, inovacao, aplicabilidade, construcao, funcionabilidade, dominio, apresentacao, total, aprovado)
            VALUES(:pturma, :pavaliador, :pnome_projeto, :ppertinencia_tema, :pinovacao, :paplicabilidade, :pconstrucao, :pfuncionabilidade, :pdomino, :papresentacao, :ptotal, :paprovado)");

            $params = array(
            ":pturma" => $turma,
            ":pavaliador" => $avaliador,
            ":pnome_projeto" => $nome_projeto,
            ":ppertinencia_tema" => $pertinencia_tema,
            ":pinovacao" => $inovacao,
            ":paplicabilidade" => $aplicabilidade,
            ":pconstrucao" => $construcao,
            ":pfuncionabilidade" => $funcionabilidade,
            ":pdominio" => $dominio,
            ":papresentacao" => $apresentacao,
            ":ptotal" => $total,
            ":paprovado" => $aprovado,
            );
            //print_r($params);
            $comando->execute($params);
            
       }
    
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
}






?>

<meta charset="utf-8" />

<body>
    <form method="post" class="boxavaliacao" target="Avaliacao.php">
        <center>
            <h2>Ficha de avaliação TCC/
                <?php echo $ano; ?>
            </h2>
            <p />
            <h2>
                <?php echo $excute; ?>ª Excute</h2>
            <p />
            <br />
            <Table>
                <h2>
                    Turma: <input type="text" class="textoavaliacao" style="width:50%" name="turma">
                </h2>
            </Table>

            <p />
            <br />
            <br />
        </center>

        <div class="avaliador">
            Avaliador: <input type="text" class="textoavaliacao" name="avaliador">
        </div>

        <br />
        <br />
        <br />

        <center>
            <div class="overflow">
                <table border="1px" class="overflow">
                    <tr>
                        <th >
                            Nome do Projeto
                        </th>
                        <?php echo"<th><input list='teste' class='boxavaliacao' name='Nome'>";
                       ?>
                    </tr>
                    <tr>
                        <th>
                            Pertinência do tema p/ a habilitação
                        </th>
                        <?php echo"<th><label><input type='radio' class='radio' name='PertinenciaTema' value='I' checked='true'> I</label>
                                       <label><input type='radio' class='radio' name='PertinenciaTema' value='R'> R</label>
                                       <label><input type='radio' class='radio' name='PertinenciaTema' value='B'> B</label>
                                       <label><input type='radio' class='radio' name='PertinenciaTema' value='MB'> MB</label></th>";
                        ?>
                    </tr>
                    <tr>
                        <th>
                            Inovação/Originalidade
                        </th>
                        <?php echo"<th><label><input type='radio' class='radio' name='Inovacao' value='I' checked='true'> I</label>
                                       <label><input type='radio' class='radio' name='Inovacao' value='R'> R</label>
                                       <label><input type='radio' class='radio' name='Inovacao' value='B'> B</label>
                                       <label><input type='radio' class='radio' name='Inovacao' value='MB'> MB</label></th>";
                        ?>
                    </tr>
                    <tr>
                        <th>
                            Aplicabilidade (atual ou futura)
                        </th>
                        <?php echo"<th><label><input type='radio' class='radio' name='Aplicabilidade' value='I' checked='true'> I</label>
                                       <label><input type='radio' class='radio' name='Aplicabilidade' value='R'> R</label>
                                       <label><input type='radio' class='radio' name='Aplicabilidade' value='B'> B</label>
                                       <label><input type='radio' class='radio' name='Aplicabilidade' value='MB'> MB</label></th>";
                        ?>
                    </tr>
                    <tr>
                        <th>
                            Construção
                        </th>
                        <?php echo"<th><label><input type='radio' class='radio' name='Construcao' value='I' checked='true'> I</label>
                                       <label><input type='radio' class='radio' name='Construcao' value='R'> R</label>
                                       <label><input type='radio' class='radio' name='Construcao' value='B'> B</label>
                                       <label><input type='radio' class='radio' name='Construcao' value='MB'> MB</label></th>";
                       ?>
                    </tr>
                    <tr>
                        <th>
                            Funcionalidade
                        </th>
                        <?php echo"<th><label><input type='radio' class='radio' name='Funcionabilidade' value='I' checked='true'> I</label>
                                       <label><input type='radio' class='radio' name='Funcionabilidade' value='R'> R</label>
                                       <label><input type='radio' class='radio' name='Funcionabilidade' value='B'> B</label>
                                       <label><input type='radio' class='radio' name='Funcionabilidade' value='MB'> MB</label></th>";
                        ?>
                    </tr>
                    <tr>
                        <th>
                            Domínio Técnico
                        </th>
                        <?php echo"<th><label><input type='radio' class='radio' style='' name='DominioTecnico' value='I' checked='true'> I</label><br>
                                       <label><input type='radio' class='radio' name='DominioTecnico' value='R'> R</label><br>
                                       <label><input type='radio' class='radio' name='DominioTecnico' value='B'> B</label><br>
                                       <label><input type='radio' class='radio' name='DominioTecnico' value='MB'> MB</label><br></th>";
                        ?>
                    </tr>
                    <tr>
                        <th>
                            Apresentação
                        </th>
                        <?php echo"<th><label><input type='radio' class='radio' name='Apresentacao' value='I' checked='true'> I</label>
                                       <label><input type='radio' class='radio' name='Apresentacao' value='R'> R</label>
                                       <label><input type='radio' class='radio' name='Apresentacao' value='B'> B</label>
                                       <label><input type='radio' class='radio' name='Apresentacao' value='MB'> MB</label></th>";
                         ?>
                    </tr>
                    <tr>
                        <th>
                            TOTAL
                        </th>
                        <?php echo "<th><label><input type='radio' class='radio' name='Total' value='I' checked='true'> I</label>
                                        <label><input type='radio' class='radio' name='Total' value='R'> R</label>
                                        <label><input type='radio' class='radio' name='Total' value='B'> B</label>
                                        <label><input type='radio' class='radio' name='Total' value='MB'> MB</label></th>"
                       ?>
                    </tr>
                    <tr>
                        <th>
                            Aprovado para EXCUTE
                        </th>
                        <?php  echo"<th> <label><input type='radio' class='radio' name='radio' value='sim'> Sim</label>
  <label> <input type='radio' name='radio' class='radio' value='nao' checked='true'> Não</label>";
            ?>
                </table>
            </div>
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
</body>

</html>
