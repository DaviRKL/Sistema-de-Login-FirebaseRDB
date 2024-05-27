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
            include_once ("header.php")
                ?>
                    <div class='alert alert-danger'>
                        <i class="fa-solid fa-xmark"></i> Falha ao logar, tente realizar o <a href='login.php'>Login</a> novamente</b>
                    </div>
            <?php
            include_once ("footer.php");
        }
    }
}