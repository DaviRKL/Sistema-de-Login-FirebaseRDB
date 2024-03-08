<?php
include("config.php");
include("firebaseRDB.php");

$email = $_POST['email'];
$password = $_POST['password'];

if($email == ""){
    echo "Preencha o email";
}else if($password == ""){
    echo "Preeencha a senha";
}else{
    $rdb = new firebaseRDB($databaseURL);
    $retrieve = $rdb->retrieve("/user", 'email', 'EQUAL', $email);
    echo $retrieve;
    $data = json_decode($retrieve, 1);

    if(count($data)==0){
        echo "Email não encontrado";
    }else{
        $id = array_keys($data)[0];
        if($data[$id]['password'] == $password){
            $_SESSION['user'] = $data[$id];
            $_SESSION['name'] = $data[$id]['name'];
            header("location: dashboard.php");
        }else{
            echo 'Falha ao logar';
        }
    }
}