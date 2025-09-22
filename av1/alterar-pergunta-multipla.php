<?php 
$pergunta = "";
$opc1 = "";
$opc2 = "";
$opc3 = "";
$opc4 = "";
$opc5 = "";
$resposta = "";
$method = $_SERVER['REQUEST_METHOD'];
if ($method == 'GET') {
    $pergunta = $_GET['pergunta'];
    $arqPerguntasMultipla = fopen("perguntas-multipla.txt", "r") or die("Erro");

    while (!feof($arqPerguntasMultipla)) {
        $linha = fgets($arqPerguntasMultipla);
        $dados = explode(";", trim($linha));

        if (count($dados) == 7 && $dados[0] == $pergunta) {
            $resposta = $dados[6];
            $opc1 = $dados[1];
            $opc2 = $dados[2];
            $opc3 = $dados[3];
            $opc4 = $dados[4];
            $opc5 = $dados[5];
            break;
        }
    }

    fclose($arqPerguntasMultipla);
}

if ($method == 'POST') {
    $pergunta_original = $_POST['pergunta_original'];
    $opc1 = $_POST['opc1'];
    $opc2 = $_POST['opc2'];
    $opc3 = $_POST['opc3'];
    $opc4 = $_POST['opc4'];
    $opc5 = $_POST['opc5'];
    $pergunta = $_POST['pergunta'];
    $resposta = $_POST['resposta'];

    $dados = file("perguntas-multipla.txt");
    $arqPerguntasMultipla = fopen("perguntas-multipla.txt", "w") or die("Erro");

    foreach ($dados as $dado) {
        $infos = explode(";", trim($dado));

        if (count($infos) == 7 && $infos[0] == $pergunta_original) {
            fwrite($arqPerguntasMultipla, "$pergunta;$opc1;$opc2;$opc3;$opc4;$opc5;$resposta\n");
        } else {
            fwrite($arqPerguntasMultipla, $dado);
        }
    }   

    fclose($arqPerguntasMultipla);
    header("Location: listar-perguntas.php");
    exit;
}


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Pergunta Múltipla Escolha</title>
</head>
<body>
    <h3>Alterar</h3>
    <form action="alterar-pergunta-multipla.php" method="POST">
        <input type="hidden" name="pergunta_original" value="<?php echo $pergunta; ?>">
        <input type="text" name="pergunta" value="<?php echo $pergunta; ?>" placeholder="Pergunta">  
        <input type="text" name="opc1" value="<?php echo $opc1; ?>" placeholder="Opção 1">     
        <input type="text" name="opc2" value="<?php echo $opc2; ?>" placeholder="Opção 2">  
        <input type="text" name="opc3" value="<?php echo $opc3; ?>" placeholder="Opção 3">  
        <input type="text" name="opc4" value="<?php echo $opc4; ?>" placeholder="Opção 4">  
        <input type="text" name="opc5" value="<?php echo $opc5; ?>" placeholder="Opção 5">  
        <input type="text" name="resposta" value="<?php echo $resposta; ?>" placeholder="Resposta">  
        <input type="submit" value="Alterar Pergunta">
    </form>
    <br><br><br><br>
    <a href="opcoes.html">Opções</a>
</body>
</html>