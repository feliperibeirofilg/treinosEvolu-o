<?php

    include_once("../templates/header.php");
    include_once("../config/connection_train.php");
?>

    <div class="container fixed-top" id="view-train-container">
        <h1 id="main-title"><?=$trains["nome"]?></h1>
        <p class="bold">Treino:</p>
        <p><?=$trains["treino"]?></p>
        <p class="bold">Peso:</p>
        <p><?=$trains["peso"]?></p>
    </div>

    <?php
        include_once("../templates/footer.php");