<!-- Includes -->
<?php include_once PATH_ROOT . '/pages/includes/header.php'; ?>
<?php include_once PATH_ROOT . '/pages/includes/navbar.php'; ?>
<?php include_once PATH_ROOT . '/tsw/restrict.php'; ?>
<!-- ./Includes -->

<!-- Logica -->
<?php
function handler()
{
    var_dump($_POST);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    handler();
}
?>
<!-- ./Logica -->

<!-- Conteúdo da página -->
<div class="container-fluid">

    <ol class="breadcrumb bg-white mb-0 mt-2">
        <li class="breadcrumb-item"><a href="/fornecedores">Fornecedores</a></li>
        <li class="breadcrumb-item active">Cadastro</li>
    </ol>

    <form action="/fornecedores/cadastro" method="POST">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input 
                        class="form-control" 
                        type="text" 
                        id="nome" 
                        name="nome" 
                        placeholder="Informe seu nome" 
                        autofocus 
                        required />
                </div>

                <div class="form-group">
                    <label for="nome">Email</label>
                    <input 
                        class="form-control" 
                        type="email" 
                        id="email" 
                        name="email" 
                        placeholder="Informe seu endereço de email" 
                        required/>
                </div>

                <div class="form-group">
                    <label for="estado">Estado</label>
                    <select class="form-control" id="estado" name="estado" disabled required>
                        <option desabled selected value>Selecione seu estado</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="endereco">Endereço</label>
                    <textarea 
                        class="form-control" 
                        id="endereco" 
                        rows="2" 
                        placeholder="Informe seu endereço"></textarea>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="telefone">Telefone</label>
                    <input 
                        class="form-control" 
                        type="text" 
                        id="telefone" 
                        name="telefone" 
                        placeholder="Informe seu telefone" 
                        required />
                </div>

                <div class="form-group">
                    <label for="cnpj">CNPJ</label>
                    <input 
                        class="form-control" 
                        type="text" 
                        id="cnpj" 
                        name="cnpj" 
                        placeholder="Informe seu telefone" 
                        required />
                </div> 
                
                <div class="form-group">
                    <label for="cidade">Cidade</label>
                    <select class="form-control" id="cidade" name="cidade" disabled required>
                        <option desabled selected value>Selecione sua cidade</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="foto">Foto</label>
                    <input class="btn btn-light border d-block" id="foto" type="file" accept="image/png, image/jpeg"/>
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
<script src="/assets/javascript/pages/fornecedores/cadastro.js" defer></script>
<!-- ./JavaScript -->

<!-- Includes -->
<?php include_once PATH_ROOT . '/pages/includes/footer.php'; ?>
<!-- ./Includes -->