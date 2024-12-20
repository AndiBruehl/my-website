<?php
session_start();

$lang = isset($_GET['lang']) ? strtoupper($_GET['lang']) : (isset($_SESSION['lang']) ? $_SESSION['lang'] : 'DE');

if (!in_array($lang, ['DE', 'EN'])) {
    $lang = 'DE';
}


$_SESSION['lang'] = $lang;


$requestUri = explode('?', $_SERVER['REQUEST_URI'], 2);
$page = trim($requestUri[0], '/');


$pagesDir = __DIR__ . '/pages/';


$pageFile = $pagesDir . ($page === '' ? 'home' : $page) . '.php';


if (file_exists($pageFile)) {
    include_once $pageFile;
} else {
    include_once $pagesDir . '404.php';
}


?>