<!DOCTYPE html>
<html>
    <?php require('style.css'); require('teste.php') ?>
        <body>
    <form method="post" class="boxavaliacao" target="feira.php">
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
                            Avaliador
                        </th>
                        <?php  echo"<th><input list='teste' class='boxavaliacao' name='avaliador'>";
                       ?>
                    </tr>
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
                        <?php  echo"<th><input type='number' class='boxavaliacao' name='Apresentação' pattern='(\d)' title='Deve conter apenas números'></th>";
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
            <input type="submit" value="Enviar" class="textoavaliacao" style='width:70%' name="enviar">
    </form>
    <br />
    <br />
    <br />

    </center>    
    
</body>
</html>