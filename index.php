<?php

    include_once("user_cadastro/config/connection_login.php");
    include_once("templates/header_login.php");
    include_once("./config/url.php");
?>

<body>
    <div class="login-container">
        <div class="login-box">
            <h2>Login</h2>
            <form action="POST">
                <div class="input-group">
                    <i class="fas fa-user">
                        <input type="text" name="email" id="email" placeholder="Digite seu email">
                    </i>
                </div>
                <div class="input-group">
                    <i class="fas fa-locker">
                        <input type="password" name="password" placeholder="Insira sua Senha">
                    </i>
                </div>
                <div class="options">
                    <label><input type="checkbox" Lembrar-me/></label>
                    <a href="#">Esqueceu sua senha?</a>
                </div>
                <button type="submit" class="login-btn">Entrar</button>
            </form>
            <div class="signup-link">
                Não é cadastrado? <a href="<?=$BASE_URL?>create.php">Cadastre-se Agora!</a>
            </div>
        </div>
    </div>
</body>
</html>