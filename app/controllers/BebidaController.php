<?php
require_once 'app/models/Bebida.php';
require_once 'config/database.php';

class BebidaController {
    private $bebida;
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->bebida = new Bebida($this->db);
    }

    public function index() {
        $stmt = $this->bebida->listar();
        include 'app/views/bebidas/index.php';
    }

    public function create() {
        include 'app/views/bebidas/create.php';
    }

    public function store() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->bebida->nome = $_POST['nome'];
            $this->bebida->descricao = $_POST['descricao'];
            $this->bebida->preco = $_POST['preco'];

            if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] == 0) {
                $arquivo = 'uploads/' . bin2hex(random_bytes(16)) . '.' . pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION);
                move_uploaded_file($_FILES['imagem']['tmp_name'], $arquivo);
                $this->bebida->imagem = $arquivo;
            }

            if ($this->bebida->criar()) {
                header('Location: index.php');
            }
        }
    }

    public function edit($id) {
        $this->bebida->id = $id;
        $this->bebida->obterPeloId();
        include 'app/views/bebidas/edit.php';
    }

    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->bebida->id = $id;
            $this->bebida->nome = $_POST['nome'];
            $this->bebida->descricao = $_POST['descricao'];
            $this->bebida->preco = $_POST['preco'];
            var_dump($this->bebida);
    
            if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] == 0) {
                $arquivo = 'uploads/' . bin2hex(random_bytes(16)) . '.' . pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION);
                move_uploaded_file($_FILES['imagem']['tmp_name'], $arquivo);
                $this->bebida->imagem = $arquivo;
            } else {
                $this->bebida->obterPeloId(); // Carrega a imagem atual do banco
            }
    
            if ($this->bebida->atualizar()) {
                header('Location: index.php');
            }
        }
    }
    

    public function delete($id) {
        $this->bebida->id = $id;
        if ($this->bebida->deletar()) {
            header('Location: index.php');
        }
    }
}
