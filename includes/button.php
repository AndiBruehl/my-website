<?php

function renderButton($language)
{
    $buttonTexts = ($language === 'EN')
        ? ['software' => 'Software Development', 'app' => 'App Development']
        : ['software' => 'Software Entwicklung', 'app' => 'App Entwicklung'];

    echo '<div class="button-container">';

    echo '<a href="/saas" style="text-decoration: none;">';
    echo '<button class="custom-button">' . htmlspecialchars($buttonTexts['software']) . '</button>';
    echo '</a>';

    echo '<a href="/allinone" style="text-decoration: none;">';
    echo '<button class="custom-button">' . htmlspecialchars($buttonTexts['app']) . '</button>';
    echo '</a>';

    echo '</div>';
}
?>