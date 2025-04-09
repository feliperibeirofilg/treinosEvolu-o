<?php
    include_once("../templates/header_login.php");
?>

    <div class="create-container">
        <h1>CRIANDO USUÁRIO</h1>
        <?php include_once("../templates/backbtn.html"); ?>
        <form id="create-form"  action="../config/process_login.php" method="POST">
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
                    <input type="password" name="senha1" id="senha1" placeholder="Qual a sua senha?">
                </div>
            <div class="input-group">
                <label for="senha">Repita sua senha</label>
                    <input type="password" name="senha" id="senha" placeholder="Repita sua senha!">
            </div>
                <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>
</body>
</html>