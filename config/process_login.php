<?php
        session_start();
    include_once('connection_login.php');
    include_once('url.php');
    
    $data = $_POST;

    //Modificando no Banco
    if(!empty($data)){
        //Criar um usuário
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

        $query = "INSERT INTO users (nome, email, phone, senha) VALUES(:nome, :email, :phone, :senha)";

        $stmt = $conn->prepare($query);

        $stmt->bindParam(":nome", $nome);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":phone", $phone);
        $stmt->bindParam(":senha", $senha);
        
        try{
            $stmt->execute();
            $_SESSION['msg'] = "Criado user com sucessso";
                //Redirecionar para a home depois do cadastro
                header("Location:". $BASE_URL . "../index.php");
            
        } catch(PDOException $e){
            $error = $e->getMessage();
            echo "Error: $error";
        }

        //Redirecionar para a home depois do cadastro
        header("Location:". $BASE_URL . "../index.php");
    }

        //----- FAZER LOGIN ------
        else if(isset($data['type']) && $data['type'] === 'login') {
            $email = $data['email'];
            $senha = $data['senha'];
            
            $query = "SELECT * FROM users WHERE email = :email LIMIT 1";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            //Verificar se o user existe
            if($stmt->rowCount() > 0){
                $user = $stmt->fetch(PDO::FETCH_ASSOC); // verificar

                //Verificar senha
                if(password_verify($senha, $user['senha'])){
                    //Senha correta:
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['user_name'] = $user['nome'];
                    
                    header("Location:" . $BASE_URL . "treino_cadastro/index.php");
                } else{
                    //Senha incorreta
                    $_SESSION['msg'] = 'Senha incorreta';
                    header("Location:" . $BASE_URL ."index.php");
                }
            }else {
                $_SESSION['msg'] = "Usuário não encontrado.";
                header("Location:" . $BASE_URL . "index.php");
            }

        } else{
            $_SESSION['msg'] = "Por favor preencha todos os campos";
            header("Location:" . $BASE_URL . "index.php");
        }
    }//fim do if
    
    
