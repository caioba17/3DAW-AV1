<?php
$method = $_SERVER['REQUEST_METHOD'];
if($method == 'POST') { 
    $email = trim($_POST["email"]);
    $dados = file("usuarios.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $arqUsuarios = fopen("usuarios.txt", "w") or die("erro");
    $usuario = false;

    foreach($dados as $dado) {
        $infos = explode(";", trim($dado));

        if (count($infos) == 3 && trim($infos[1]) != $email) {
            fwrite($arqUsuarios, $dado . PHP_EOL);
            } else if (count($infos) == 3 && trim($infos[1]) == $email) {
                $usuario = true;
            }
    }

    fclose($arqUsuarios);


    header("Location: listar-usuarios.php");
    exit;

}


?>