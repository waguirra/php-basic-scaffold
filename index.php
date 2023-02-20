<?php

session_start();

require_once __DIR__ . '/tsw/config.php';
require_once PATH_ROOT . '/tsw/connect.php';
require_once PATH_ROOT . '/tsw/passwd.php';

$page = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_SPECIAL_CHARS);

$routes = [
    '/login'                 => '/pages/login.php',
    '/logout'                => '/pages/logout.php',
    '/inicio'                => '/pages/inicio.php',
    '/permissoes'            => '/pages/permissoes.php',
    '/permissoes/cadastro'   => '/pages/permissoes/cadastro.php',
    '/permissoes/edita'      => '/pages/permissoes/edita.php',
    '/fornecedores'          => '/pages/fornecedores.php',
    '/fornecedores/cadastro' => '/pages/fornecedores/cadastro.php',
    '/404'                   => '/pages/404.php'
];

if (isset($routes[$page])) {
    include_once PATH_ROOT . $routes[$page];
} else {
    include_once PATH_ROOT . $routes['404'];
}
