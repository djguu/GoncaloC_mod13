<?php
    $utilizador = $_POST['user'];

    $listausers = file('../txt/users.txt');

    $destino = array();

    //Se nao for o admin que deseja apagar
    //vai adicionar a um array.
    foreach ($listausers as $user) {
        $detalhes_users = explode('|', $user);
        if ($detalhes_users[0] != $utilizador) {
            $destino[] = $user;
        }
    }

    //----------------------------------
    //Vai apagar o ficheiro e inserir
    //administradores um a um que nao sao para ser apagados
    $fp = fopen("../txt/users.txt", "w+");
    flock($fp, LOCK_EX);
    foreach($destino as $line) {
        fwrite($fp, $line);
    }
    flock($fp, LOCK_UN);
    fclose($fp);
    //----------------------------------

    echo json_encode("Administrador eliminado com sucesso");
?>