<!-- Includes -->
<?php include_once PATH_ROOT . '/pages/includes/header.php'; ?>
<!-- ./Includes -->

<!-- Logica -->
<?php
function handler() {
    $matricula = filter_input(INPUT_POST, 'matricula', FILTER_SANITIZE_SPECIAL_CHARS);
    $passwd    = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_SPECIAL_CHARS);

    $connect = Connect::getInstance();
    $stmt = $connect->prepare('SELECT id, nome, menu, senha FROM usuarios WHERE matricula = :matricula');
    $stmt->bindParam(':matricula', $matricula);
    $stmt->execute();

    if (!$user = $stmt->fetch()) {
        $_SESSION['alert']['type'] = 'danger';
        $_SESSION['alert']['text'] = 'Usuário informado não existe.';
        return;
    }

    if (!Passwd::is($passwd)) {
        $_SESSION['alert']['type'] = 'danger';
        $_SESSION['alert']['text'] = Passwd::fail()->getMessage();
        return;
    }

    if (!Passwd::verify($passwd, $user['senha'])) {
        $_SESSION['alert']['type'] = 'danger';
        $_SESSION['alert']['text'] = 'Senha incorreta.';
        return;
    }

    unset($user['senha']);
    $_SESSION['user'] = $user; 

    header('Location: /inicio');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    handler();
}
?>
<!-- ./Logica -->

<!-- Conteúdo da página -->
<div class="container-fluid pt-3">
    <div class="card col-5 py-2 m-auto border-0">
        <div class="card-body">
            <img class="img-fluid p-4" src="/assets/images/brand.png"/>

            <?php if (isset($_SESSION['alert']['type']) && isset($_SESSION['alert']['text'])) :?>
                <div class="alert alert-<?= $_SESSION['alert']['type']; ?>">
                    <?= $_SESSION['alert']['text']; ?>
                </div>
            <?php endif; unset($_SESSION['alert']); ?>

            <form action="/login" method="POST">
                
                <div class="form-group">
                    <label for="matricula">Login</label>
                    <input 
                        class="form-control" 
                        id="matricula"
                        type="text" 
                        name="matricula" 
                        placeholder="Informe sua matricula"
                        required 
                        autofocus/>
                </div>

                <div class="form-group">
                    <label for="password">Senha</label>
                    <input 
                        class="form-control" 
                        id="password" 
                        type="password" 
                        name="senha"
                        minlength="<?= CONFIG_PASSWD_MIN_LEN ?>"
                        maxlength="<?= CONFIG_PASSWD_MAX_LEN ?>"
                        placeholder="Informe sua senha"
                        required/>
                </div>

                <button 
                    class="btn btn-primary btn-block" 
                    type="submit"/>
                    Acessar
                </button>

            </form>
        </div>
    </div>
</div>
<!-- ./Conteúdo da página -->

<!-- Includes -->
<?php include_once PATH_ROOT . '/pages/includes/footer.php'; ?>
<!-- ./Includes -->
