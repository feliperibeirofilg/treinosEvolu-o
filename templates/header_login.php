<?php

    include_once($_SERVER['DOCUMENT_ROOT'] . '/treinosEvolucao/config/url.php');
    include_once($_SERVER['DOCUMENT_ROOT'] . '/treinosEvolucao/config/process_login.php');

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

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    
    <!-- FONT AWESOME -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" 
  integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <!-- CSS -->
  <link rel="stylesheet" href="<?= $BASE_URL ?>css/styles.css">
  </head>

<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
    <div class="container">
        <a class="navbar-brand" href="<?= $BASE_URL?>index.php">
            <img class="icon" src="<?= $BASE_URL?>icon/iconee.jpg" alt="Treinos">
        </a>
    <div class="navbar-nav">
        <a class="nav-link" id="home-link" href="<?= $BASE_URL?>index.php">LOGIN</a>
        <a class="nav-link" id="create-link" href="<?=$BASE_URL?>user_cadastro/create.php"?>Ainda não tem login</a>
    </div>
    </div>
    </nav>
    </header>   
</body>