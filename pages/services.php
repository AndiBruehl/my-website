<?php
include_once __DIR__ . '/../includes/LanguageContext.php';
include_once __DIR__ . '/../includes/header.php';
include_once __DIR__ . '/../includes/footer.php';
include_once __DIR__ . '/../includes/ContactButton.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$lang = isset($_GET['lang']) ? strtoupper($_GET['lang']) : (isset($_SESSION['lang']) ? $_SESSION['lang'] : 'DE');

if (!in_array($lang, ['DE', 'EN'])) {
    $lang = 'DE';
}

$_SESSION['lang'] = $lang;

$servicesData = include __DIR__ . '/../includes/languages/servicesData.php';
$content = $servicesData[$lang];
?>
<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $content['headline']; ?></title>
    <link rel="stylesheet" href="/assets/css/services.css">
</head>

<body>
    <?php renderHeader($lang); ?>
    <?php renderContactButton($lang); ?>

    <div class="content-root">
        <section class="hero-section">
            <h1><?php echo $content['headline']; ?></h1>
            <div class="header-image">
                <img src="/assets/images/services/headerImg.png" alt="Services Header" style="border-radius: 10px" />
            </div>
            <h3><?php echo $content['intro']; ?></h3>
        </section>


        <section class="solutions">
            <h2><?php echo $content['solutions_heading']; ?></h2>
            <ul>
                <?php foreach ($content['solutions'] as $title => $desc): ?>
                    <li><strong><?php echo $title; ?>:</strong> <?php echo $desc; ?></li>
                <?php endforeach; ?>
            </ul>
        </section>

        <section class="benefits">
            <h2><?php echo $content['benefits_heading']; ?></h2>
            <ul>
                <?php foreach ($content['benefits'] as $title => $desc): ?>
                    <li><strong><?php echo $title; ?>:</strong> <?php echo $desc; ?></li>
                <?php endforeach; ?>
            </ul>
        </section>

        <footer>
            <img src="<?php echo htmlspecialchars($content['footer']); ?>" alt="Footer Image" class="footer-image" />
        </footer>



        <section class="cta-section">
            <section class="tech-stacks">
                <h3 style="font-size: 3rem"><?php echo $content['tech_stacks']; ?></h3>
            </section>
            <div class="cta-buttons">
                <a href="/development" class="cta-button"><?php echo $content['cta_button'][0]; ?></a>
                <a href="/allinone" class="cta-button"><?php echo $content['cta_button'][1]; ?></a>
                <a href="/consulting" class="cta-button"><?php echo $content['cta_button'][2]; ?></a>
            </div>
        </section>


    </div>

    <?php renderFooter($lang); ?>
</body>

</html>