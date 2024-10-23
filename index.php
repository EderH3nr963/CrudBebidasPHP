<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/styles/general.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <header>
        <nav>
            <a href="index.php" class="link-redirect">Inicio</a>
            <a href="index.php?controller=bebida&action=create" class="link-redirect">Adicionar</a>
        </nav>
    </header>
    <main>
        <?php
        require_once 'app/controllers/BebidaController.php';

        $controller = isset($_GET['controller']) ? $_GET['controller'] : 'bebida';
        $action = isset($_GET['action']) ? $_GET['action'] : 'index';
        $id = isset($_GET['id']) ? $_GET['id'] : null;

        $bebidaController = new BebidaController();

        if ($controller == 'bebida') {
            if ($action == 'index') {
                $bebidaController->index();
            } elseif ($action == 'create') {
                $bebidaController->create();
            } elseif ($action == 'store') {
                $bebidaController->store();
            } elseif ($action == 'edit' && $id) {
                $bebidaController->edit($id);
            } elseif ($action == 'update' && $id) {
                $bebidaController->update($id);
            } elseif ($action == 'delete' && $id) {
                $bebidaController->delete($id);
            }
        }
        ?>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>