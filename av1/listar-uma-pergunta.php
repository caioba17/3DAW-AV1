<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar uma pergunta</title>
</head>
<body>
    <h3>Detalhes da Pergunta</h3>
    <?php 
    if (isset($_GET['pergunta']) && isset($_GET['tipo'])) {
        $pergunta = $_GET['pergunta'];
        $tipo = $_GET['tipo'];

        if ($tipo == 'texto') {
            $arqPerguntasTexto = fopen("perguntas-texto.txt", "r") or die("Erro");

            while (!feof($arqPerguntasTexto)) {
                $linha = fgets($arqPerguntasTexto);
                $dados = explode(";", trim($linha));

                if (count($dados) == 2 && $dados[0] == $pergunta) {
                    echo "<p><strong>Pergunta = </strong> " . $dados[0] . "</p>";
                    echo "<p><strong>Resposta = </strong> " . $dados[1] . "</p>";
                    break;
                }
            }

            fclose($arqPerguntasTexto);
        } else if ($tipo == 'multipla') {
            $arqPerguntasMultipla = fopen("perguntas-multipla.txt", "r") or die("Erro");

            while (!feof($arqPerguntasMultipla)) {
                $linha = fgets($arqPerguntasMultipla);
                $dados = explode(";", trim($linha));

                if (count($dados) == 7 && $dados[0] == $pergunta) {
                    echo "<p>Pergunta =  " . $dados[0] . "</p>";
                    echo "<p>Opção A =  " . $dados[1] . "</p>";
                    echo "<p>Opção B =  " . $dados[2] . "</p>";
                    echo "<p>Opção C =  " . $dados[3] . "</p>";
                    echo "<p>Opção D =  " . $dados[4] . "</p>";
                    echo "<p>Opção E =  " . $dados[5] . "</p>";
                    echo "<p>Gabarito =  " . $dados[6] . "</p>";
                    break;
                }   
            }

            fclose($arqPerguntasMultipla);
        } else {
            echo "<p>Erro</p>";
        }
    } else {
        echo "<p>Erro</p>";
    }
   
   
    ?>
    <br><br><br><br>
    <a href="opcoes.html">Opções</a>
</body>
</html>