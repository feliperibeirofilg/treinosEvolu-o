<?php
    include("connection_login.php");


    $data = $_POST;

    //Modificando no Banco
    if(!empty($data)){
        //Criar usuario
        if($data['type'] === "create"){
            $nome = $data['nome'];
            $email = $data['email'];
            $phone = $data['phone'];
            $senha = $data['senha'];

            //Verificar se as senhas são iguais
            if($data["senha1"] !== $data["senha"]){
                echo "Erro: As senhas não coincidem.";
                exit;
            }
                //Hash para segurança da senha
            $senha = password_hash($senha, PASSWORD_BCRYPT);

            $query = "INSERT INTO users(nome, email, phone, senha) VALUES(:nome, :email, :phone, :senha)";
            $stmt = $conn->prepare($query);

            $stmt->bindParam(":nome", $nome);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":phone", $phone);
            $stmt->bindParam(":senha", $senha);
            
            try{
                $stmt->execute();
                $_SESSION['msg'] = "Criado user com sucessso";
                
            } catch(PDOException $e){
                $error = $e->getMessage();
                echo "Error: $error";
            }
    
        }
            //Redirecionar para a home depois do cadastro
            header("Location: " . $BASE_URL ."../index.php");
    }