<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$lang = isset($_GET['lang']) ? strtoupper($_GET['lang']) : (isset($_SESSION['lang']) ? $_SESSION['lang'] : 'DE');

if (!in_array($lang, ['DE', 'EN'])) {
    $lang = 'DE';
}

$_SESSION['lang'] = $lang;

$faceAgeData = include __DIR__ . '/../includes/languages/faceAgeData.php';
$content = $faceAgeData[$lang] ?? [];

include_once __DIR__ . '/../includes/header.php';
include_once __DIR__ . '/../includes/footer.php';
?>

<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $content['FaceAgeTitle'] ?? 'FaceAge'; ?></title>
    <link rel="stylesheet" href="/assets/css/main.css">

    <style>
        . {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 1s ease, transform 1s ease;
        }

        . .visible {
            opacity: 1;
            transform: translateY(0);
        }
    </style>

    <script src="/assets/js/animationFadeIn.js" defer></script>
</head>

<body>
    <?php renderHeader($lang); ?>

    <div class="FaceAge-root  ">
        <header class="FaceAge-header  ">
            <h1><?php echo $content['FaceAgeTitle'] ?? ''; ?></h1>
        </header>

        <div class="FaceAge-header-div">
            <img src="/assets/images/faceage/headerImg.png" alt="Header Image" class="FaceAge-header-img">

            <div class="FaceAge-section FaceAge-section1  " style="margin: 5%;">
                <div class="FaceAge-section1-img  ">
                    <img src="/assets/images/faceage/FaceAge.png" alt="FaceAge Logo">
                </div>
                <div class="FaceAge-section-txt  ">
                    <h2><?php echo $content['FaceAgeText'][0] ?? ''; ?></h2>
                    <?php foreach ($content['FaceAgeText1'] as $paragraph): ?>
                        <h4><?php echo $paragraph; ?></h4>
                    <?php endforeach; ?>
                    <h3><?php echo $content['FaceAgeHeading1'] ?? ''; ?></h3>
                </div>
            </div>

            <?php for ($i = 2; $i <= 7; $i++): ?>
                <div class="FaceAge-section  " style="text-align: left !important">
                    <h2><?php echo $content['FaceAgeHeading' . $i] ?? ''; ?></h2>
                    <?php foreach ($content['FaceAgeText' . $i + 1] as $paragraph): ?>
                        <h4><?php echo $paragraph; ?></h4>
                    <?php endforeach; ?>
                </div>
            <?php endfor; ?>

            <div class="FaceAge-footer">
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

    <?php renderFooter($lang); ?>
</body>

</html>