<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perguntas e Respostas</title>
</head>
<body>
    <h3>Perguntas Texto</h3>
    <table>
        <tr>
            <th>Pergunta</th>
            <th>Resposta</th>  
            <th>Excluir</th>
            <th>Alterar</th>
        </tr>
        <?php 
        $arqPerguntasTexto = fopen("perguntas-texto.txt", "r") or die("erro");

        while(!feof($arqPerguntasTexto)) {
            $linha = fgets($arqPerguntasTexto);
            $dados = explode(";", trim($linha));
            if(count($dados) == 2) {
                $pergunta = $dados[0];
                $resposta = $dados[1];
                echo "<tr>
                        <td>$pergunta</td>
                        <td>$resposta</td>
                        <td>
                            <form action='excluir-pergunta-texto.php' method='post'> 
                                <input type='hidden' name='pergunta' value='$pergunta'>
                                <input type='submit' value='Excluir'>
                            </form>
                        </td>
                        <td><a href='alterar-pergunta-texto.php?email=" . $pergunta . "'>Alterar</a></td>
                      </tr>";
            }
        }
     
        ?>
    </table>
    <br><br>
        <h3>Perguntas Múltipla Escolha</h3>
    <table>
        <tr>
            <th>Pergunta</th>
            <th>Opção A</th>  
            <th>Opção B</th>  
            <th>Opção C</th>  
            <th>Opção D</th>  
            <th>Opção E</th>  
            <th>Gabarito</th>  
            <th>Excluir</th>
            <th>Alterar</th>
        </tr>
        <?php 
        $arqPerguntasMultipla = fopen("perguntas-multipla.txt", "r") or die("erro");

        while(!feof($arqPerguntasMultipla)) {
            $linha = fgets($arqPerguntasMultipla);
            $dados = explode(";", trim($linha));
            if(count($dados) == 7) {
                $pergunta = $dados[0];
                $opc1 = $dados[1];
                $opc2 = $dados[2];
                $opc3 = $dados[3];
                $opc4 = $dados[4];
                $opc5 = $dados[5];
                $resposta = $dados[6];
                echo "<tr>
                        <td>$pergunta</td>
                        <td>$opc1</td>
                        <td>$opc2</td>
                        <td>$opc3</td>
                        <td>$opc4</td>
                        <td>$opc5</td>
                        <td>$resposta</td>
                        <td>
                            <form action='excluir-pergunta-multipla.php' method='post'> 
                                <input type='hidden' name='pergunta' value='$pergunta'>
                                <input type='submit' value='Excluir'>
                            </form>
                        </td>
                        <td><a href='alterar-pergunta-multipla.php?email=" . $pergunta . "'>Alterar</a></td>
                      </tr>";
            }
        }
     
        ?>
    </table>
    <br><br><br><br>
    <a href="opcoes.html">Opções</a>
</body>
</html>