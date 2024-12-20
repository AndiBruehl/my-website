<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$lang = isset($_GET['lang']) ? strtoupper($_GET['lang']) : (isset($_SESSION['lang']) ? $_SESSION['lang'] : 'DE');

if (!in_array($lang, ['DE', 'EN'])) {
    $lang = 'DE';
}

$_SESSION['lang'] = $lang;

$secaasData = include __DIR__ . '/../includes/languages/secaasData.php';
$data = $secaasData[$lang] ?? [];

include_once __DIR__ . '/../includes/header.php';
include_once __DIR__ . '/../includes/ContactButton.php';
include_once __DIR__ . '/../includes/footer.php';
?>
<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data['title'] ?? 'SecaaS'; ?></title>
    <link rel="stylesheet" href="/assets/css/main.css">
    <script src="/assets/js/fadein.js"></script>
</head>

<body>
    <?php renderHeader($lang); ?>
    <?php renderContactButton($lang); ?>

    <div class="secaas-root">
        <!-- Header Section -->
        <header class="secaas-header  ">
            <h1><?php echo $data['title'] ?? ''; ?></h1>
            <img src="/assets/images/secaas/headerImg.png" alt="SecaaS Header"
                style="width: 100%; height: auto; border-radius: 10px" />
        </header>

        <!-- Info Section -->
        <div class="secaas-info  ">
            <h2><?php echo $data['infoHeading'] ?? ''; ?></h2>
            <p><?php echo $data['infoText'] ?? ''; ?></p>
        </div>

        <!-- ISO Section -->
        <div class="isoSection  ">
            <h3><?php echo $data['isoHeading'] ?? ''; ?></h3>
            <div class="isoSection1">
                <img src="/assets/images/secaas/iso.png" alt="ISO Standard" class="isoImg" />
                <p class="isoText">
                    <?php echo $data['isoText1'] ?? ''; ?><strong><?php echo $data['isoText11'] ?? ''; ?></strong>
                    <?php echo $data['isoText12'] ?? ''; ?><strong><?php echo $data['isoText13'] ?? ''; ?></strong>
                    <?php echo $data['isoText14'] ?? ''; ?>
                </p>
            </div>
            <p><?php echo $data['isoText2'] ?? ''; ?></p>
        </div>

        <!-- Service Section -->
        <div class="secaas-services  ">
            <h2><?php echo $data['serviceText1'] ?? ''; ?></h2>
            <ul>
                <?php foreach ($data['serviceList'] as $item): ?>
                    <li>
                        <strong><?php echo $item['bold'] ?? ''; ?>:</strong> <?php echo $item['text'] ?? ''; ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>

        <!-- Call to Action Section -->
        <div class="call-to-action">
            <img src="<?php echo $data['c2a'] ?? 'missing image'; ?>" alt="Call to Action" />
        </div>

        <!-- Pricing Section -->
        <div class="secaas-pricing  ">
            <h2><?php echo $data['pricingHeading'] ?? ''; ?></h2>
            <ul>
                <?php foreach ($data['pricingList'] as $item): ?>
                    <li>
                        <strong><?php echo $item['bold'] ?? ''; ?>:</strong> <?php echo $item['text'] ?? ''; ?>
                        <strong><?php echo $item['bold1'] ?? ''; ?></strong> <?php echo $item['text1'] ?? ''; ?>
                    </li>
                <?php endforeach; ?>
            </ul>
            <h3><?php echo $data['pricingConclusion'] ?? ''; ?></h3>
            <h4><?php echo $data['pricingText'] ?? ''; ?></h4>
        </div>
        <div class="footer-link-wrapper-1">
            <a href="/Vulnerability" class="footer-link-1" style="padding-top: 5rem !important">
                <?php echo $lang === 'DE' ? 'Vulnerabilityscans' : 'VulnerabilityScans'; ?>
                <img src="/assets/images/arrowRight.png" alt="right" class="footer-icon">
            </a>
        </div>

    </div>

    <?php renderFooter($lang); ?>
</body>

</html>