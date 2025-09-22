<?php
$method = $_SERVER['REQUEST_METHOD'];
if($method == 'POST') { 
    $pergunta = trim($_POST["pergunta"]);
    $dados = file("perguntas-texto.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $arqPerguntasTexto = fopen("perguntas-texto.txt", "w") or die("erro");
    $achou = false;

    foreach($dados as $dado) {
        $infos = explode(";", trim($dado));

        if (count($infos) == 2 && trim($infos[0]) != $pergunta) {
            fwrite($arqPerguntasTexto, $dado . PHP_EOL);
            } else if (count($infos) == 3 && trim($infos[1]) == $pergunta) {
                $achou = true;
            }
    }

    fclose($arqPerguntasTexto);

    header("Location: listar-perguntas.php");
    exit;
    

}


?>