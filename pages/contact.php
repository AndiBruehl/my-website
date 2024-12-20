<?php

$language = isset($_GET['lang']) ? strtoupper($_GET['lang']) : (isset($_SESSION['lang']) ? $_SESSION['lang'] : 'DE');

$supportedLanguages = ['DE', 'EN'];
if (!in_array($language, $supportedLanguages)) {
    $language = 'DE';
}

$_SESSION['lang'] = $language;

include_once __DIR__ . '/../includes/languages/contactData.php';
$langData = ($language === 'EN') ? $contactDataENG : $contactDataDE;

$formLabels = $langData['formLabels'] ?? [];
$navigationContact = $langData['navigation_contact'] ?? 'Kontakt';

$formLabels = array_merge([
    'name' => 'Name',
    'companyName' => 'Firma',
    'email' => 'E-Mail',
    'phone' => 'Telefon',
    'message' => 'Nachricht',
    'acceptTerms' => 'Ich akzeptiere die',
    'terms' => 'Bedingungen',
    'privacy' => 'Datenschutzrichtlinie',
    'and' => 'und',
    'submit' => 'Senden',
    'termsLink' => '#',
    'privacyLink' => '#',
], $formLabels);

include_once __DIR__ . '/../includes/LanguageContext.php';
include_once __DIR__ . '/../includes/ContactButton.php';
include_once __DIR__ . '/../includes/header.php';
include_once __DIR__ . '/../includes/footer.php';
?>

<!DOCTYPE html>
<html lang="<?php echo htmlspecialchars(strtolower($language), ENT_QUOTES, 'UTF-8'); ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($navigationContact, ENT_QUOTES, 'UTF-8'); ?></title>
    <link rel="stylesheet" href="/assets/css/main.css">
</head>

<body>
    <?php renderHeader($language); ?>
    <?php renderContactButton($language); ?>
    <div class="contact-form-container  ">
        <div class="contact-form-header">
            <h1><?php echo htmlspecialchars($navigationContact, ENT_QUOTES, 'UTF-8'); ?></h1>
            <p><?php echo htmlspecialchars($langData['home_description'] ?? '', ENT_QUOTES, 'UTF-8'); ?></p>
        </div>
        <div class="contact-main-container">
            <div class="contact-main-info   ">
                <?php
                if (isset($langData['content']) && is_array($langData['content'])) {
                    foreach ($langData['content'] as $content) {
                        echo $content;
                    }
                } else {
                    echo "<p>Inhalte sind derzeit nicht verfügbar.</p>";
                }
                ?>
            </div>
            <div class="contact-form   ">
                <form action="contact.php" method="POST">
                    <div class="form-group">
                        <label
                            for="name"><?php echo htmlspecialchars($formLabels['name'], ENT_QUOTES, 'UTF-8'); ?></label>
                        <input type="text" name="name" id="name" required class="form-input">
                    </div>

                    <div class="form-group">
                        <label
                            for="company"><?php echo htmlspecialchars($formLabels['companyName'], ENT_QUOTES, 'UTF-8'); ?></label>
                        <input type="text" name="accountName" id="company" required class="form-input">
                    </div>

                    <div class="form-group">
                        <label
                            for="email"><?php echo htmlspecialchars($formLabels['email'], ENT_QUOTES, 'UTF-8'); ?></label>
                        <input type="email" name="user_email" id="email" required class="form-input">
                    </div>

                    <div class="form-group">
                        <label
                            for="phone"><?php echo htmlspecialchars($formLabels['phone'], ENT_QUOTES, 'UTF-8'); ?></label>
                        <input type="text" name="phone" id="phone" class="form-input">
                    </div>

                    <div class="form-group">
                        <label
                            for="message"><?php echo htmlspecialchars($formLabels['message'], ENT_QUOTES, 'UTF-8'); ?></label>
                        <textarea name="message" id="message" required class="form-textarea"></textarea>
                    </div>

                    <div class="form-group">
                        <input type="checkbox" name="terms" id="terms" required>
                        <label for="terms">
                            <?php echo htmlspecialchars($formLabels['acceptTerms'], ENT_QUOTES, 'UTF-8'); ?>
                            <a href="<?php echo htmlspecialchars($formLabels['termsLink'], ENT_QUOTES, 'UTF-8'); ?>"
                                target="_blank"><?php echo htmlspecialchars($formLabels['terms'], ENT_QUOTES, 'UTF-8'); ?></a>
                            <?php echo htmlspecialchars($formLabels['and'], ENT_QUOTES, 'UTF-8'); ?>
                            <a href="<?php echo htmlspecialchars($formLabels['privacyLink'], ENT_QUOTES, 'UTF-8'); ?>"
                                target="_blank"><?php echo htmlspecialchars($formLabels['privacy'], ENT_QUOTES, 'UTF-8'); ?></a>
                        </label>
                    </div>

                    <div class="form-group">
                        <input type="submit"
                            value="<?php echo htmlspecialchars($formLabels['submit'], ENT_QUOTES, 'UTF-8'); ?>"
                            class="form-submit">
                    </div>
                </form>

                <?php
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    include_once __DIR__ . '/../includes/pluginContact.php';
                    $pluginContact = new pluginContact();

                    try {
                        $pluginContact->setSenderName(htmlspecialchars(trim($_POST['name']), ENT_QUOTES, 'UTF-8'));
                        $pluginContact->setSenderCompany(htmlspecialchars(trim($_POST['accountName']), ENT_QUOTES, 'UTF-8'));
                        $pluginContact->setSenderEmail(htmlspecialchars(trim($_POST['user_email']), ENT_QUOTES, 'UTF-8'));
                        $pluginContact->setSenderPhone(htmlspecialchars(trim($_POST['phone']), ENT_QUOTES, 'UTF-8'));
                        $pluginContact->setMessage(htmlspecialchars(trim($_POST['message']), ENT_QUOTES, 'UTF-8'));

                        $pluginContact->beforeAll();
                        echo $pluginContact->frontendMessage();
                    } catch (Exception $e) {
                        echo '<p class="error-message">' . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . '</p>';
                    }
                }
                ?>
            </div>
        </div>
    </div>

    <?php renderFooter($language); ?>

    <script src="/assets/js/animationFadeIn.js"></script>
</body>

</html>