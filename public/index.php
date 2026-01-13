<?php
$rotasPossiveis = [
    "Home" => "../controller/ControllerHome.php",
    "Auth" => "../controller/ControllerAuth.php",
    "Cadastro" => "../controller/ControllerCadastro.php",
    "Agenda" => "../controller/ControllerAgenda.php"
];

$rota = $_GET['rota'] ?? "Auth";
$acao = $_GET['acao'] ?? "login";

if (!array_key_exists(key: $rota, array: $rotasPossiveis)) {
    die("erro 404:1");
}

if (file_exists(filename: $rotasPossiveis[$rota])) {
    $path = $rotasPossiveis[$rota];
    require $path;
} else {
    die("erro 404:2");
}

$class = "Controller$rota";

if (class_exists(class: $class)) {
    $obj = new $class;
} else {
    die("erro 404:3");
}

if (method_exists(object_or_class: $obj, method: $acao)) {
    $obj->$acao();
} else {
    die("erro 404:4");
}
