<?php

    include_once("config/connection.php");
    include_once("templates/header.php");
?>

    <div class="container">
        <?php if(isset($printMsg)  && $printMsg != ''): ?>
            <p id="msg"><?= $printMsg ?></p>
        <?php endif?>
        <h1 id="main"></h1>
    </div>