<?php
// Lädt notwendige Dateien
include_once __DIR__ . '/../includes/LanguageContext.php';
include_once __DIR__ . '/../includes/ContactButton.php';
include_once __DIR__ . '/../includes/languages/homeData.php';
include_once __DIR__ . '/../includes/header.php';
include_once __DIR__ . '/../includes/footer.php';
include_once __DIR__ . '/../includes/button.php';

// Sprache aus der URL holen und in der Session speichern
if (isset($_GET['lang']) && in_array($_GET['lang'], ['DE', 'EN'])) {
    $_SESSION['language'] = $_GET['lang']; // Speichert die Sprache in der Session
}

// Wenn keine Sprache gesetzt ist, Standard auf DE setzen
$language = isset($_SESSION['language']) ? $_SESSION['language'] : 'DE';

// Daten je nach Sprache laden
$homeText = $language === 'DE' ? $homeDataDE : $homeDataENG;

$feedbackImages = [
    '/assets/images/home/feedback1.png',
    '/assets/images/home/feedback2.png',
    '/assets/images/home/feedback3.png',
];
?>

<!DOCTYPE html>
<html lang="<?php echo htmlspecialchars($language); ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="/assets/css/main.css">
    <link rel="stylesheet" href="/assets/css/home.css">
    <script src="/assets/js/feedbackSlider.js" defer></script>
</head>

<body>
    <?php renderHeader($language); ?>
    <?php renderContactButton($language); ?>
    <div class="home  " id="/">
        <div class="container">
            <h1 class="hello"><?php echo htmlspecialchars($homeText['headline']); ?></h1>

            <img src="/assets/images/home/homepage1.png" alt="bg1" class="bg1" style="  
            width: 100%;
            max-width: 100vw;
            margin-bottom: 2rem;
            border-radius: 10px;">

            <div class="feedback-section">
                <h2><?php echo htmlspecialchars($homeText['feedbackHeading']); ?></h2>
                <div class="feedback-slider">
                </div>
            </div>
            <!-- 
            
            Section for the videos:
            
            <div class="development">
                <?php foreach ($homeText['development'] as $index => $development): ?>
                    <div class="dev-section <?php echo $index % 2 === 0 ? 'reverse-order' : ''; ?>">
                        <div class="text">
                            <h2 style="fontSize: 1rem !important;"><?php echo htmlspecialchars($development['title']); ?>
                            </h2>
                        </div>
                        <div class="video-placeholder">
                            <img src="/assets/images/home/placeholder.png" alt="video placeholder" class="placeholder">
                        </div>
                    </div>
                <?php endforeach; ?>
            </div> -->



        </div>
    </div>

    <?php renderFooter($language); ?>

    <script>
        const feedbackImages = <?php echo json_encode($feedbackImages); ?>; 
    </script>
    <script src="/assets/js/animationFadeIn.js"></script>
</body>

</html>