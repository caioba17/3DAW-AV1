<?php
$method = $_SERVER['REQUEST_METHOD'];
if($method == 'POST') {  
    $pergunta = $_POST["pergunta"];
    $resposta = $_POST["resposta"];

    if(file_exists("perguntas-texto.txt")) {
        $arqPerguntasTexto = fopen("perguntas-texto.txt", "a") or die("erro");
    } else {
        $arqPerguntasTexto = fopen("perguntas-texto.txt", "w") or die("erro");
    }

    $linha = $pergunta . ";" . $resposta . "\n";
    fwrite($arqPerguntasTexto, $linha);
    fclose($arqPerguntasTexto);

}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar pergunta texto</title>
</head>
<body>
    <form action="criar-pergunta-texto.php" method="POST">
        <input type="text" name="pergunta" placeholder="Pergunta">
        <input type="text" name="resposta" placeholder="Resposta">
        <input type="submit" value="Cadastrar">
    </form>
    <br><br><br><br>
    <a href="opcoes.html">Opções</a>
</body>
</html>