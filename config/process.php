<?php

use Dom\Element;

include_once("connection.php");
    $data = $_POST;

    if(!empty($data)){

        if($data["type"] === "create"){

            $nome = $data["nome"];
            $peso = $data["peso"];
            $treino = $data["treino"];

        }

        $query = "INSERT INTO train(nome, peso, treino) VALUES (:nome, :peso, :treino)";

        $stmt = $conn->prepare($query);
        
        $stmt->bindParam(":nome", $nome);
        $stmt->bindParam(":peso", $peso);
        $stmt->bindParam(":treino", $treino);
        
        try {
            $stmt->execute();
            $_SESSION["msg"] = "Treino cadastrado com sucesso";
            
        } catch(PDOException $e) {
            //erro na conexao
            $error = $e->getMessage();
            echo "Error $error";
        }

    }
    if(!empty($id)){
        $query = "SELECT * FROM train WHERE id=:id";

        $stmt = $conn->prepare($query);

        $stmt->bindParam(":id", $id);
        $stmt->execute();

        $trains = $stmt->fetch();
    } else{
        //Retorna todos os treinos
        $trains = [];
        $query = "SELECT * FROM train";
        $stmt = $conn->prepare($query);
        $stmt->execute();

        $trains = $stmt->fetchAll();

    }
    //Fechar conexao

    $conn = null;  


?>