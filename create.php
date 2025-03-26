<div class="container">
    <h1 id="main-title"></h1>
    <form id="create-form" action="<?= $BASE_URL ?>config/process.php" method="POST">
        <input type="hidden" name="type" value="create">
        <div class="form-group">
            <label for="name"> Nome: </label>
            <input type="text" class="form-control" id="name" name="nome" placeholder="Digite o nome: "Required>
        </div>
        <div class="form-group">
            <label for="treino"> Treino: </label>
            <input type="text" class="form-control" id="treino" name="treino" placeholder="Digite o treino: "Required>
        </div>
        <div class="form-group">
            <label for="peso"> Qual peso: </label>
            <input type="number" class="form-control" id="peso" name="peso" placeholder="Digite o peso: "Required>
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
</div>
