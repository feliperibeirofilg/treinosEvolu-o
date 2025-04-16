<?php
    //session_start();
    include_once("../config/url.php");
    include_once("../config/process_train.php");

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
    <title>TREINOS</title>
    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
  <!-- FONT AWESOME -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" 
  integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet"
     href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" 
     integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==">
    <!-- CSS -->
  <link rel="stylesheet" href="<?=$BASE_URL?>css/styles.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container">
                <a class="navbar-brand" href="<?= $BASE_URL?>treino_cadastro/index.php">
                    <img class="icon" src="<?= $BASE_URL?>icon/icon.png" alt="Treinos">
                </a>
            <div class="navbar-nav">
                <a class="nav-link" id="home-link" href="<?= $BASE_URL?>treino_cadastro/index.php">Academia</a>
                <a class="nav-link" id="create-link" href="<?=$BASE_URL?>treino_cadastro/create.php">Criar Treino</a>
                    <?php
                        $primeiro_nome = explode(" ", $_SESSION['user_name'])[0];
                        if(isset($_SESSION['user_name'])):
                    ?>
                <span class="nav-link text-white">
                    Olá, <?=htmlspecialchars($primeiro_nome)?>
                    <a href="<?= $BASE_URL ?>index.php"> Sair</a>
                </span>
                <?php endif; ?>
                
            </div>
            </div>
        </nav>
    </header>      
</body>
</html>