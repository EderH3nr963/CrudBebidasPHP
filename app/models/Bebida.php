<?php
class Bebida {
    private $conn;
    private $table = 'bebidas';

    public $id;
    public $nome;
    public $descricao;
    public $preco;
    public $imagem;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function listar() {
        $query = 'SELECT * FROM ' . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function criar() {
        $query = 'INSERT INTO ' . $this->table . ' (nome, descricao, preco, imagem) VALUES (:nome, :descricao, :preco, :imagem)';
        $stmt = $this->conn->prepare($query);

        $this->nome = htmlspecialchars(strip_tags($this->nome));
        $this->descricao = htmlspecialchars(strip_tags($this->descricao));
        $this->preco = htmlspecialchars(strip_tags($this->preco));
        $this->imagem = htmlspecialchars(strip_tags($this->imagem));

        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':descricao', $this->descricao);
        $stmt->bindParam(':preco', $this->preco);
        $stmt->bindParam(':imagem', $this->imagem);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function obterPeloId() {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE id = ? LIMIT 0,1';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            $this->nome = $row['nome'];
            $this->descricao = $row['descricao'];
            $this->preco = $row['preco'];
            $this->imagem = $row['imagem'];
        }
    }

    public function atualizar() {
        $query = 'UPDATE ' . $this->table . ' SET nome = :nome, descricao = :descricao, preco = :preco, imagem = :imagem WHERE id = :id';
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':descricao', $this->descricao);
        $stmt->bindParam(':preco', $this->preco);
        $stmt->bindParam(':imagem', $this->imagem);
        $stmt->bindParam(':id', $this->id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function deletar() {
        $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $this->id);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
