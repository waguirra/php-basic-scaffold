<!-- Includes -->
<?php include_once PATH_ROOT . '/pages/includes/header.php'; ?>
<?php include_once PATH_ROOT . '/pages/includes/navbar.php'; ?>
<?php include_once PATH_ROOT . '/tsw/restrict.php'; ?>
<!-- ./Includes -->

<!-- Logica -->
<?php
function handler() {
    $matricula = filter_input(INPUT_POST, 'matricula', FILTER_SANITIZE_SPECIAL_CHARS);
    $nome      = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
    $senha     = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_SPECIAL_CHARS);
    $setor     = filter_input(INPUT_POST, 'setor', FILTER_SANITIZE_SPECIAL_CHARS);
    $estado    = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_SPECIAL_CHARS);
    $cidade    = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_SPECIAL_CHARS);
    
    $menu['pedido']     = filter_input(INPUT_POST, 'pedido', FILTER_SANITIZE_SPECIAL_CHARS);
    $menu['fornecedor'] = filter_input(INPUT_POST, 'fornecedor', FILTER_SANITIZE_SPECIAL_CHARS);
    $menu['relatorio']  = filter_input(INPUT_POST, 'relatorio', FILTER_SANITIZE_SPECIAL_CHARS);
    $menu['permissoes'] = filter_input(INPUT_POST, 'permissoes', FILTER_SANITIZE_SPECIAL_CHARS);

    $connect = Connect::getInstance();
    $stmt = $connect->prepare('INSERT INTO usuarios (nome, matricula, setor, estado, cidade, menu, senha) 
                               VALUES (:nome, :matricula, :setor, :estado, :cidade, :menu, :senha)');

    $menu  = json_encode($menu, JSON_UNESCAPED_UNICODE);
    $senha = Passwd::hash($senha);

    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':matricula', $matricula);
    $stmt->bindParam(':setor', $setor);
    $stmt->bindParam(':estado', $estado);
    $stmt->bindParam(':cidade', $cidade);
    $stmt->bindParam(':menu', $menu);
    $stmt->bindParam(':senha', $senha);
    $stmt->execute();

    $_SESSION['alert']['type'] = 'success';
    $_SESSION['alert']['text'] = 'Usuário cadastrado com sucesso!';

    header('Location: /permissoes');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    handler();
}
?>
<!-- ./Logica -->

<!-- Conteúdo da página -->
<div class="container-fluid">

    <ol class="breadcrumb bg-white mb-0 mt-2">
        <li class="breadcrumb-item"><a href="/permissoes">Permissões</a></li>
        <li class="breadcrumb-item active">Cadastro</li>
    </ol>

    <?php if (isset($_SESSION['alert']['type']) && isset($_SESSION['alert']['text'])) :?>
        <div class="alert alert-<?= $_SESSION['alert']['type']; ?>">
            <?= $_SESSION['alert']['text']; ?>
        </div>
    <?php endif; unset($_SESSION['alert']); ?>
    
    <form action="/permissoes/cadastro" method="POST">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="matricula">Matricula</label>
                    <input 
                        class="form-control" 
                        type="text" 
                        id="matricula" 
                        name="matricula" 
                        placeholder="Informe sua matricula" 
                        autofocus 
                        required />
                </div>    

                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input 
                        class="form-control" 
                        type="text" 
                        id="nome" 
                        name="nome" 
                        placeholder="Informe seu nome" 
                        required />
                </div>

                <div class="form-group">
                    <label for="senha">Senha</label>
                    <input 
                        class="form-control" 
                        type="password" 
                        id="senha" 
                        name="senha" 
                        minlength="<?= CONFIG_PASSWD_MIN_LEN; ?>"
                        maxlength="<?= CONFIG_PASSWD_MAX_LEN; ?>"
                        placeholder="Informe seu senha" 
                        required />
                </div>

                <div class="form-group">
                    <label for="setor">Setor</label>
                    <input 
                        class="form-control" 
                        type="text" 
                        id="setor" 
                        name="setor" 
                        placeholder="Informe seu setor" 
                        required />
                </div>

                <div class="form-group">
                    <label for="estado">Estado</label>
                    <select class="form-control" id="estado" name="estado" disabled required>
                        <option desabled selected value>Selecione seu estado</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="cidade">Cidade</label>
                    <select class="form-control" id="cidade" name="cidade" disabled required>
                        <option desabled selected value>Selecione sua cidade</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Menu</label>
                    
                    <div class="custom-control custom-checkbox mb-2">
                        <input type="checkbox" class="custom-control-input" id="pedido" name="pedido" value="on">
                        <label class="custom-control-label" for="pedido">Pedido</label>
                    </div>

                    <div class="custom-control custom-checkbox mb-2">
                        <input type="checkbox" class="custom-control-input" id="fornecedor" name="fornecedor" value="on">
                        <label class="custom-control-label" for="fornecedor">Fornecedor</label>
                    </div>

                    <div class="custom-control custom-checkbox mb-2">
                        <input type="checkbox" class="custom-control-input" id="relatorio" name="relatorio" value="on">
                        <label class="custom-control-label" for="relatorio">Relatório</label>
                    </div>

                    <div class="custom-control custom-checkbox mb-2">
                        <input type="checkbox" class="custom-control-input" id="permissoes" name="permissoes" value="on">
                        <label class="custom-control-label" for="permissoes">Permissões</label>
                    </div>
                </div>
            </div>
        </div>

        <button class="btn btn-primary col-md-3 col-xl-2" type="submit">
            <i class="bi bi-send"></i> 
            Cadastrar
        </button>
    </form>
</div>
<!-- ./Conteúdo da página -->

<!-- JavaScript -->
<script src="/assets/javascript/pages/permissoes/cadastro.js" defer></script>
<!-- ./JavaScript -->

<!-- Includes -->
<?php include_once PATH_ROOT . '/pages/includes/footer.php'; ?>
<!-- ./Includes -->
