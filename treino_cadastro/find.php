<?php

    include_once("../config/connection_train.php");
    include_once("../config/connection_login.php");
    include_once("../templates/header.php");

    $trains = [];
    $msg = "";

    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["type"]) && $_POST["type"] === "find") {
        $user_id = $_SESSION["user_id"];
        $filter = $_POST["filter"];
        $date = $_POST["date"];
        $nome = $_POST["nome"];

        if ($filter === "date" && !empty($date)) {
            $query = "SELECT * FROM trains WHERE user_id = :user_id AND date = :date";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(":user_id", $user_id);
            $stmt->bindParam(":date", $date);
            $stmt->execute();
            $trains = $stmt->fetchAll();

        } elseif ($filter === "text" && !empty($nome)) {
            $query = "SELECT * FROM trains WHERE user_id = :user_id AND nome = :nome";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(":user_id", $user_id);
            $stmt->bindParam(":nome", $nome);
            $stmt->execute();
            $trains = $stmt->fetchAll();
        }

        if (count($trains) === 0) {
            $msg = "Nenhum treino encontrado.";
        }
    }
?>
    
    <div class="container fixed-top">
        <?php if (!empty($msg)): ?>
            <p id="msg"><?= $msg ?></p>
        <?php endif; ?>

        <h1 id="main-title-inicio">Buscar treinos</h1>

        <form class="find-form" action="<?= $BASE_URL?>treino_cadastro/find.php" method="POST">
            <input type="hidden" name="type" value="find">
                <select name="filter">
                    <option value="text">Buscar por nome</option>
                    <option value="date">Buscar por data</option>
                </select>
            <input type="text" name="nome" placeholder="Digite o nome do treino">
            <input type="date" name="date">
            <button type="submit" class="btn btn-primary">Buscar treino</button>
            <?php if(count($trains)>0):?>
        <table class="table" id="trains-table">
                <thead>
                    <tr>
                        <th scope="col">Data</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Treino</th>
                        <th scope="col">Peso</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($trains as $train): ?>
                        <tr>
                            <td scope="row"><?= date('d/m/Y', strtotime($train["date"]))  ?></td>
                            <td scope="row"><?= $train["nome"]?></td>
                            <td scope="row"><?= $train["treino"]?></td>
                            <td scope="row"><?= $train["peso"]?> Kg</td>
                            <td class="actions">
                                <a href="<?=$BASE_URL ?>treino_cadastro/show.php?id=<?= $train['id']?>"><i class="far fa-eye check-icon"></i></a>
                                <a href="<?=$BASE_URL ?>treino_cadastro/edit.php?id=<?= $train['id']?>"><i class="far fa-edit edit-icon"></i></a>
                                <form class="delete-form" action="<?=$BASE_URL?>/config/process_train.php" method="POST">
                                    <input type="hidden" name="type" value="delete">
                                    <input type="hidden" name="id" value="<?= $train["id"]?>">
                                    <button type="submit" class="delete-btn"><i class="fas fa-times delete-icon"></i></button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach;?>
                </tbody>
        </table>
    
        <?php endif?>
        </form>
    </div>
<?php
    unset($_SESSION['trains']); 
    include_once("../templates/footer.php");
?>