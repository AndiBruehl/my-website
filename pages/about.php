<?php
include_once __DIR__ . '/../includes/LanguageContext.php';
include_once __DIR__ . '/../includes/ContactButton.php';
include_once __DIR__ . '/../includes/languages/aboutData.php';
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
    <title><?php echo htmlspecialchars($langData['navigation_about']); ?></title>
    <link rel="stylesheet" href="/assets/css/main.css">
</head>

<body>
    <?php renderHeader($language); ?>
    <?php renderContactButton($language); ?>
    <div class="about">
        <header class="page-header  ">
            <h1><?php echo htmlspecialchars($aboutData['headerTitle']); ?></h1>
        </header>

        <div class="section first-section">
            <div class="logo">
                <img src="<?php echo htmlspecialchars($aboutImageData['mgsLogo']); ?>" alt="MGS Logo" />
            </div>
            <div class="text   ">
                <p style="font-size: 1.75rem"><?php echo nl2br(htmlspecialchars($aboutData['firstSection'])); ?></p>
            </div>
        </div>

        <div class="section second-section">
            <div class="text   ">
                <p style="font-size: 2rem"><?php echo nl2br(htmlspecialchars($aboutData['secondSection'])); ?></p>
            </div>
            <div class="image   ">
                <img src="<?php echo htmlspecialchars($aboutImageData['portrait']); ?>" alt="Portrait Image" />
            </div>
        </div>

        <div class="section team-section   ">
            <h2><?php echo htmlspecialchars($aboutData['team']); ?></h2>
            <div class="cards  ">
                <?php foreach ($aboutImageData['cards'] as $card): ?>
                    <div class="card  ">
                        <img src="<?php echo htmlspecialchars($card); ?>" alt="Team Card" class="card-img" />
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <footer>
            <img src="<?php echo htmlspecialchars($aboutData['footer']); ?>" alt="Footer Image" class="footer-image" />
        </footer>
    </div>

    <?php renderFooter($language); ?>

    <script src="/assets/js/animationFadeIn.js"></script>

</body>

</html>