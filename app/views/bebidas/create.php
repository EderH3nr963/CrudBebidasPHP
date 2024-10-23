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
        width: 50%;
    }

    form * {
        margin: 10px 0px 10px 0px
    }

    .botao-personalizado {
        border: 0px;
        width: 35%;
        height: 40px;
        border-radius: 20px;
        background-color: #0c4a85;
        color: white;
        transition: 0.5s;
        box-shadow: rgba(0, 0, 0, 0.56) 0px 5px 0px 0px;
    }
    
    .botao-personalizado:hover {
        box-shadow: rgba(0, 0, 0, 0.56) 0px 0px 0px 0px;
    }
</style>

<div class="box-visualizacao">
    <h1>Adicionar Nova Bebida</h1>
    <form method="POST" action="index.php?controller=bebida&action=store" enctype="multipart/form-data">
        <input type="text" class="form-control" name="nome" placeholder="Nome" required>
        <textarea name="descricao" cols="5" class="form-control" placeholder="Descrição" required></textarea>
        <input type="number" name="preco" class="form-control" placeholder="Preço" required>
        <input type="file" name="imagem" class="form-control" required>
        <button type="submit" class="botao-personalizado">Adicionar</button>
    </form>
</div>