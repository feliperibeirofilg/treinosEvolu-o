<?php

    include_once("user_cadastro/config/connection_login.php");
    include_once("templates/header_login.php");
    include_once("./config/url.php");
?>
<div class="container">
        <?php if(isset($printMsg) && $printMsg != ''): ?>
            <p id = "msg"><?= $printMsg ?></p>
        <?php endif;?>
<body>
    <div class="login-container">
        <div class="login-box">
            <h2>Login</h2>
            <form action="POST">
            <input type="hidden" name="type" value="login">
                <div class="input-group">
                    <i class="fas fa-user">
                        <input type="text" name="email" id="email" placeholder="Digite seu email">
                    </i>
                </div>
                <div class="input-group">
                    <i class="fas fa-locker">
                        <input type="password" name="senha" placeholder="Insira sua Senha">
                    </i>
                </div>
                <div class="options">
                    <label><input type="checkbox" Lembrar-me/></label>
                    <a href="#">Esqueceu sua senha?</a>
                </div>
                <button type="submit" class="login-btn">Entrar</button>
                <a href="<?=$BASE_URL?>/process_login.php"></a>
            </form>
            <div class="signup-link">
                Não é cadastrado? <a href="<?=$BASE_URL?>create.php">Cadastre-se Agora!</a>
            </div>
        </div>
    </div>
</body>
</html>