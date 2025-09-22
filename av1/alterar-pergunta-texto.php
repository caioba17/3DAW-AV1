<?php 
$pergunta = "";
$resposta = "";
$method = $_SERVER['REQUEST_METHOD'];
if ($method == 'GET') {
    $pergunta = $_GET['pergunta'];
    $arqPerguntasTexto = fopen("perguntas-texto.txt", "r") or die("Erro");

    while (!feof($arqPerguntasTexto)) {
        $linha = fgets($arqPerguntasTexto);
        $dados = explode(";", trim($linha));

        if (count($dados) == 2 && $dados[0] == $pergunta) {
            $resposta = $dados[1];
            break;
        }
    }

    fclose($arqPerguntasTexto);
}

if ($method == 'POST') {
    $pergunta_original = $_POST['pergunta_original'];
    $pergunta = $_POST['pergunta'];
    $resposta = $_POST['resposta'];

    $dados = file("perguntas-texto.txt");
    $arqPerguntasTexto = fopen("perguntas-texto.txt", "w") or die("Erro");

    foreach ($dados as $dado) {
        $infos = explode(";", trim($dado));

        if (count($infos) == 2 && $infos[0] == $pergunta_original) {
            fwrite($arqPerguntasTexto, "$pergunta;$resposta\n");
        } else {
            fwrite($arqPerguntasTexto, $dado);
        }
    }   

    fclose($arqPerguntasTexto);
    header("Location: listar-perguntas.php");
    exit;
}


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Pergunta Texto</title>
</head>
<body>
    <h3>Alterar</h3>
    <form action="alterar-pergunta-texto.php" method="POST">
        <input type="hidden" name="pergunta_original" value="<?php echo $pergunta; ?>">
        <input type="text" name="pergunta" value="<?php echo $pergunta; ?>" placeholder="Pergunta">     
        <input type="text" name="resposta" value="<?php echo $resposta; ?>" placeholder="Resposta">  
        <input type="submit" value="Alterar Pergunta">
    </form>
    <br><br><br><br>
    <a href="opcoes.html">Opções</a>
</body>
</html>