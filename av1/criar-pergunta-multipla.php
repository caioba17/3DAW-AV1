<?php
$method = $_SERVER['REQUEST_METHOD'];
if($method == 'POST') {  
    $pergunta = $_POST["pergunta"];
    $opc1 = $_POST["opc1"];
    $opc2 = $_POST["opc2"];
    $opc3 = $_POST["opc3"];
    $opc4 = $_POST["opc4"];
    $opc5 = $_POST["opc5"];
    $resposta = $_POST["resposta"];

    if(file_exists("perguntas-multipla.txt")) {
        $arqPerguntasMultipla = fopen("perguntas-multipla.txt", "a") or die("erro");
    } else {
        $arqPerguntasMultipla = fopen("perguntas-multipla.txt", "w") or die("erro");
    }

    $linha = $pergunta . ";" . $opc1 . ";" . $opc2 . ";" . $opc3 . ";" . $opc4 . ";" . $opc4 . ";" . $resposta . "\n";
    fwrite($arqPerguntasMultipla, $linha);
    fclose($arqPerguntasMultipla);

}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar pergunta múltipla</title>
</head>
<body>
    <form action="criar-pergunta-multipla.php" method="POST">
        <input type="text" name="pergunta" placeholder="Pergunta">
        <input type="text" name="opc1" placeholder="A">
        <input type="text" name="opc2" placeholder="B">
        <input type="text" name="opc3" placeholder="C">
        <input type="text" name="opc4" placeholder="D">
        <input type="text" name="opc5" placeholder="E">
        <input type="text" name="resposta" placeholder="Resposta">
        <input type="submit" value="Cadastrar">
    </form>
    <br><br><br><br>
    <a href="opcoes.html">Opções</a>
</body>
</html>