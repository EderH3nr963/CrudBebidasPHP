<style>
    main {
        margin-top: 70px;
        width: 100%;
        display: flex;
        justify-content: center;
    }

    .box-visualizacao {
        width: 75%;
    }

    form {
        display: flex;
        flex-direction: column;
        width: 75%;
    }

    .box-central-camp {
        display: flex;
        flex-direction: row;
    }

    .box-central-camp div {
        margin: 0px 10px 0px 10px;
    }

    form div,
    button {
        margin: 10px 0px 10px 0px
    }

    .botao-personalizado {
        border: 0px;
        width: 35%;
        height: 40px;
        border-radius: 20px;
        background-color: #0c4a85;
        color: white;
        transition: 0.5s
    }

    .botao-personalizado:hover {
        box-shadow: rgba(0, 0, 0, 0.56) 0px 4px 35px 4px;
    }
</style>

<div class="box-visualizacao">

    <h1>Editar Bebida</h1>
    <form method="POST" action="index.php?controller=bebida&action=update&id=<?= $this->bebida->id ?>"
        enctype="multipart/form-data">
        <div class="box-central-camp">
            <div>
                <div class="box-form-text">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" name="nome" class="form-control"
                        value="<?= htmlspecialchars($this->bebida->nome) ?>" required>
                </div>
                <div class="box-form-text">
                    <label for="descricao" class="form-label">Descrição</label>
                    <textarea name="descricao" class="form-control"
                        required><?= htmlspecialchars($this->bebida->descricao) ?></textarea>
                </div>
            </div>
            <div>
                <div class="box-form-text">
                    <label for="preco" class="form-label">Preço</label>
                    <input type="number" class="form-control" name="preco"
                        value="<?= htmlspecialchars($this->bebida->preco) ?>" required>
                </div>
                <div>
                    <label for="imagem" class="form-label">Imagem Atual</label><br>
                    <?php if (!empty($this->bebida->imagem)): ?>
                        <img src="<?= $this->bebida->imagem ?>" width="100" alt="Imagem da Bebida"><br>
                        <p>Alterar Imagem (opcional):</p>
                    <?php endif; ?>
                    <input type="file" class="form-control" name="imagem">
                </div>
            </div>
        </div>
        <button type="submit" class="botao-personalizado">Atualizar</button>
    </form>
</div>