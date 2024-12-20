<?php
function renderLanguageDropdown($currentLanguage)
{
    $languages = [
        'DE' => [
            'name' => 'Deutsch',
            'flag' => '/assets/images/de-flag.png',
            'url' => '?lang=DE',
        ],
        'EN' => [
            'name' => 'English',
            'flag' => '/assets/images/en-flag.png',
            'url' => '?lang=EN',
        ],
    ];

    echo '<div class="languageContainer">';
    echo '<button class="languageButton">';
    echo '<img src="' . $languages[$currentLanguage]['flag'] . '" alt="' . $languages[$currentLanguage]['name'] . '" class="flagImage">';
    echo '<span class="dropdownArrow"></span>';
    echo '</button>';
    echo '<ul class="dropdownLanguageMenu">';
    foreach ($languages as $lang => $details) {
        echo '<li  class="languageUrl">';
        echo '<a href="' . $details['url'] . '">';
        echo '<img src="' . $details['flag'] . '" alt="' . $details['name'] . '" class="flagImage">';
        echo $details['name'];
        echo '</a>';
        echo '</li>';
    }
    echo '</ul>';
    echo '</div>';
}
?>