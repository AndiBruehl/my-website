<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$lang = isset($_GET['lang']) ? strtoupper($_GET['lang']) : (isset($_SESSION['lang']) ? $_SESSION['lang'] : 'DE');

if (!in_array($lang, ['DE', 'EN'])) {
    $lang = 'DE';
}

$_SESSION['lang'] = $lang;

$allInOneData = include __DIR__ . '/../includes/languages/allInOneData.php';
$content = $allInOneData[$lang] ?? [];

include_once __DIR__ . '/../includes/header.php';
include_once __DIR__ . '/../includes/footer.php';
?>

<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $content['title'] ?? 'All In One'; ?></title>
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

    <div class="AllInOne-root  ">
        <header class="AllInOne-header  ">
            <h1><?php echo $content['title'] ?? ''; ?></h1>
        </header>

        <div>
            <img src="/assets/images/allinone/headerImg.png" alt="Header Image"
                style="width: 100%; max-width: 100vw;             border-radius: 10px;" class=" ">

            <div class="AllInOne-section  AllInOne-MainSection" style="margin: 5%;">
                <h2><?php echo $content['AllInOneHeading'] ?? ''; ?></h2>
                <?php foreach ($content['AllInOneText'] as $paragraph): ?>
                    <p><?php echo $paragraph; ?></p>
                <?php endforeach; ?>

                <h3><?php echo $content['AllInOneSubHeading'] ?? ''; ?></h3>

                <div style="margin: 1.5rem; padding-left: 5%;">
                    <h4><?php echo $content['AllInOneSubHeadingListHeading1'] ?? ''; ?></h4>
                    <?php foreach ($content['AllInOneSubHeadingListHeading1List'] as $paragraph): ?>
                        <p><?php echo $paragraph; ?></p>
                    <?php endforeach; ?>
                </div>

                <div style="margin: 1.5rem; padding-left: 5%;">
                    <h4><?php echo $content['AllInOneSubHeadingListHeading2'] ?? ''; ?></h4>
                    <?php foreach ($content['AllInOneSubHeadingListHeading2List'] as $paragraph): ?>
                        <p><?php echo $paragraph; ?></p>
                    <?php endforeach; ?>
                </div>
            </div>

            <?php for ($i = 1; $i <= 6; $i++): ?>
                <div class="AllInOne-section  " style="margin: 5%;">
                    <div style="display: flex; align-items: flex-start; max-width: 100%;">
                        <?php if ($i % 2 !== 0): ?>
                            <img src="/assets/images/allinone/aio<?php echo $i; ?>.png" alt="aio<?php echo $i; ?>"
                                style="max-width: 50%; margin-right: 5%;" class=" ">
                        <?php endif; ?>

                        <div>
                            <h2><?php echo $content['AllInOneHeading' . $i] ?? ''; ?></h2>
                            <?php foreach ($content['AllInOneText' . $i] as $paragraph): ?>
                                <p><?php echo $paragraph; ?></p>
                            <?php endforeach; ?>
                            <?php if (isset($content['AllInOneText' . $i . 'List'])): ?>
                                <?php foreach ($content['AllInOneText' . $i . 'List'] as $listItem): ?>
                                    <p><?php echo $listItem; ?></p>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>

                        <?php if ($i % 2 === 0): ?>
                            <img src="/assets/images/allinone/aio<?php echo $i; ?>.png" alt="aio<?php echo $i; ?>"
                                style="max-width: 50%; margin-left: 5%;" class=" ">
                        <?php endif; ?>
                    </div>
                </div>
            <?php endfor; ?>

            <div class="callToAction  ">
                <h2><?php echo $content['callToAction'] ?? ''; ?></h2>
                <img src="<?php echo $content['c2a']; ?>" alt="Call to Action" class="c2aImg">
            </div>
        </div>
    </div>

    <?php renderFooter($lang); ?>
</body>

</html>