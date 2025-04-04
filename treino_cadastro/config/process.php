<?php

include_once("connection.php");
include_once("config/url.php");

    $data = $_POST;

    //Modificando no Banco

    if(!empty($data)){
        //Criar contato
        if($data["type"] === "create"){

            $nome = $data["nome"];
            $treino = $data["treino"];
            $peso = $data["peso"];

        $query = "INSERT INTO trains (nome, peso, treino) VALUES (:nome, :peso, :treino)";

        $stmt = $conn->prepare($query);
        
        $stmt->bindParam(":nome", $nome);
        $stmt->bindParam(":peso", $peso);
        $stmt->bindParam(":treino", $treino);
        
        try {
            $stmt->execute();
            $_SESSION["msg"] = "Treino cadastrado com sucesso";
            
        } catch(PDOException $e) {
            $erro = $e->getMessage();
            echo "Erro: ". $erro;
        }
        //Redirect HOME apos a operação
        header("Location:". $BASE_URL ."../index.php");  
              
        //Editar um treino existente
    } else if($data["type"] === "edit"){

            $nome = $data['nome'];
            $treino = $data['treino'];
            $peso = $data['peso'];
            $id = $data['id'];

            $query = "UPDATE trains
                      SET nome = :nome, treino = :treino, peso = :peso
                      WHERE id = :id";
            $stmt = $conn->prepare($query);

            $stmt->bindParam(":nome", $nome);
            $stmt->bindParam(":treino", $treino);
            $stmt->bindParam(":peso", $peso);
            $stmt->bindParam(":id", $id);

            try{
                $stmt->execute();
                $stmt->execute();

                    // Verificar se a atualização foi bem-sucedida
                    if ($stmt->rowCount() > 0) {
                        $_SESSION['msg'] = "Treino editado com sucesso";
                    } else {
                        $_SESSION['msg'] = "Nenhuma alteração realizada ou treino não encontrado";
                    }
                $_SESSION['msg'] = "Treino editado com sucesso";
            } catch (PDOException $e){
                $error = $e->getMessage();
                echo "Error $error"; 
            }
            //Redirect HOME apos a operação
            header("Location:" . $BASE_URL . "../index.php");

            
        } //Deletando
        else if($data['type'] === 'delete'){
            $id = $data['id'];

            $query = "DELETE FROM trains WHERE id = :id";

            $stmt = $conn->prepare($query);

            $stmt->bindParam("id", $id);

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
    } else{
        $id;

        if(!empty($_GET)){
            $id = $_GET['id'];
        }

        //Retorna um dado de um contato

        if(!empty($id)){
            $query = "SELECT * FROM trains WHERE id =:id";

            $stmt = $conn->prepare($query);
            $stmt->bindParam(":id", $id);
            $stmt->execute();

            $trains = $stmt->fetch();
    }   else{
            //Retorna todos os treinos
            $trains = [];
            $query = "SELECT * FROM trains";
            $stmt = $conn->prepare($query);
            $stmt->execute();

            $trains = $stmt->fetchAll();

            }
        }

    //Fechar conexao
    $conn = null;  
?>