<?php
    include_once("templates/header_login.php");
    include_once("config/url.php");
    include_once("user_cadastro/config/connection_login.php");
    include_once("user_cadastro/config/process_login.php");
    
?>

    <div class="create-container">
        <h1>CRIANDO USUÁRIO</h1>
        <form id="create-form"  action="<?=$BASE_URL?>user_cadastro/config/process_login.php" method="POST">
        <input type="hidden" name="type" value="create">
            <div class="input-group">
                <i class="fas fa-user">
                    <label for="nome">Nome:</label>
                    <input type="text" name="nome" id="nome" placeholder="Seu nome:">
                </i>
            </div>
            <div class="input-group">
                <i class="fas fa-user">
                    <label for="email">Email:</label>
                    <input type="text" name="email" id="email" placeholder="Seu email:">
                </i>
            </div>
            <div class="input-group">
                <i class="fas fa-user">
                <label for="phone">Telefone:</label>
                    <input type="text" name="phone" id="phone" placeholder="Seu telefone:">
                </i>
            </div>
            <div class="input-group">
                <label for="senha1">Sua Senha:</label>
                    <input type="senha" name="senha1" id="senha1" placeholder="Qual a sua senha?">
                </div>
            <div class="input-group">
                <label for="senha">Repita sua senha</label>
                    <input type="text" name="senha" id="senha" placeholder="Repita sua senha!">
            </div>
                <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>
</body>
</html>