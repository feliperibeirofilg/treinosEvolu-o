<?php

    include_once("config/url.php");
    include_once("user_cadastro/config/process_login.php");

    //Limpa a mensagem
    if(isset($_SESSION['msg'])){
        $printMsg = $_SESSION['msg'];
        $_SESSION['msg'] = '';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="user_cadastro/css/style.css">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.min.css" integrity="sha512-oc9+XSs1H243/FRN9Rw62Fn8EtxjEYWHXRvjS43YtueEewbS6ObfXcJNyohjHqVKFPoXXUxwc+q1K7Dee6vv9g==" crossorigin="anonymous" />
    <link rel="stylesheet"
     href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" 
     integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" 
     crossorigin="anonymous" 
     referrerpolicy="no-referrer" 
     />
<body>
<header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary"></nav>
        <a class="navbar-brand" href="./index.php">
            <img class="icon" src="icon/iconee.jpg" alt="Treinos">
        </a>
        <div>
            <div class="navbar-nav">
                <a class="nav-link" id="home-link" href="<?= $BASE_URL?>/index.php">LOGIN</a>
                <a class="nav-link" id="create-link" href="<?=$BASE_URL?>/create.php"?>Ainda não tem login</a>
            </div>
        </div>
    </header>   
</body>