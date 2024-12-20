<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$lang = isset($_GET['lang']) ? strtoupper($_GET['lang']) : (isset($_SESSION['lang']) ? $_SESSION['lang'] : 'DE');

if (!in_array($lang, ['DE', 'EN'])) {
    $lang = 'DE';
}

$_SESSION['lang'] = $lang;

$veriBillData = include __DIR__ . '/../includes/languages/veriBillData.php';
$content = $veriBillData[$lang] ?? [];

include_once __DIR__ . '/../includes/header.php';
include_once __DIR__ . '/../includes/footer.php';
?>

<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $content['VeriBillTitle'] ?? 'VeriBill'; ?></title>
    <link rel="stylesheet" href="/assets/css/main.css">
    <script src="/assets/js/animationFadeIn.js" defer></script>
</head>

<body>
    <?php renderHeader($lang); ?>

    <div class="VeriBill-root  ">
        <header class="VeriBill-header  ">
            <h1><?php echo $content['VeriBillTitle'] ?? ''; ?></h1>
        </header>

        <!-- Main Content Section -->
        <div>
            <img src="<?php echo $content['headerImg']; ?>" alt="Header Image" class="VeriBill-header-img  ">
            <div class="VeriBill-main">
                <!-- VeriBill Section -->
                <div class="VeriBill-section  ">
                    <img src="/assets/images/VeriBill/VeriBill.png" alt="VeriBill" class="VeriBill-image">
                    <div>
                        <?php foreach ($content['VeriBillText1'] as $paragraph): ?>
                            <h4><?php echo $paragraph; ?></h4>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="Veribill-section2  ">
                    <!-- Additional Sections -->
                    <?php for ($i = 1; $i <= 6; $i++): ?>
                        <div class="VeriBill-section-text  ">
                            <h2><?php echo $content['VeriBillHeading' . $i] ?? ''; ?></h2>
                        </div>
                        <div class="VeriBill-section-text  ">
                            <?php foreach ($content['VeriBillText' . $i + 1] as $paragraph): ?>
                                <h4><?php echo $paragraph; ?></h4>
                            <?php endforeach; ?>
                        </div>
                    <?php endfor; ?>
                </div>
                <!-- Footer Links -->
                <div class="VeriBill-footer  ">
                    <div class="footer-link-wrapper">
                        <a href="<?php echo $content['links'][0]['url']; ?>" class="footer-link">
                            <img src="/assets/images/arrowLeft.png" alt="Left Arrow" class="footer-icon">
                            <?php echo $content['links'][0]['text']; ?>
                        </a>
                    </div>
                    <div class="footer-link-wrapper">
                        <a href="<?php echo $content['links'][1]['url']; ?>" class="footer-link">
                            <?php echo $content['links'][1]['text']; ?>
                            <img src="/assets/images/arrowRight.png" alt="Right Arrow" class="footer-icon">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php renderFooter($lang); ?>
</body>

</html>