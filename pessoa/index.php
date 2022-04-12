<html>
    <body>
        <center><h3>CRUD PHP</h3></center>
        <hr/>
        <form action="index.php" method="POST">
            <label>Nome</label><br/>
            <input type="text" name="nome" required/><br/>
            <label>Idade</label><br/>
            <input type="number"name="idade" required/><br/><br/>
            <input type="submit" value="Inserir" name="btinserir"/>
        </form>
        <?php
            if(isset($_POST['btinserir'])){
                include 'conecta.php';
                $nome = $_POST['nome'];
                $idade = $_POST['idade'];
                $sql = "INSERT INTO humano(nome,idade) VALUES ('$nome', '$idade')";
                if(mysqli_query($conn, $sql)){
                    echo "<script language='javascript' type='text/javascript'>
                         alert('Registro inserido com sucesso!');
                         windows.location.href='index,php'
                         </script>";
                } else {
                    echo "<script language='javascript' type='text/javascript'>
                         alert('Registro falhou!');
                         windows.location.href='index,php'
                         </script>";
                }       
                mysqli_close($conn);
            } else {
                echo "";
            }
        ?>
        <hr/>
        <table border="1">
            <tr>
                <td>ID</td>
                <td>Nome</td>
                <td>Idade</td>
                <td>Ações</td>
            </tr>
            <?php
                include 'conecta.php';
                $humano = mysqli_query($conn, "SELECT * FROM humano");
                $linha = mysqli_num_rows($humano);
                if($linha > 0){
                    while($registro = $humano->fetch_array()){
                        echo '<tr>';
                            echo '<td>'.$registro['id'].'</td>';
                            echo '<td>'.$registro['nome'].'</td>';
                            echo '<td>'.$registro['idade'].'</td>';
                            echo '<td>Editar | <a href="exclui.php?id='.$registro['id'].'">Excluir</a></td>';
                        echo '</tr>';
                    }
                } else {
                    echo "Não há registro para listar!";
                }
                mysqli_close($conn);
            ?>
        </table>
    </body>
</html>