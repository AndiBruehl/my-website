<?php
include_once __DIR__ . '/../includes/LanguageContext.php';
include_once __DIR__ . '/../includes/ContactButton.php';
include_once __DIR__ . '/../includes/header.php';
include_once __DIR__ . '/../includes/footer.php';

if (isset($_GET['lang']) && in_array($_GET['lang'], ['DE', 'EN'])) {
    $_SESSION['language'] = $_GET['lang'];
}

$language = isset($_SESSION['language']) ? $_SESSION['language'] : 'DE';

$consultingData = include __DIR__ . '/../includes/languages/consultingData.php';

$footerImage = $language === 'DE' ? '/assets/images/consulting/FooterDE.png' : '/assets/images/consulting/FooterENG.png';
?>
<!DOCTYPE html>
<html lang="<?php echo $language; ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $language === 'DE' ? 'Beratung' : 'Consulting'; ?></title>
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

        .consulting-list li {
            margin-bottom: 1rem;
            line-height: 1.6;
        }

        .consulting-list li strong {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <?php renderHeader($language); ?>
    <?php renderContactButton($language); ?>

    <div class="consulting-root  ">
        <header class="consulting-header">
            <h1><?php echo $consultingData[$language]['title']; ?></h1>
            <img src="/assets/images/consulting/headerImg.png" alt="Consulting Header"
                style="width: 100%; height: auto;" />
        </header>

        <div class="consulting-container  ">
            <div class="consulting-content">
                <h2><?php echo $consultingData[$language]['consultingTitle']; ?></h2>
                <?php foreach ($consultingData[$language]['consultingText1'] as $paragraph): ?>
                    <p><?php echo htmlspecialchars_decode($paragraph); ?></p>
                <?php endforeach; ?>

                <ul class="consulting-list">
                    <?php foreach ($consultingData[$language]['consultingList'] as $item): ?>
                        <li>
                            <strong><?php echo htmlspecialchars_decode($item['bold']); ?>:</strong>
                            <?php echo $item['text']; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <div class="consulting-image">
                <img src="/assets/images/consulting/cube.png" alt="Consulting Cube" />
            </div>
        </div>

        <div class="pricing-section  ">
            <h2><?php echo $consultingData[$language]['pricingTitle']; ?></h2>
            <?php foreach ($consultingData[$language]['pricingText1'] as $paragraph): ?>
                <p><?php echo htmlspecialchars_decode($paragraph); ?></p>
            <?php endforeach; ?>

            <ul class="consulting-list">
                <?php foreach ($consultingData[$language]['pricingList'] as $item): ?>
                    <li>
                        <strong><?php echo htmlspecialchars_decode($item['bold']); ?>:</strong>
                        <?php echo $item['text']; ?>
                    </li>
                <?php endforeach; ?>
            </ul>

            <h2><?php echo htmlspecialchars_decode($consultingData[$language]['pricingText2']); ?></h2>
            <p><?php echo $consultingData[$language]['pricingText3']; ?></p>
        </div>

        <div class="call-to-action  ">
            <img src="<?php echo $footerImage; ?>" alt="Footer Call to Action" style="width: 100%; height: auto;" />
        </div>
    </div>

    <?php renderFooter($language); ?>
</body>

</html>