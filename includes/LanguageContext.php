<?php
function loadLanguageFile($language)
{
    $filePath = __DIR__ . '/languages/languages.php';

    if (!file_exists($filePath)) {
        throw new Exception("Sprachdatei nicht gefunden: $filePath");
    }

    $languages = include $filePath;

    return $languages[$language] ?? $languages['DE'];
}

function getCurrentLanguage()
{
    return isset($_GET['lang']) ? strtoupper($_GET['lang']) : 'DE';
}
?>