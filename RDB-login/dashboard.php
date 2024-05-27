<?php
include("config.php");
include("firebaseRDB.php");

if(!isset($_SESSION['user'])){
    header("location:  login.php");
}
$userName = htmlspecialchars($_SESSION['user']['name']);
include_once ("header.php")
?>
    <div class='alert alert-success'>
        <i class='fas fa-check-circle'></i> Seja bem vindo ao meu site <b><?php echo $userName ?></b>
    </div>
    <a href='logout.php' class='btn'><i class="fa-solid fa-right-from-bracket"></i>Logout</a>
<?php
    include_once ("footer.php")
?>
