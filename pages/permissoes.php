<!-- Includes -->
<?php include_once PATH_ROOT . '/pages/includes/header.php'; ?>
<?php include_once PATH_ROOT . '/pages/includes/navbar.php'; ?>
<?php include_once PATH_ROOT . '/tsw/restrict.php'; ?>
<!-- ./Includes -->

<!-- Logica -->
<?php
function handler() {
    $usuarioID = filter_input(INPUT_POST, 'delete', FILTER_SANITIZE_NUMBER_INT);
    
    if ($usuarioID == $_SESSION['user']['id']) {
        $_SESSION['alert']['type'] = 'warning';
        $_SESSION['alert']['text'] = 'Você não pode se auto excluir.';
        return;
    }

    $connect = Connect::getInstance();
    $nrow = $connect->exec("DELETE FROM usuarios WHERE id = {$usuarioID}");

    if ($nrow) {
        $_SESSION['alert']['type'] = 'success';
        $_SESSION['alert']['text'] = 'Usuário excluido com sucesso.';
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    handler();
}

$connect  = Connect::getInstance();
$usuarios = $connect->query('SELECT id, nome, matricula FROM usuarios');
?>
<!-- ./Logica -->

<!-- Conteúdo da página -->
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center">
        <ol class="breadcrumb bg-white mb-0 mt-2">
            <li class="breadcrumb-item active">Permissões</li>
        </ol>

        <a class="btn btn-primary" href="/permissoes/cadastro">
            <i class="bi bi-plus-lg"></i>
            Adicionar Novo Cadastro
        </a>
    </div>

    <?php if (isset($_SESSION['alert']['type']) && isset($_SESSION['alert']['text'])) :?>
        <div class="alert alert-<?= $_SESSION['alert']['type']; ?>">
            <?= $_SESSION['alert']['text']; ?>
        </div>
    <?php endif; unset($_SESSION['alert']); ?>

    <table class="table table-sm mt-2">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Matricula</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($usuario = $usuarios->fetch()) : ?>
            <tr>
                <th scope="row"><?= $usuario['id']; ?></th>
                <td><?= $usuario['nome']; ?></td>
                <td><?= $usuario['matricula']; ?></td>
                <td class="col-2">
                    <div class="d-flex">
                        <a class="btn btn-warning mr-2" href="/permissoes/edita?id=<?= $usuario['id']; ?>">Editar</a>
                        
                        <form action="/permissoes" method="post">
                            <input type="hidden" name="delete" value="<?= $usuario['id']; ?>"/>
                            <button class="btn btn-danger" type="submit">Excluir</button>
                        </form>
                    </div>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
<!-- ./Conteúdo da página -->

<!-- JavaScript -->
<!-- ./JavaScript -->

<!-- Includes -->
<?php include_once PATH_ROOT . '/pages/includes/footer.php'; ?>
<!-- ./Includes -->