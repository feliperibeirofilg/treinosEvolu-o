<?php
    include_once("templates/header.php");
    include_once("config/connection.php");
?>

<div class="container">
    <h1 id="main-title">EDITAR TREINO</h1>
    <form id="create-form" action="<?= $BASE_URL ?>config/process.php" method="POST">
        <input type="hidden" name="type" value="edit">
        <input type="hidden" name="id" value="<?=$treino["id"]?>">
        <div class="form-group">
            <label for="name"> Nome: </label>
            <input type="text" class="form-control" id="name" name="nome" placeholder="Digite o nome: " value="<?= $treino ["nome"]?>" required>
        </div>
        <div class="form-group">
            <label for="treino"> Treino: </label>
            <input type="text" class="form-control" id="treino" name="treino" placeholder="Digite o treino: "  value="<?= $treino ["treino"]?>" required>
        </div>
        <div class="form-group">
            <label for="peso"> Qual peso: </label>
            <input type="number" class="form-control" id="peso" name="peso" placeholder="Digite o peso: " value="<?= $treino ["peso"]?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Atualizar dados</button>
    </form>
</div>


<?php
    include_once("templates/footer.php");
?>