<?php 
$nome = "";
$email = "";
$senha = "";
$method = $_SERVER['REQUEST_METHOD'];
if ($method == 'GET') {
    $email = $_GET['email'];
    $arqUsuarios = fopen("usuarios.txt", "r") or die("Erro");

    while (!feof($arqUsuarios)) {
        $linha = fgets($arqUsuarios);
        $dados = explode(";", trim($linha));

        if (count($dados) == 3 && $dados[1] == $email) {
            $nome = $dados[0];
            $senha = $dados[2];
            break;
        }
    }

    fclose($arqUsuarios);
}

if ($method == 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $dados = file("usuarios.txt");
    $arqUsuarios = fopen("usuarios.txt", "w") or die("Erro");

    foreach ($dados as $dado) {
        $infos = explode(";", trim($dado));

        if (count($infos) == 3 && $infos[1] == $email) {
            fwrite($arqUsuarios, "$nome;$email;$senha\n");
        } else {
            fwrite($arqUsuarios, $dado);
        }
    }

    fclose($arqUsuarios);
    header("Location: listar-usuarios.php");
    exit;
}


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Usuário</title>
</head>
<body>
    <h3>Alterar</h3>
    <form action="alterar-usuario.php" method="POST">
        <input type="text" name="nome" value="<?php echo $nome; ?>" placeholder="Nome">     
        <input type="text" name="email" value="<?php echo $email; ?>" readonly>  
        <input type="text" name="senha" value="<?php echo $senha; ?>" laceholder="Carga">
        <input type="submit" value="Alterar Usuário">
    </form>
    <br><br><br><br>
    <a href="opcoes.html">Opções</a>
</body>
</html>