<?php
session_start();

include_once("connection_login.php");
include_once("url.php");

    $data = $_POST;

    //--- Modificando no Banco ---

    if(!empty($data)){
        // --- Criar treino ---
        if($data["type"] === "create"){

            $nome = $data["nome"];
            $treino = $data["treino"];
            $peso = $data["peso"];
            $date = $data["date"];
            $user_id = $_SESSION["user_id"];

        $query = "INSERT INTO trains (nome, peso, treino, date, user_id) 
                    VALUES (:nome, :peso, :treino, :date, :user_id)";

        $stmt = $conn->prepare($query);
        
        $stmt->bindParam(":nome", $nome);
        $stmt->bindParam(":peso", $peso);
        $stmt->bindParam(":treino", $treino);
        $stmt->bindParam(":date", $date);
        $stmt->bindParam(":user_id", $user_id);
        
        try {
            $stmt->execute();
            $_SESSION["msg"] = "Treino cadastrado com sucesso";
            
        } catch(PDOException $e) {
            $erro = $e->getMessage();
            echo "Erro: ". $erro;
        }
        //Redirect HOME apos a operação
        header("Location:". $BASE_URL. 'treino_cadastro/index.php');  

              
        // --- Editar um treino existente ---
    } else if($data["type"] === "edit"){

            $nome = $data['nome'];
            $treino = $data['treino'];
            $peso = $data['peso'];
            $date = $data['date'];
            $id = $data['id'];
            $user_id = $_SESSION["user_id"];

            $query = "UPDATE trains
                      SET nome = :nome, treino = :treino, peso = :peso, date = :date
                      WHERE id = :id AND user_id = :user_id";
            $stmt = $conn->prepare($query);

            $stmt->bindParam(":nome", $nome);
            $stmt->bindParam(":treino", $treino);
            $stmt->bindParam(":peso", $peso);
            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":date", $date);
            $stmt->bindParam(":user_id", $user_id);

            try{
                $stmt->execute();
                    // Verificar se a atualização foi bem-sucedida
                    if ($stmt->rowCount() > 0) {
                        $_SESSION['msg'] = "Treino editado com sucesso";
                    } else {
                        $_SESSION['msg'] = "Nenhuma alteração realizada ou treino não encontrado";
                    }
            } catch (PDOException $e){
                $error = $e->getMessage();
                echo "Error $error"; 
            }
            //Redirect HOME apos a operação
            header("Location:". $BASE_URL. "treino_cadastro/index.php");
                exit;

            
        } //--- Deletando ---
        else if($data['type'] === 'delete'){
            $id = $data['id'];
            $user_id = $_SESSION["user_id"];

            $query = "DELETE FROM trains WHERE id = :id AND user_id = :user_id";

            $stmt = $conn->prepare($query);

            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":user_id", $user_id);

        try{
            $stmt->execute();
            $_SESSION["msg"] = "Treino Deletado com sucesso";
        } catch(PDOException $e){
            $error = $e->getMessage();
            echo "Error $error";
        }
        //Redirect HOME apos a operação
            header("Location:" . $BASE_URL . "treino_cadastro/index.php");
            exit;
    }
    } else{
        $id;
        $user_id = $_SESSION["user_id"];

        if(!empty($_GET)){
            $id = $_GET['id'];
            
        }

        //Retorna um dado de um treino

        if(!empty($id)){
            $query = "SELECT * FROM trains Where id = :id AND user_id = :user_id";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":user_id", $user_id);
            $stmt->execute();
            $trains = $stmt->fetch();

    }   else{
            //Retorna todos os treinos
            $trains = [];
            $query = "SELECT * FROM trains WHERE user_id = :user_id";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(":user_id", $user_id);
            $stmt->execute();

            $trains = $stmt->fetchAll();

            }
        }

    //Fechar conexao
    $conn = null;  
?>