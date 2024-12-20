<?php
function renderContactButton($language)
{
    $buttonText = ($language === "DE") ? "Kontakt" : "Contact Us";

    if (strpos($_SERVER['REQUEST_URI'], "contact") !== false) {
        return;
    }

    echo '
    <div class="contact-button" onclick="window.location.href=\'/contact\'">
        ' . htmlspecialchars($buttonText) . '
    </div>';
}
?>