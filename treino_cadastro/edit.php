<?php
    include_once("../templates/header.php");
    include_once("../config/connection_train.php");
?>

<div class="container fixed-top">
<?php include_once("../templates/backbtn.html"); ?>

    <h1 id="main-title">EDITAR TREINO</h1>
    <form id="create-form" action="<?= $BASE_URL ?>/config/process_train.php" method="POST">
        <input type="hidden" name="type" value="edit">
        <input type="hidden" name="id" value="<?= $trains["id"]?>">

        <div class="form-group">
            <label for="nome"> Nome do grupo muscular: </label>
            <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o nome" value="<?= $trains["nome"]?>" Required>
        </div>

        <div class="form-group">
            <label for="treino"> Treino: </label>
            <input type="text" class="form-control" id="treino" name="treino" placeholder="Digite o treino"  value="<?= $trains["treino"]?>" Required>
        </div>

        <div class="form-group">
            <label for="peso"> Qual peso: </label>
            <input type="number" class="form-control" id="peso" name="peso" placeholder="Digite o peso" value="<?= $trains["peso"]?>"Required>
        </div>
        <div class="form-group">
            <label for="date"> Qual a data do treino: </label>
            <input type="date" class="form-control" id="date" name="date" value="<?= $trains["date"]?>"Required>
        </div>
        <button type="submit" class="btn btn-primary">Atualizar Treino</button>
    </form>
</div>


<?php
    include_once("../templates/footer.php");
?>