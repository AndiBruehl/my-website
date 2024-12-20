<?php

$contactDataDE = [
    'navigation_contact' => 'Kontakt',
    'content' => [
        "<h2>Let's Talk</h2>",
        "<p>Sie haben eine große Idee oder eine Marke zu entwickeln und brauchen Hilfe? Dann melden Sie sich bei uns, wir würden gerne mehr über Ihr Projekt erfahren und Ihnen helfen.</p>",
        "<img src='./assets/images/about/mgsLogo.png' alt='Logo' style='width: 100%; max-width: 250px; height: auto; margin-top: 10%; margin-bottom: 10%; object-fit: contain;' />",
        "<p>Am Ruhmbach 5</p>",
        "<p>45149 Essen</p>",
        "<p><strong>Vertreten durch:</strong> Timo Tegtmeier</p>",
        "<p><strong>Kontakt:</strong></p>",
        "<p>Telefon: +49 201 / 89 08 36 - 40</p>",
        "<p>E-Mail: <a href='mailto:info@missinggearsolutions.de' class='link-style'>info@missinggearsolutions.de</a></p>",
    ],
    'formLabels' => [
        'name' => 'Name',
        'companyName' => 'Name des Unternehmens',
        'email' => 'E-Mail',
        'contactReason' => 'Betreff/Kontaktgrund',
        'phone' => 'Telefonnummer (optional)',
        'message' => 'Mitteilung',
        'submit' => 'Abschicken',
        'acceptTerms' => ' Ich akzeptiere die ',
        'terms' => 'AGBs',
        'and' => ' und ',
        'privacy' => 'Datenschutzrichtlinien',
        'termsLink' => '/terms',
        'privacyLink' => '/privacy',
        'messageSend' => 'Nachricht wurde erfolgreich gesendet.',
    ],
    'links' => [
        ['text' => 'Datenschutz', 'url' => '/privacy'],
        ['text' => 'Geschäftsbedingungen', 'url' => '/terms'],
    ],
];

$contactDataENG = [
    'navigation_contact' => 'Contact',
    'content' => [
        "<h2>Let's Talk</h2>",
        "<p>Do you have a big idea or a brand to develop and need help? Get in touch with us. We would love to learn more about your project and help you.</p>",
        "<img src='./assets/images/about/mgsLogo.png' alt='Logo' style='width: 100%; max-width: 250px; height: auto; margin-top: 10%; margin-bottom: 10%; object-fit: contain;' />",
        "<p>Am Ruhmbach 5</p>",
        "<p>45149 Essen</p>",
        "<p><strong>Represented by:</strong> Timo Tegtmeier</p>",
        "<p><strong>Contact:</strong></p>",
        "<p>Phone: +49 201 / 89 08 36 - 40</p>",
        "<p>Email: <a href='mailto:info@missinggearsolutions.de' class='link-style'>info@missinggearsolutions.de</a></p>",
    ],
    'formLabels' => [
        'name' => 'Name',
        'companyName' => 'Company Name',
        'email' => 'Email',
        'contactReason' => 'Subject/Contact Reason',
        'phone' => 'Phone Number (optional)',
        'message' => 'Message',
        'submit' => 'Submit',
        'acceptTerms' => ' I accept the ',
        'terms' => 'Terms and Conditions',
        'and' => ' and ',
        'privacy' => 'Privacy Policy',
        'termsLink' => '/terms',
        'privacyLink' => '/privacy',
        'messageSend' => 'Message sent successfully.',
    ],
    'links' => [
        ['text' => 'Privacy Policy', 'url' => '/privacy'],
        ['text' => 'Terms and Conditions', 'url' => '/terms'],
    ],
];

$language = isset($language) ? $language : 'DE';
$langData = ($language === 'EN') ? $contactDataENG : $contactDataDE;

?>