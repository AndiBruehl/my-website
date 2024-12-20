<?php

$aboutDataDE = [
    'headerTitle' => 'Wer wir sind – Die Köpfe hinter Missing Gear Solutions',
    'firstSection' => 'Es gibt viele IT-Dienstleister – aber bei uns stehen Sie im Mittelpunkt. Wir entwickeln Ihre Projekte mit Herzblut, höchster Qualität und einem klaren Fokus auf Wirtschaftlichkeit, als wären es unsere eigenen.
            Unser Ziel ist es, Ihre Bedürfnisse wirklich zu verstehen und gemeinsam maßgeschneiderte, zukunftsfähige Lösungen zu schaffen. Kundenzufriedenheit ist für uns mehr als ein Versprechen – das bestätigen auch unsere Kunden.
            Ihr persönlicher Ansprechpartner ist jederzeit für Sie erreichbar – per Telefon, Teams, E-Mail oder Ticket. Wir begleiten Sie durch den gesamten Projektlebenszyklus und darüber hinaus.
            Missing Gear Solutions steht für ganzheitliche Entwicklungslösungen, die sich an Ihren individuellen Anforderungen orientieren.',
    'secondSection' => 'Timo Tegtmeier ist Experte für digitale Transformation und gründete 2022 die Missing Gear Solutions GmbH. Mit einem Fokus auf IT-Beratung, App- und Web-Entwicklung sowie höchster IT-Sicherheit unterstützt er mittelständische Unternehmen dabei, effizient und zukunftssicher zu arbeiten.
            Sein teamorientierter Führungsstil und seine Leidenschaft für innovative Lösungen machen ihn zum verlässlichen Partner für nachhaltige IT-Strategien.
            „Ich setze mich dafür ein, sichere und innovative IT-Lösungen zu schaffen, die aktuelle Herausforderungen meistern und Chancen eröffnen.“',
    'team' => 'Unser Team - Ihre Experten',
    'footer' => '/assets/images/about/footerDE.png',
];

$aboutDataENG = [
    'headerTitle' => 'Who we are - The people behind Missing Gear Solutions',
    'firstSection' => 'There are many IT service providers – but with us, you are at the center. We develop your projects with passion, the highest quality, and a clear focus on cost-effectiveness, as if they were our own.
            Our goal is to truly understand your needs and create tailo#e74c3c, future-proof solutions together. Customer satisfaction is more than a promise for us – our clients can attest to that.
            Your personal contact is always available – via phone, Teams, email, or ticket. We support you throughout the entire project lifecycle and beyond.
            Missing Gear Solutions stands for holistic development solutions tailo#e74c3c to your individual requirements.',
    'secondSection' => 'Timo Tegtmeier is an expert in digital transformation and founded Missing Gear Solutions GmbH in 2022. With a focus on IT consulting, app and web development, as well as top-notch IT security, he helps medium-sized companies work efficiently and securely for the future.
            His team-oriented leadership style and passion for innovative solutions make him a reliable partner for sustainable IT strategies.
            "I am committed to creating secure and innovative IT solutions that address current challenges and unlock opportunities."',
    'team' => 'Our team - your experts',
    'footer' => '/assets/images/about/footerENG.png',
];

$aboutImage = [
    'portrait' => '/assets/images/about/portrait1.png',
    'mgsLogo' => '/assets/images/about/mgsLogo.png',
    'cards' => [
        '/assets/images/about/card1.png',
        '/assets/images/about/card2.png',
        '/assets/images/about/card3.png',
        '/assets/images/about/card4.png',
    ]
];

$language = isset($_GET['lang']) && $_GET['lang'] === 'EN' ? 'EN' : 'DE';

$aboutData = ($language === 'EN') ? $aboutDataENG : $aboutDataDE;
$aboutImageData = $aboutImage;
