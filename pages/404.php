<?php
include_once __DIR__ . '/../includes/LanguageContext.php';
include_once __DIR__ . '/../includes/ContactButton.php';
include_once __DIR__ . '/../includes/header.php';
include_once __DIR__ . '/../includes/footer.php';

$language = getCurrentLanguage();
$langData = loadLanguageFile($language);
?>
<!DOCTYPE html>
<html lang="<?php echo $language; ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Seite nicht gefunden</title>
    <link rel="stylesheet" href="/assets/css/main.css">
</head>

<body>
    <?php renderHeader($language); ?>
    <?php renderContactButton($language); ?>
    <div class=" "
        style="display: flex; flex-direction: column; align-items: center; justify-content: center; height: 45vh; text-align: center;">
        <h1>404 - <?php echo $language === 'DE' ? 'Seite nicht gefunden' : 'Page not found'; ?></h1>
        <a href="/?lang=<?php echo $language; ?>" style="margin-top: 1rem; font-size: 1.5rem; color: #e74c3c;">
            <?php echo $language === 'DE' ? 'Zurück zur Startseite' : 'Back to Homepage'; ?>
        </a>
    </div>
    <?php renderFooter($language); ?>
    <script src="/assets/js/animationFadeIn.js"></script>
</body>

</html>