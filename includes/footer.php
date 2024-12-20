<?php
include_once __DIR__ . '/LanguageContext.php';
include_once __DIR__ . '/languages/footerData.php';

function renderFooter($language)
{
    global $footerData;

    if (!isset($footerData[$language])) {
        $language = 'DE';
    }

    $langData = $footerData[$language];

    echo '<footer>';
    echo '<div class="footer-container">';
    echo '<div class="footer-border"></div>';

    echo '<div class="footer-row">';

    echo '<div class="footer-column">';
    if (isset($langData['company'])) {
        echo '<div class="footer-section">';
        echo '<h3>' . htmlspecialchars($langData['headings']['title'] ?? '') . '</h3>';
        echo '<ul>';
        foreach ($langData['links']['main'] as $legalLink) {
            echo '<li><a href="' . htmlspecialchars($legalLink['path'] ?? '') . '">' . htmlspecialchars($legalLink['text'] ?? '') . '</a></li>';
        }
        echo '</ul>';
        echo '</div>';
    }
    if (isset($langData['services']) && is_array($langData['services'])) {
        echo '<div class="footer-section">';
        echo '<h3>' . htmlspecialchars($langData['headings']['ourServices'] ?? '') . '</h3>';
        echo '<ul>';
        foreach ($langData['services'] as $service) {
            echo '<li><a href="' . htmlspecialchars($service['path'] ?? '') . '">' . htmlspecialchars($service['text'] ?? '') . '</a></li>';
        }
        echo '</ul>';
        echo '</div>';
    }
    echo '</div>';

    echo '<div class="footer-column">';
    if (isset($langData['socialMedia']) && is_array($langData['socialMedia'])) {
        echo '<div class="footer-section">';
        echo '<h3>' . htmlspecialchars($langData['headings']['socialMedia'] ?? '') . '</h3>';
        echo '<ul>';
        foreach ($langData['socialMedia'] as $social) {
            echo '<li>';
            echo '<a href="' . htmlspecialchars($social['path'] ?? '') . '" target="_blank" rel="noopener">';
            echo '<img class="svg-icon" src="' . htmlspecialchars($social['icon'] ?? '') . '" alt="' . htmlspecialchars($social['name'] ?? '') . '" class="social-icon">';
            echo ' ' . htmlspecialchars($social['name'] ?? '');
            echo '</a>';
            echo '</li>';
        }
        echo '</ul>';
        echo '</div>';
    }
    if (isset($langData['links']['legal']) && is_array($langData['links']['legal'])) {
        echo '<div class="footer-section">';
        echo '<h3>' . htmlspecialchars($langData['headings']['legal'] ?? '') . '</h3>';
        echo '<ul>';
        foreach ($langData['links']['legal'] as $legalLink) {
            echo '<li><a href="' . htmlspecialchars($legalLink['path'] ?? '') . '">' . htmlspecialchars($legalLink['text'] ?? '') . '</a></li>';
        }
        echo '</ul>';
        echo '</div>';
    }
    echo '</div>';

    echo '<div class="footer-column">';
    echo '<div class="footer-section">';
    echo '<h3>' . htmlspecialchars($langData['headings']['contact'] ?? '') . '</h3>';
    echo '<p>' . htmlspecialchars($langData['company']['name'] ?? '') . '</p>';
    echo '<p>' . htmlspecialchars($langData['company']['address'] ?? '') . '</p>';
    echo '<p>';
    echo '    <img';
    echo '        alt="phone"';
    echo '        src="https://www.svgrepo.com/show/478249/telephone-receiver-material.svg"';
    echo '        class="svg-icon"';
    echo '    />';
    echo '    <a href="tel:' . htmlspecialchars($langData['company']['phone'] ?? '') . '">' . htmlspecialchars($langData['company']['phone'] ?? '') . '</a>';
    echo '</p>';
    echo '<p>';
    echo '    <img';
    echo '        alt="email"';
    echo '        src="https://www.svgrepo.com/show/522169/mail.svg"';
    echo '        class="svg-icon"';
    echo '    />';
    echo '    <a href="mailto:' . htmlspecialchars($langData['company']['email'] ?? '') . '">' . htmlspecialchars($langData['company']['email'] ?? '') . '</a>';
    echo '</p>';
    echo '<p>';
    echo '    <a href="/contact">Kontaktformular</a>';
    echo '</p>';
    echo '</div>';
    echo '</div>';

    echo '</div>';

    echo '</div>';
    echo '<div class="copyright-section">Copyright © 2024 Missing Gear Solutions GmbH</div>';
    echo '</footer>';
    echo '<link rel="stylesheet" href="/assets/css/main.css">';
}
?>