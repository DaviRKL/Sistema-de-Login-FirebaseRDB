<?php
include("config.php");
include("firebaseRDB.php");

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

if($name == ""){
    echo "Preencha o nome";
}else if($email == ""){
    echo "Preeencha o email";
}else if($password == ""){
    echo "Preeencha a senha";
}else{
    $rdb = new firebaseRDB($databaseURL);
    $retrieve = $rdb->retrieve("/user", 'email', 'EQUAL', $email);
    $data = json_decode($retrieve, 1);

    if(isset($data['email'])){
        echo "Este email já está em uso";
    }else {
        $insert= $rdb->insert("/user", [
            "name" => $name,
            "email" => $email,
            "password" => $password
        ]);
        $result = json_decode($insert);
        if(isset($result->name)){
            echo "Cadastrado com sucesso, por favor faça o Login";
        }else{
            echo "Erro ao realizar cadastro";
        }
    }
}