<?php
    $nome = $_POST['login'];
    $pass = $_POST["password"];


    $listausers = file('../txt/users.txt');

    //Verifica se o utilizador existe
    //e se a password corresponde
    $sucesso = false;
    foreach ($listausers as $user) {
        $detalhes_users = explode('|', $user);
        if (trim($detalhes_users[0]) == $nome && trim($detalhes_users[1]) == $pass) {
            $sucesso = true;
        }
    }

    //Se os detalhes estiverem certos
    //Manda a variavel true
    if ($sucesso) {
        echo json_encode(true);
    } else {
        echo json_encode(false);
    }
?>