<?php
    $listausers = file('../txt/users.txt');

    $nomeusers = array();

    //Passa todos os users para um array
    foreach ($listausers as $user) {
        $detalhes_users = explode('|', $user);
        array_push($nomeusers,$detalhes_users[0]);
    }
    
    echo json_encode($nomeusers);
?>