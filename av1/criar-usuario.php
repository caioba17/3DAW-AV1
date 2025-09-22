<?php
$method = $_SERVER['REQUEST_METHOD'];
if($method == 'POST') {  
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    if(file_exists("usuarios.txt")) {
        $arqUsuarios = fopen("usuarios.txt", "a") or die("erro");
    } else {
        $arqUsuarios = fopen("usuarios.txt", "w") or die("erro");
    }

    $linha = $nome . ";" . $email . ";" . $senha . "\n";
    fwrite($arqUsuarios, $linha);
    fclose($arqUsuarios);

}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar usuário</title>
</head>
<body>
    <form action="criar-usuario.php" method="POST">
        <input type="text" name="nome" placeholder="Nome">
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="senha" placeholder="Senha">
        <input type="submit" value="Cadastrar">
    </form>
    <br><br><br><br>
    <a href="opcoes.html">Opções</a>
</body>
</html>