<?php
function renderDropdownMenu($section)
{
    $headerData = include(__DIR__ . '/languages/headerData.php');
    $language = isset($_GET['lang']) ? $_GET['lang'] : 'DE';

    $dropdownItems = $headerData[$language][$section] ?? [];

    if (!empty($dropdownItems)) {
        echo '<div class="dropdown-content">';
        foreach ($dropdownItems as $item) {
            echo '<a href="' . $item['href'] . '">';
            echo '<h4>' . $item['name'] . '</h4>';
            echo '<p>' . $item['description'] . '</p>';
            echo '</a>';
        }
        echo '</div>';
    }
}
?>