<?php
    //Receber variaveis por POST
    $utilizador = $_POST['user'];
    $password = $_POST['pass'];

    //Localizacao ficheiro users
    $listausers = file('../txt/users.txt');

    //abre o ficheiro e verifica se existe o user
    $sucesso = true;
    foreach ($listausers as $user) {
        $detalhes_users = explode('|', $user);
        if ($detalhes_users[0] == $utilizador) {
            $sucesso = false;
            break;
        }
    }

    //Se nao existir vai adicionar o user
    if($sucesso){
        $line = $utilizador."|".$password;
        $myfile = file_put_contents('../txt/users.txt', $line.PHP_EOL , FILE_APPEND | LOCK_EX);
    }

    echo json_encode($sucesso);
?>