<!-- Includes -->
<?php include_once PATH_ROOT . '/pages/includes/header.php'; ?>
<?php include_once PATH_ROOT . '/pages/includes/navbar.php'; ?>
<?php include_once PATH_ROOT . '/tsw/restrict.php'; ?>
<!-- ./Includes -->

<!-- Logica -->
<?php
function handler() {

}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    handler();
}
?>
<!-- ./Logica -->

<!-- Conteúdo da página -->
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center">
        <ol class="breadcrumb bg-white mb-0 mt-2">
            <li class="breadcrumb-item active">Fornecedores</li>
        </ol>
        
        <a class="btn btn-primary" href="/fornecedores/cadastro">
            <i class="bi bi-plus-lg"></i> 
            Cadastrar Novo Restaurante
        </a>
    </div>
</div>
<!-- ./Conteúdo da página -->

<!-- Includes -->
<?php include_once PATH_ROOT . '/pages/includes/footer.php'; ?>
<!-- ./Includes -->
