<?php
    $roomnb = $_POST['roomnb'];

    //Vai verificar em cada room
    //todos os users ativos e enviar os respetivos
    switch(strtoupper($roomnb)){
        case "ROOM1":
            $listausers = file('../txt/room1.txt');
            break;

        case "ROOM2":
            $listausers = file('../txt/room2.txt');
            break;

        case "ROOM3":
            $listausers = file('../txt/room3.txt');
            break;
    }

    $users = array();

    foreach ($listausers as $user) {
        array_push($users,$user);
    };
    
    echo json_encode($users);

?>