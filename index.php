<?php

    include_once("config/connection.php");
    include_once("create.php");
    include_once("templates/header.php");

    $sql = "CREATE TABLE IF NOT EXISTS train(
        id INT PRIMARY KEY AUTO_INCREMENT,
        nome VARCHAR (200) NOT NULL,
        treino VARCHAR(200) NOT NULL,
        peso INT NOT NULL
        )";

    $conn-> query($sql);




?>