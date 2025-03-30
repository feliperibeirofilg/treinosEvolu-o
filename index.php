<?php

    include_once("config/connection.php");
    include_once("templates/header.php");
?>

    <div class="container">
        <?php if(isset($printMsg)  && $printMsg != ''): ?>
            <p id="msg"><?= $printMsg ?></p>
        <?php endif?>

        <h1 id="main-title">Meus treinos</h1>

        <?php if(count($trains)>0):?>
        <table class="table" id="trains-table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Treino</th>
                        <th scope="col">Peso</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($trains as $train): ?>
                        <tr>
                            <td scope="row" class="col-id"><?= $train["id"]?></td>
                            <td scope="row"><?= $train["nome"]?></td>
                            <td scope="row"><?= $train["treino"]?></td>
                            <td scope="row"><?= $train["peso"]?></td>
                            <td class="actions">
                                <a href="<?=$BASE_URL ?>show.php?id=<?=$train['id']?>"><i class="far fa-eye check-icon"></i></a>
                                <a href="<?=$BASE_URL ?>edit.php?id=<?=$train['id']?>"><i class="far fa-edit fa-edit"></i></a>
                                <form class="delete-form" action="<?=$BASE_URL?>/config/process.php" method="POST">
                                    <input type="hidden" name="type" value="delete">
                                    <input type="hidden" name="id" value="<?= $train["id"]?>">
                                    <button type="submit" class="delete-btn"><i class="fas fa-times delete-icon"></i></button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach;?>
                </tbody>
        </table>
        <?php else:?>
            <p id="empty-list-text">Nenhum treino encontrado, <a href="<?=$BASE_URL?>/create.php">CLIQUE AQUI PARA ADICIONAR</a>.</p>
        <?php endif?>
    </div>
<?php
    include_once("templates/footer.php");
?>