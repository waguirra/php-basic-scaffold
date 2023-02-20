<header class="navbar-gradient-homolog">
    <!-- TopBar -->
    <div class="container-fluid d-flex justify-content-between align-items-center">
        <a href="/inicio">
            <img class="navbar-brand" src="/assets/images/xicaradecafe-light.png">
        </a>

        <div class="dropdown">
            <button class="btn btn-link text-light dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                <?= $_SESSION['user']['nome']; ?>
            </button>
            <div class="dropdown-menu">
                <span class="dropdown-item-text text-secondary">Ben-vindo</span>
                <a class="dropdown-item" href="/logout">Sair</a>
            </div>
        </div>
    </div>
    <!-- ./TopBar -->

    <!-- NavBar -->
    <?php $menu = json_decode($_SESSION['user']['menu'], true); ?>
    <div class="container-fluid py-2">
        <ul class="nav justify-content-between">
            <li class="nav-item">
                <a class="nav-link text-light" href="/inicio"><i class="bi bi-tv"></i> Início</a>
            </li>

            <?php if ($menu['pedido'] === 'on') : ?>
                <li class="nav-item">
                    <a class="nav-link text-light" href="#"><i class="bi bi-tv"></i> Pedido</a>
                </li>
            <?php endif; ?>

            <?php if ($menu['fornecedor'] === 'on') : ?>
                <li class="nav-item dropdown">
                    <a class="nav-link text-light dropdown-toggle" data-toggle="dropdown" href="#"><i class="bi bi-tv"></i> Fornecedor</a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="/fornecedores">Fornecedores</a>
                        <a class="dropdown-item" href="/combos">Combos</a>
                        <a class="dropdown-item" href="/itens">Itens</a>
                    </div>
                </li>
            <?php endif; ?>
            
            <?php if ($menu['relatorio'] === 'on') : ?>
                <li class="nav-item">
                    <a class="nav-link text-light" href="#"><i class="bi bi-tv"></i> Relatórios</a>
                </li>
            <?php endif; ?>

            <?php if ($menu['permissoes'] === 'on') : ?>
                <li class="nav-item">
                    <a class="nav-link text-light" href="/permissoes"><i class="bi bi-tv"></i> Permissões</a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
    <!-- ./NavBar -->
</header>