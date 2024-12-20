<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$lang = isset($_GET['lang']) ? strtoupper($_GET['lang']) : (isset($_SESSION['lang']) ? $_SESSION['lang'] : 'DE');

if (!in_array($lang, ['DE', 'EN'])) {
    $lang = 'DE';
}

$_SESSION['lang'] = $lang;

$superVisorData = include __DIR__ . '/../includes/languages/superVisorData.php';
$content = $superVisorData[$lang] ?? [];

include_once __DIR__ . '/../includes/header.php';
include_once __DIR__ . '/../includes/footer.php';
?>

<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $content['SuperVisorTitle'] ?? 'AgentSupervisor'; ?></title>
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

    <div class="SuperVisor-root  ">
        <header class="SuperVisor-header  ">
            <h1><?php echo $content['SuperVisorTitle'] ?? ''; ?></h1>
        </header>

        <!-- Main Content Section -->
        <div>
            <img src="/assets/images/supervisor/headerImg.png" alt="Header Image"
                style="width: 95%; margin-left: 2.5%; margin-bottom: 2%;" class="header-img">

            <!-- SuperVisor Section -->
            <div class="SuperVisor-section SuperVisor-section1  "
                style="margin: 5%; display: flex; align-items: flex-start;">
                <img src="/assets/images/supervisor/SuperVisor.png" alt="SuperVisor Logo"
                    style="width: 25%; margin-right: 5%;" class=" ">
                <div>
                    <?php foreach ($content['SuperVisorText1'] as $paragraph): ?>
                        <p style="font-size: 2rem"><?php echo $paragraph; ?></p>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Dynamic Sections -->
            <?php for ($i = 2; $i <= 3; $i++): ?>
                <div class="SuperVisor-section  " style="margin: 5%;">
                    <h2><?php echo $content['SuperVisorHeading' . $i] ?? ''; ?></h2>
                    <?php foreach ($content['SuperVisorText' . $i + 1] as $paragraph): ?>
                        <h4><?php echo $paragraph; ?></h4>
                    <?php endforeach; ?>
                </div>
            <?php endfor; ?>

            <!-- Footer links with icons -->
            <div class="SuperVisor-footer">
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