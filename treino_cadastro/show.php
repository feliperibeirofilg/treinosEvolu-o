<?php

    include_once("../templates/header.php");
    include_once("../config/connection_train.php");
?>

    <div class="container fixed-top" id="view-train-container">
        <h1 id="main-title">Grupo muscular: <?=$trains["nome"]?></h1>
        <p class="bold">Treino:</p>
        <p><?=$trains["treino"]?></p>
        <p class="bold">Peso:</p>
        <p><?=$trains["peso"]?></p>
        <p class="bold">Data do treino:</p>
        <p><?=date('d/m/Y', strtotime($trains["date"]))?></p>
    </div>

    <?php
        include_once("../templates/footer.php");