<?php
include ("config.php");
include ("firebaseRDB.php");

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

if ($name == "") {
    $error_message = "Preencha o nome";
} else if ($email == "") {
    $error_message = "Preeencha o email";
} else if ($password == "") {
    $error_message = "Preeencha a senha";
}
if (isset($error_message)) {
    include_once ("header.php");
    ?>
    <div class='alert alert-danger'>
        <i class="fa-solid fa-xmark"></i> <?php echo $error_message; ?>, tente <a href='signup.php'>cadastrar-se</a>
        novamente
    </div>
    <?php
    include_once ("footer.php");
} else {
    $rdb = new firebaseRDB($databaseURL);
    $retrieve = $rdb->retrieve("/user", 'email', 'EQUAL', $email);
    $data = json_decode($retrieve, 1);

    if (isset($data['email'])) {
        echo "Este email já está em uso";
    } else {
        $insert = $rdb->insert("/user", [
            "name" => $name,
            "email" => $email,
            "password" => $password
        ]);
        $result = json_decode($insert);
        if (isset($result->name)) {
            include_once ("header.php")
                ?>

            <div class='alert alert-success'>
                <i class='fas fa-check-circle'></i> Você se cadastrou com sucesso, por favor faça o <a
                    href='login.php'>Login</a></b>
            </div>
            <?php
            include_once ("footer.php");
        } else {
            include_once ("header.php")
                ?>
            <div class='alert alert-danger'>
                <i class="fa-solid fa-xmark"></i> Erro ao realizar cadastro, tente <a href='signup.php'>cadastrar-se novamente</a>
                novamente</b>
            </div>
            <?php
            include_once ("footer.php");
        }
    }
}