<?php
session_start();

if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true){
    header('Location: ./main/main.php');
}
else{
    header('Location: ./login.php');
}