<!DOCTYPE html>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Development Page</title>
    <link rel="stylesheet" href="/assets/css/main.css">
</head>

<body>

    <?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    include_once __DIR__ . '/../includes/LanguageContext.php';
    include_once __DIR__ . '/../includes/ContactButton.php';
    include_once __DIR__ . '/../includes/header.php';
    include_once __DIR__ . '/../includes/footer.php';
    include_once __DIR__ . '/../includes/languages/DevData.php';

    $language = isset($_SESSION['lang']) ? $_SESSION['lang'] : 'DE';
    $data = ($language === 'DE') ? $DevData['DE'] : $DevData['EN'];

    $activeButton = isset($_GET['activeButton']) ? $_GET['activeButton'] : 'Button1';

    function renderDevelopmentSection($title, $content, $imageSrc)
    {
        echo "<div class='dev1  '>";
        echo "<h2 id='dynamicTitle' style='display: none'>{$title}</h2>";
        echo "<div class='textContent  '><p id='dynamicText' style='font-size: 3rem;'>{$content}</p></div>";
        echo "<div class='imageContent  '><img id='dynamicImage' src='{$imageSrc}' alt='{$title}' /></div>";
        echo "</div>";

    }
    ?>

    <?php renderHeader($language); ?>
    <?php renderContactButton($language); ?>

    <div class="container  ">
        <div id="development" class="development  ">
            <h1><?php echo $data['headerTitle']; ?></h1>
        </div>

        <div class="headerImage  "
            style=" display: flex; align-items: center; justify-content: center; margin-bottom: 5%">
            <img src="./assets/images/development/headerImage.png" alt="Header Image"
                style="max-width: 100%; height: auto; object-fit: cover;             border-radius: 10px;" />
        </div>

        <div class="devText1  ">
            <h2 style="margin-left: 2%; font-size: 5rem;">
                <?php echo $data['softwareDevelopmentTitle']; ?>
            </h2>
            <p style="margin-left: 2%; font-size: 3rem;">
                <?php echo $data['softwareDevelopmentText']; ?>
            </p>

        </div>
        <div class="frameworks  ">
            <img src="./assets/images/development/frameworks.png" alt="Frameworks" style="width: 85%; padding: 5%;" />
        </div>
        <div class="btnContainer  ">
            <a href="/saas" style="text-decoration: none;">
                <button class="btn"><?php echo $data['buttonSaaS']; ?></button>
            </a>
        </div>

        <div class="devText2  "
            style="display: flex; align-items: center; justify-content: center; flex-direction: column">
            <h2 style="margin-left: 2%; font-size: 5rem;">
                <?php echo $data['appDevelopmentTitle']; ?>
            </h2>
            <p style="margin-left: 2%; font-size: 3rem;">
                <?php echo $data['appDevelopmentText']; ?>
            </p>
        </div>

        <div class="buttonContainer  ">
            <?php
            $buttons = ["Button1", "Button2", "Button3"];
            foreach ($buttons as $index => $button) {
                $isActive = ($activeButton === $button) ? 'active' : '';
                echo "<button class='transparentButton {$isActive}' id='{$button}' onclick=\"updateContent('{$button}')\">";
                echo $data['button' . ($index + 1) . 'Text'];
                echo "</button>";
            }
            ?>
        </div>

        <div class="dynamicContent  " id="dynamicContent">
            <?php
            switch ($activeButton) {
                case "Button1":
                    renderDevelopmentSection(
                        $data['button1Text'],
                        $data['dynamicText1'],
                        $data['dynamicImage1']
                    );
                    break;
                case "Button2":
                    renderDevelopmentSection(
                        $data['button2Text'],
                        $data['dynamicText2'],
                        $data['dynamicImage2']
                    );
                    break;
                case "Button3":
                    renderDevelopmentSection(
                        $data['button3Text'],
                        $data['dynamicText3'],
                        $data['dynamicImage3']
                    );
                    break;
            }
            ?>
        </div>

        <div class="btnContainer  ">
            <button class="btn"><?php echo $data['buttonAppDevelopment']; ?></button>
        </div>

    </div>
    <?php renderFooter($language); ?>

    <script src="/assets/js/animationFadeIn.js"></script>

    <script>
        const dynamicData = {
            Button1: {
                title: "<?php echo $data['button1Text']; ?>",
                content: "<?php echo $data['dynamicText1']; ?>",
                imageSrc: "<?php echo $data['dynamicImage1']; ?>"
            },
            Button2: {
                title: "<?php echo $data['button2Text']; ?>",
                content: "<?php echo $data['dynamicText2']; ?>",
                imageSrc: "<?php echo $data['dynamicImage2']; ?>"
            },
            Button3: {
                title: "<?php echo $data['button3Text']; ?>",
                content: "<?php echo $data['dynamicText3']; ?>",
                imageSrc: "<?php echo $data['dynamicImage3']; ?>"
            }
        };

        let currentActiveButton = '<?php echo $activeButton; ?>';

        function updateContent(button) {
            if (currentActiveButton === button) return;

            currentActiveButton = button;
            const buttons = document.querySelectorAll('.transparentButton');

            buttons.forEach((btn) => btn.classList.remove('active'));
            document.getElementById(button).classList.add('active');

            const { title, content, imageSrc } = dynamicData[button];

            const titleElement = document.getElementById('dynamicTitle');
            const textElement = document.getElementById('dynamicText');
            const imageElement = document.getElementById('dynamicImage');

            titleElement.style.opacity = 0;
            textElement.style.opacity = 0;
            imageElement.style.opacity = 0;

            setTimeout(() => {
                titleElement.textContent = title;
                textElement.textContent = content;
                imageElement.src = imageSrc;

                titleElement.style.opacity = 1;
                textElement.style.opacity = 1;
                imageElement.style.opacity = 1;

                titleElement.style.transition = "opacity 1s ease";
                textElement.style.transition = "opacity 1s ease";
                imageElement.style.transition = "opacity 1s ease";
            }, 300);
        }

    </script>

</body>

</html>