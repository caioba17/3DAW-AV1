<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuários</title>
</head>
<body>
    <h3>Usuários</h3>
    <table>
        <tr>
            <th>Nome</th>
            <th>Email</th>  
            <th>Senha</th> 
            <th>Excluir</th>
            <th>Alterar</th>
        </tr>
        <?php 
        $arqUsuarios = fopen("usuarios.txt", "r") or die("erro");

        while(!feof($arqUsuarios)) {
            $linha = fgets($arqUsuarios);
            $dados = explode(";", trim($linha));
            if(count($dados) == 3) {
                $nome = $dados[0];
                $email = $dados[1];
                $senha = $dados[2];
                echo "<tr>
                        <td>$nome</td>
                        <td>$email</td>
                        <td>$senha</td>
                        <td>
                            <form action='excluir-usuarios.php' method='post'> 
                                <input type='hidden' name='email' value='$email'>
                                <input type='submit' value='Excluir'>
                            </form>
                        </td>
                        <td><a href='alterar-usuario.php?email=" . $email . "'>Alterar</a></td>
                      </tr>";
                      
            }
        }
        

     
        ?>
    </table>
    <br><br><br><br>
    <a href="opcoes.html">Opções</a>
</body>
</html>