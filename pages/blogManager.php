<?php
include_once __DIR__ . '/../includes/LanguageContext.php';
include_once __DIR__ . '/../includes/ContactButton.php';
include_once __DIR__ . '/../includes/header.php';
include_once __DIR__ . '/../includes/footer.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$language = getCurrentLanguage();
$langData = loadLanguageFile($language);

// Authentifizierung
$validUser = 'BlogCreator';
$validPass = 'BlogCreator';

$authenticated = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username']) && isset($_POST['password'])) {
    if ($_POST['username'] === $validUser && $_POST['password'] === $validPass) {
        $authenticated = true;
        $_SESSION['authenticated'] = true;
    } else {
        header('Location: /pages/403.php');
        exit;
    }
}

if (isset($_SESSION['authenticated']) && $_SESSION['authenticated'] === true) {
    $authenticated = true;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'logout') {
    session_unset();
    session_destroy();
    header("Location: /blogManager");
    exit;
}

// Blogs-Verzeichnis
$blogsDir = __DIR__ . '/../blogs';

if (!is_dir($blogsDir)) {
    echo "<p style='color: red;'>Blog directory not found: $blogsDir</p>";
    $blogFolders = [];
} else {
    $blogFolders = array_filter(glob($blogsDir . '/*'), 'is_dir');
    if (empty($blogFolders)) {
        echo "<p style='color: red;'>No blog folders found in $blogsDir</p>";
    } else {
        usort($blogFolders, function ($a, $b) {
            return filemtime($b) - filemtime($a);
        });
    }
}

// Änderungen speichern
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Speichern von indexDE.txt
    if (isset($_POST['contentDE']) && isset($_POST['saveDE'])) {
        $filePath = $blogsDir . '/' . basename($_POST['saveDE']) . '/indexDE.txt';
        file_put_contents($filePath, $_POST['contentDE']);
    }

    // Speichern von indexEN.txt
    if (isset($_POST['contentEN']) && isset($_POST['saveEN'])) {
        $filePath = $blogsDir . '/' . basename($_POST['saveEN']) . '/indexEN.txt';
        file_put_contents($filePath, $_POST['contentEN']);
    }
}
?>

<!DOCTYPE html>
<html lang="<?php echo $language; ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Manager</title>
    <link rel="stylesheet" href="/assets/css/main.css">
    <style>
        .editor-container {
            margin-top: 20px;
        }

        .editor-label {
            font-weight: bold;
            margin-bottom: 10px;
        }

        textarea {
            width: 100%;
            height: 400px;
        }

        .button {
            margin-top: 10px;
            background-color: #e74c3c;
            color: white;
            border: none;
            border-radius: 8px;
            padding: 10px 20px;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .button:hover {
            background-color: red;
        }

        .blog-list {
            padding: 0 5%;
            margin-bottom: 5%;
        }

        .blog-item {
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .auth-message {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 45vh;
            text-align: center;
        }

        .auth-form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .auth-form input {
            margin: 10px;
            padding: 10px;
            font-size: 1rem;
            width: 300px;
            border-radius: 8px;
        }

        .auth-form button {
            margin-top: 5%;
            font-size: 1.5rem;
            padding: 20px 40px;
        }
    </style>

    <!-- TinyMCE CDN mit API-Key -->
    <script src="https://cdn.tiny.cloud/1/ojd92ropoc1hvdrcha2w3q94l87w79aon541fxmjwaddt7mu/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            tinymce.init({
                selector: 'textarea',
                plugins: 'link image code lists table',
                toolbar: 'undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image code | table',
                height: 400,
            });
        });
    </script>
</head>

<body>
    <?php renderHeader($language); ?>
    <?php renderContactButton($language); ?>

    <?php if (!$authenticated): ?>
        <div class="auth-message">
            <h1><?php echo $language === 'DE' ? 'Authentifizierung erforderlich' : 'Authentication Required'; ?></h1>
            <p><?php echo $language === 'DE' ? 'Bitte geben Sie Ihre Anmeldedaten ein, um fortzufahren.' : 'Please enter your credentials to continue.'; ?>
            </p>
            <form method="POST" class="auth-form">
                <input type="text" name="username"
                    placeholder="<?php echo $language === 'DE' ? 'Benutzername' : 'Username'; ?>" required>
                <input type="password" name="password"
                    placeholder="<?php echo $language === 'DE' ? 'Passwort' : 'Password'; ?>" required>
                <button type="submit"><?php echo $language === 'DE' ? 'Anmelden' : 'Login'; ?></button>
            </form>
        </div>
    <?php else: ?>
        <div style="text-align: right; margin: 20px;">
            <form method="POST">
                <input type="hidden" name="action" value="logout">
                <button type="submit" class="button">Logout</button>
            </form>
        </div>

        <h1>Blog Manager</h1>
        <div>
            <h2>Existing Blogs</h2>
            <div class="blog-list">
                <?php if (!empty($blogFolders)): ?>
                    <?php foreach ($blogFolders as $folder): ?>
                        <?php
                        $folderName = basename($folder);
                        $lastModified = date('Y-m-d H:i', filemtime($folder));
                        ?>
                        <div class="blog-item">
                            <h3><?php echo htmlspecialchars($folderName); ?></h3>
                            <p>Last modified: <?php echo $lastModified; ?></p>
                            <form method="POST">
                                <input type="hidden" name="saveDE" value="<?php echo htmlspecialchars($folderName); ?>">
                                <h4>Edit indexDE.txt</h4>
                                <textarea name="contentDE"><?php echo file_get_contents($folder . '/indexDE.txt'); ?></textarea>
                                <button type="submit" class="button">Save DE</button>
                            </form>

                            <form method="POST">
                                <input type="hidden" name="saveEN" value="<?php echo htmlspecialchars($folderName); ?>">
                                <h4>Edit indexEN.txt</h4>
                                <textarea name="contentEN"><?php echo file_get_contents($folder . '/indexEN.txt'); ?></textarea>
                                <button type="submit" class="button">Save EN</button>
                            </form>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p style="color: gray;">No blogs available.</p>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>

    <?php renderFooter($language); ?>
</body>

</html>