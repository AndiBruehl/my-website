<?php
include_once __DIR__ . '/LanguageContext.php';
include_once __DIR__ . '/languageDropdown.php';
include_once __DIR__ . '/DropdownMenu.php';
include_once __DIR__ . '/hamburger.php';


function renderHeader($language)
{
    $lang = loadLanguageFile($language);

    echo '<!DOCTYPE html>';
    echo '<html lang="' . htmlspecialchars($language) . '">';
    echo '<head>';
    echo '<meta charset="UTF-8">';
    echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
    echo '<title>Missing Gear Solutions</title>';
    echo '<link rel="stylesheet" href="/assets/css/main.css">';
    echo '<link rel="icon" href="/assets/images/favicon/favicon.ico" type="image/x-icon">';
    echo '<script src="/assets/js/dropdown.js" defer></script>';
    echo '</head>';
    echo '<body>';

    echo '<header class="NavBar">';
    echo '<div class="leftCorner">';
    echo '<a href="/?lang=' . htmlspecialchars($language) . '" class="mgsLogo">';
    echo '<img src="/assets/images/mgsLogo.png" alt="Missing Gear Solutions">';
    echo '</a>';

    echo '<div class="DesktopNavigationContainer">';
    echo '<nav class="Navigation">';

    echo '<a href="/about?lang=' . htmlspecialchars($language) . '" class="dropdown-link">' . htmlspecialchars($lang['navigation_about'] ?? 'Über uns') . '</a>';
    echo '<div class="dropdown-container">';
    renderDropdownMenu('ÜBER UNS');
    echo '</div>';

    echo '<a href="/development?lang=' . htmlspecialchars($language) . '" class="dropdown-link">' . htmlspecialchars($lang['navigation_development'] ?? 'Entwicklung') . '</a>';
    echo '<div class="dropdown-container">';
    renderDropdownMenu('ENTWICKLUNG');
    echo '</div>';

    echo '<a href="/consulting?lang=' . htmlspecialchars($language) . '">' . htmlspecialchars($lang['navigation_consulting'] ?? 'Beratung') . '</a>';

    echo '<a href="/services?lang=' . htmlspecialchars($language) . '" class="dropdown-link">' . htmlspecialchars($lang['navigation_services'] ?? 'Leistungen') . '</a>';
    echo '<div class="dropdown-container">';
    renderDropdownMenu('LEISTUNGEN');
    echo '</div>';

    echo '<a href="/blog?lang=' . htmlspecialchars($language) . '">' . htmlspecialchars($lang['navigation_blog'] ?? 'Blog') . '</a>';
    echo '</nav>';
    echo '</div>';
    echo '</div>';

    echo '<div class="rightCorner" style="display:flex, flex-direction: row, justify-content: space-evenly padding-right: 5% ">';

    echo '<div class="LanguageContainer" style="max-width: 50%">';
    renderLanguageDropdown($language);
    echo '</div>';

    echo '<div class="MobileNavigationContainer" style="max-width: 50%">';
    renderLanguageDropdown($language);
    echo '</div>';

    echo '<div class="MobileNavigationContainer" style="max-width: 50%">';
    renderHamburger($language);
    echo '</div>';

    echo '</div>';
    echo '</header>';
}
?>