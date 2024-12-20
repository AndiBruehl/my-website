<?php
include_once __DIR__ . '/../includes/LanguageContext.php';
include_once __DIR__ . '/../includes/ContactButton.php';
include_once __DIR__ . '/../includes/header.php';
include_once __DIR__ . '/../includes/footer.php';

if (isset($_GET['lang']) && in_array($_GET['lang'], ['DE', 'EN'])) {
    $_SESSION['language'] = $_GET['lang'];
}

$language = $_SESSION['language'] ?? 'DE';
$data = include __DIR__ . '/../includes/languages/saasData.php';
$SaaSText = $data[$language];
?>

<!DOCTYPE html>
<html lang="<?php echo $language; ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $SaaSText['title']; ?></title>
    <link rel="stylesheet" href="/assets/css/saas.css">
</head>

<body>
    <?php renderHeader($language); ?>

    <div id="SaaS" class="container">
        <header>
            <h1><?php echo $SaaSText['title']; ?></h1>
        </header>

        <div>
            <img src="/assets/images/saas/headerImg.png" alt="header image" class="header-image" />

            <!-- Header Section -->
            <section class="why-choose-us">
                <div class="text-container">
                    <h2 style="  text-align: left !important;"><?php echo $SaaSText['headerTitle']; ?></h2>

                    <?php foreach ($SaaSText['headerText1'] as $paragraph): ?>
                        <p><?php echo $paragraph; ?></p>
                    <?php endforeach; ?>

                    <ul>
                        <?php foreach ($SaaSText['headerList'] as $listItem): ?>
                            <li><?php echo $listItem; ?></li>
                        <?php endforeach; ?>
                    </ul>


                </div>
            </section>

            <!-- Why Choose Us Section -->
            <section class="why-choose-us">
                <div class="image-container">
                    <img src="/assets/images/saas/cube.png" alt="cube" class="cube-image" />
                </div>
                <div class="text-container">
                    <h2 style="  text-align: left !important;"><?php echo $SaaSText['whyChooseUsTitle']; ?></h2>

                    <?php foreach ($SaaSText['whyChooseUsText1'] as $paragraph): ?>
                        <p><?php echo $paragraph; ?></p>
                    <?php endforeach; ?>

                    <ul>
                        <?php foreach ($SaaSText['whyChooseUsList'] as $listItem): ?>
                            <li><?php echo $listItem; ?></li>
                        <?php endforeach; ?>
                    </ul>

                    <?php foreach ($SaaSText['whyChooseUsText2'] as $paragraph): ?>
                        <p><?php echo $paragraph; ?></p>
                    <?php endforeach; ?>
                </div>
            </section>

            <!-- Pricing Models Section -->
            <section class="pricing-models">
                <h2 style="  text-align: left !important;"><?php echo $SaaSText['pricingTitle']; ?></h2>

                <?php foreach ($SaaSText['pricingText1'] as $paragraph): ?>
                    <p><?php echo $paragraph; ?></p>
                <?php endforeach; ?>

                <h4><?php echo $SaaSText['pricingText2']; ?></h4>
                <ul>
                    <?php foreach ($SaaSText['pricingList1'] as $listItem): ?>
                        <li><?php echo $listItem; ?></li>
                    <?php endforeach; ?>
                </ul>

                <h4><?php echo $SaaSText['pricingText3']; ?></h4>
                <ul>
                    <?php foreach ($SaaSText['pricingList2'] as $listItem): ?>
                        <li><?php echo $listItem; ?></li>
                    <?php endforeach; ?>
                </ul>
            </section>

            <!-- Tech Stack Section -->
            <section class="tech-stack">
                <div class="text-container">
                    <h2 style="  text-align: left !important;"><?php echo $SaaSText['techStacksTitle']; ?></h2>
                    <p><?php echo $SaaSText['techStacksText']; ?></p>

                    <h3 style="  text-align: left !important;"><?php echo $SaaSText['techStackMS']; ?></h3>
                    <ul>
                        <?php foreach ($SaaSText['techStackMSList'] as $item): ?>
                            <li><?php echo $item; ?></li>
                        <?php endforeach; ?>
                    </ul>

                    <h3 style="  text-align: left !important;"><?php echo $SaaSText['techStackMobile']; ?></h3>
                    <ul>
                        <?php foreach ($SaaSText['techStackMobileList'] as $platform): ?>
                            <li><strong><?php echo $platform['title']; ?>:</strong>
                                <ul>
                                    <?php foreach ($platform['details'] as $detail): ?>
                                        <li><?php echo $detail; ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </li>
                        <?php endforeach; ?>
                    </ul>

                    <h3 style="  text-align: left !important;"><?php echo $SaaSText['techStackWeb']; ?></h3>
                    <ul>
                        <?php foreach ($SaaSText['techStackWebList'] as $item): ?>
                            <li><?php echo $item; ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="gear-image-wrapper">
                    <img src="/assets/images/saas/gear.png" alt="gear" class="gear-image" />
                </div>
            </section>
        </div>
    </div>
    <footer>
        <img src="<?php echo htmlspecialchars($SaaSText['footer']); ?>" alt="Footer Image" class="footer-image" />
    </footer>
    <?php renderFooter($language); ?>
</body>

</html>