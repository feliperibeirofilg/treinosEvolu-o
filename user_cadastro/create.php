<?php
    include_once("templates/header_login.php");
    include_once("user_cadastro/config/connection_login.php");
?>

    <div class="create-container">
        <form action="POST">
            <div class="input-group">
                <i class="fas fa-user">
                    <input type="text" name="name" id="name" placeholder="Seu nome:">
                </i>
            </div>
            <div class="input-group">
                <i class="fas fa-user">
                    <input type="text" name="email" id="email" placeholder="Seu email:">
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
                <button type="submit">Cadastrar</button>
        </form>
    </div>
</body>
</html>