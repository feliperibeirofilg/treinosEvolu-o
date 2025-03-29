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
            $erro = $e->getMessage();
            echo "Erro: ". $e;
            
        }
        //Redirect HOME apos a operação
        header("Location:" . $BASE_URL . "../index.php");
        }
        else if($data['type'] === 'edit'){
            $nome = $data['nome'];
            $treino = $data['treino'];
            $peso = $data['peso'];
            $id = $data['id'];

            $query = "UPDATE treinos
                      SET nome = :nome, treino = :treino, peso = :peso
                      WHERE id=:id";
            $stmt = $conn->prepare($query);

            $stmt->bindParam("nome", $nome);
            $stmt->bindParam("treino", $treino);
            $stmt->bindParam("peso", $peso);
            $stmt->bindParam("id", $id);

            try{
                $stmt->execute();
                $_SERVER['msg'] = "Contato editado com sucesso";
            } catch (PDOException $e){
                $error = $e->getMessage;
                echo "Error $erro"; 
            }
            //Redirect HOME apos a operação
            header("Location:" . $BASE_URL . "../index.php");
        }

        else if($data['type'] === 'delete'){
            $id = $data['id'];

            $query = "DELETE FROM train WHERE id :id";

            $stmt = $conn->prepare($query);

        try{
            $stmt->execute();
            $_SESSION["msg"] = "Treino Deletado com sucesso";
        } catch(PDOException $e){
            $error = $e->getMessage();
            echo "Error $error";
        }
        //Redirect HOME apos a operação
            header("Location:" . $BASE_URL . "../index.php");
    }
        else if(!empty($id)){
            $query = "SELECT * FROM train WHERE id=:id";

            $stmt = $conn->prepare($query);

            $stmt->bindParam(":id", $id);
            $stmt->execute();

            $trains = $stmt->fetch();
    }   else{
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