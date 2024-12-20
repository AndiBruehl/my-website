<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$lang = isset($_GET['lang']) ? strtoupper($_GET['lang']) : (isset($_SESSION['lang']) ? $_SESSION['lang'] : 'DE');

if (!in_array($lang, ['DE', 'EN'])) {
    $lang = 'DE';
}


$_SESSION['lang'] = $lang;


$privacyData = include __DIR__ . '/../includes/languages/privacyaasData.php';
$data = $privacyData[$lang] ?? [];


include_once __DIR__ . '/../includes/header.php';
include_once __DIR__ . '/../includes/ContactButton.php';
include_once __DIR__ . '/../includes/footer.php';
?>
<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data['title'] ?? 'Privacy AAS'; ?></title>
    <link rel="stylesheet" href="/assets/css/main.css">
</head>

<body>
    <?php renderHeader($lang); ?>
    <?php renderContactButton($lang); ?>

    <div class="privacyaas-root">
        <!-- Header Section -->
        <header class="privacyaas-header">
            <h1><?php echo $data['title'] ?? ''; ?></h1>
            <h2><?php echo $data['title1'] ?? ''; ?></h2>
            <img src="/assets/images/privacyaas/headerImg.png" alt="Consulting Header"
                style="width: 100%; height: auto; border-radius: 10px" />
        </header>

        <!-- First Section -->
        <div class="privacyaas-section">
            <div class="privacyaas-content">
                <img src="/assets/images/privacyaas/shield.png" alt="Shield" class="privacyaas-image" />
                <div class="privacyaas-text">
                    <?php if (isset($data['PrivacyServiceText1'])): ?>
                        <?php foreach ($data['PrivacyServiceText1'] as $text): ?>
                            <?php if (is_array($text)): ?>
                                <h4>
                                    <?php echo $text['text'] ?? ''; ?>
                                    <strong><?php echo $text['bold1'] ?? ''; ?></strong>
                                    <?php echo $text['text1'] ?? ''; ?>
                                </h4>
                            <?php else: ?>
                                <h4><?php echo $text; ?></h4>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>

                    <ul>
                        <?php if (isset($data['PrivacyServiceList1'])): ?>
                            <?php foreach ($data['PrivacyServiceList1'] as $item): ?>
                                <li style="font-size: 1.3rem">
                                    <strong><?php echo $item['bold'] ?? ''; ?></strong>
                                    <?php echo $item['text'] ?? ''; ?>
                                </li>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </ul>
                    <h4><?php echo $data['PrivacyServiceText1Conclusion'] ?? ''; ?></h4>
                </div>
            </div>
        </div>

        <!-- Second Section -->
        <div class="privacyaas-section">
            <div class="privacyaas-content">
                <div class="privacyaas-text">
                    <h2><?php echo $data['PrivacyHeading'] ?? ''; ?></h2>
                    <?php if (isset($data['PrivacyServiceText1'])): ?>
                        <?php foreach ($data['PrivacyServiceText1'] as $text): ?>
                            <?php if (is_array($text)): ?>
                                <h4>
                                    <?php echo $text['text'] ?? ''; ?>
                                    <strong><?php echo $text['bold1'] ?? ''; ?></strong>
                                </h4>
                            <?php else: ?>
                                <h4><?php echo $text; ?></h4>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>


                </div>
                <img src="/assets/images/privacyaas/privacy1.png" alt="Privacy 1" class="privacyaas-image" />
            </div>
        </div>

        <!-- Third Section -->
        <div class="privacyaas-section">
            <div class="privacyaas-content">
                <img src="/assets/images/privacyaas/privacy2.png" alt="Privacy 2" class="privacyaas-image" />
                <div class="privacyaas-text">
                    <h2><?php echo $data['PrivacyHeading1'] ?? ''; ?></h2>
                    <h3><?php echo $data['PrivacyHeading11'] ?? ''; ?></h3>
                    <?php if (isset($data['PrivacyServiceText2'])): ?>
                        <?php foreach ($data['PrivacyServiceText2'] as $text): ?>
                            <h4><?php echo $text; ?></h4>
                        <?php endforeach; ?>
                    <?php endif; ?>

                    <ul>
                        <?php if (isset($data['PrivacyServiceList2'])): ?>
                            <?php foreach ($data['PrivacyServiceList2'] as $item): ?>
                                <li style="font-size: 1.3rem">
                                    <strong><?php echo $item['bold'] ?? ''; ?></strong>
                                    <?php echo $item['text'] ?? ''; ?>
                                </li>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </ul>
                    <?php if (isset($data['PrivacyServiceText21'])): ?>
                        <?php foreach ($data['PrivacyServiceText21'] as $text): ?>
                            <h4><?php echo $text; ?></h4>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- Call to Action Section -->
        <div class="call-to-action">
            <img src="<?php echo $data['c2a'] ?? '/assets/images/privacyaas/default.png'; ?>" alt="Call to Action" />
        </div>

        <!-- Fourth Section -->
        <div class="privacyaas-section">
            <div class="privacyaas-content">
                <div class="privacyaas-text">
                    <h2><?php echo $data['PrivacyHeading3'] ?? ''; ?></h2>
                    <h3><?php echo $data['PrivacyHeading31'] ?? ''; ?></h3>
                    <?php if (isset($data['PrivacyServiceText5'])): ?>
                        <?php foreach ($data['PrivacyServiceText5'] as $text): ?>
                            <?php if (is_array($text)): ?>
                                <p>
                                    <?php echo $text['text'] ?? ''; ?>
                                    <strong><?php echo $text['bold1'] ?? ''; ?></strong>
                                </p>
                            <?php else: ?>
                                <p><?php echo $text; ?></p>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>

                    <ul>
                        <?php if (isset($data['PrivacyServiceList3'])): ?>
                            <?php foreach ($data['PrivacyServiceList3'] as $item): ?>
                                <li style="font-size: 1.3rem">
                                    <strong><?php echo $item['bold'] ?? ''; ?></strong>
                                    <?php echo $item['text'] ?? ''; ?>
                                </li>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </ul>

                    <?php if (isset($data['PrivacyServiceText41'])): ?>
                        <?php foreach ($data['PrivacyServiceText41'] as $text): ?>
                            <?php if (is_array($text)): ?>
                                <p>
                                    <?php echo $text['text'] ?? ''; ?>
                                    <strong><?php echo $text['bold1'] ?? ''; ?></strong>
                                </p>
                            <?php else: ?>
                                <p><?php echo $text; ?></p>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>


                    <h4><?php echo $data['PrivacyServiceText2Conclusion'] ?? ''; ?></h4>
                </div>
                <img src="/assets/images/privacyaas/privacy3.png" alt="Privacy3" class="privacyaas-image" />
            </div>
        </div>

        <!-- Fifth Section -->
        <div class="privacyaas-section">
            <div class="privacyaas-content">
                <img src="/assets/images/privacyaas/privacy4.png" alt="Privacy 2" class="privacyaas-image" />
                <div class="privacyaas-text">

                    <h2><?php echo $data['PrivacyHeading5'] ?? ''; ?></h2>
                    <h3><?php echo $data['PrivacyHeading51'] ?? ''; ?></h3>
                    <?php if (isset($data['PrivacyServiceText6'])): ?>
                        <?php foreach ($data['PrivacyServiceText6'] as $text): ?>
                            <?php if (is_array($text)): ?>
                                <h4>
                                    <?php echo $text['text'] ?? ''; ?>
                                    <strong><?php echo $text['bold1'] ?? ''; ?></strong>
                                    <?php echo $text['text1'] ?? ''; ?>
                                </h4>
                            <?php else: ?>
                                <h4><?php echo $text; ?></h4>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>

                </div>
            </div>
        </div>

        <!-- Pricing Section -->
        <div class="privacyaas-pricing">
            <h2><?php echo $data['pricingTitle'] ?? ''; ?></h2>
            <?php if (isset($data['pricingText1'])): ?>
                <?php foreach ($data['pricingText1'] as $text): ?>
                    <p><?php echo $text; ?></p>
                <?php endforeach; ?>
            <?php endif; ?>

            <ul>
                <?php if (isset($data['pricingList'])): ?>
                    <?php foreach ($data['pricingList'] as $item): ?>
                        <li style="font-size: 1.3rem">
                            <strong><?php echo $item['bold'] ?? ''; ?></strong>
                            <?php echo $item['text'] ?? ''; ?>
                        </li>
                    <?php endforeach; ?>
                <?php endif; ?>
            </ul>


            <div class="privacyaas-pricing-data">
                <?php foreach ($data['pricingData']['services'] as $service): ?>
                    <div class="pricing-service">
                        <h3><?php echo $service['title'] ?? ''; ?></h3>
                        <ul>
                            <?php foreach ($service['details'] as $detail): ?>
                                <li style="font-size: 1.3rem">
                                    <?php if (isset($detail['text1']) && isset($detail['bold'])): ?>
                                        <?php echo $detail['text1']; ?><strong><?php echo $detail['bold']; ?></strong>
                                    <?php else: ?>
                                        <?php echo $detail['text'] ?? ''; ?>
                                    <?php endif; ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endforeach; ?>
            </div>
            <h2 style="font-size: 2.2rem; margin-top: 5%"><?php echo $data['pricingText2'][0] ?? ''; ?></h2>
            <h4 style="font-size: 2rem"><?php echo $data['pricingText3'][0] ?? ''; ?></h4>
        </div>
    </div>

    <?php renderFooter($lang); ?>
</body>

</html>