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
</style>

<div class="box-visualizacao">
    <h1 class="titulo">Lista de Bebidas</h1>
    <table class="table table-striped-columns">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Preço</th>
                <th>Imagem</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                <tr>
                    <td><?= $row['nome']; ?></td>
                    <td><?= $row['descricao']; ?></td>
                    <td><?= $row['preco']; ?></td>
                    <td><img src="<?= $row['imagem']; ?>" width="100" /></td>
                    <td>
                        <a href="index.php?controller=bebida&action=edit&id=<?= $row['id']; ?>"><img
                        src="./assets/icons/pencil.svg" alt=""></a>
                        <a href="index.php?controller=bebida&action=delete&id=<?= $row['id']; ?>"><img
                                src="./assets/icons/delete.svg" alt=""></a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>