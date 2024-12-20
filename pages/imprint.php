<?php
include_once __DIR__ . '/../includes/LanguageContext.php';
include_once __DIR__ . '/../includes/ContactButton.php';
include_once __DIR__ . '/../includes/header.php';
include_once __DIR__ . '/../includes/footer.php';

if (isset($_GET['lang']) && in_array($_GET['lang'], ['DE', 'EN'])) {
    $_SESSION['language'] = $_GET['lang'];
}

$language = isset($_SESSION['language']) ? $_SESSION['language'] : 'DE';

$imprintData = include __DIR__ . '/../includes/languages/imprintData.php';
?>
<!DOCTYPE html>
<html lang="<?php echo $language; ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $language === 'DE' ? 'Impressum' : 'Imprint'; ?></title>
    <link rel="stylesheet" href="/assets/css/main.css">

    <style>
        . {
            opacity: 0;
            transform: translateY(10px);
            animation: fadeInEffect 0.8s ease-out forwards;
        }

        @keyframes fadeInEffect {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>
    <?php renderHeader($language); ?>
    <?php renderContactButton($language); ?>

    <div class="imprint-root  ">
        <header class="imprint-header">
            <h1><?php echo $language === 'DE' ? 'Impressum' : 'Imprint'; ?></h1>
        </header>
        <div class="imprint-container  ">
            <div class="imprint-content  ">
                <?php foreach ($imprintData[$language]['content'] as $line): ?>
                    <p><?php echo $line; ?></p>
                <?php endforeach; ?>
            </div>
        </div>
        <footer class="imprint-footer  ">
            <div class="footer-link-wrapper">
                <a href="<?php echo $imprintData[$language]['links'][0]['url']; ?>" class="footer-link">
                    <img src="/assets/images/arrowLeft.png" alt="Left Arrow" class="footer-icon">
                    <?php echo $imprintData[$language]['links'][0]['text']; ?>
                </a>
            </div>
            <div class="footer-link-wrapper">
                <a href="<?php echo $imprintData[$language]['links'][1]['url']; ?>" class="footer-link">
                    <?php echo $imprintData[$language]['links'][1]['text']; ?>
                    <img src="/assets/images/arrowRight.png" alt="Right Arrow" class="footer-icon">
                </a>
            </div>
        </footer>
    </div>

    <?php renderFooter($language); ?>
</body>

</html>