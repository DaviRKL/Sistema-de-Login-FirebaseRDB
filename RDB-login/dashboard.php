<?php
include("config.php");
include("firebaseRDB.php");

if(!isset($_SESSION['user'])){
    header("location:  login.php");
}else{
    echo "Seja bem vindo ao meu site <b>{$_SESSION['user']['name']}</b>";
    echo "<a href='logout.php'>Logout</a>";
}