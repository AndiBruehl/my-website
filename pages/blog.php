<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$lang = isset($_GET['lang']) ? strtoupper($_GET['lang']) : (isset($_SESSION['lang']) ? $_SESSION['lang'] : 'DE');

if (!in_array($lang, ['DE', 'EN'])) {
    $lang = 'DE';
}

$_SESSION['lang'] = $lang;

$blogsDir = __DIR__ . '/../blogs';

$blogFolders = array_filter(glob($blogsDir . '/*'), 'is_dir');

date_default_timezone_set('Europe/Berlin');
usort($blogFolders, function ($a, $b) use ($lang) {
    $fileA = $a . '/index' . ($lang === 'DE' ? 'DE' : 'EN') . '.txt';
    $fileB = $b . '/index' . ($lang === 'DE' ? 'DE' : 'EN') . '.txt';

    $timeA = file_exists($fileA) ? filemtime($fileA) : 0;
    $timeB = file_exists($fileB) ? filemtime($fileB) : 0;

    return $timeB - $timeA;
});

include_once __DIR__ . '/../includes/header.php';
include_once __DIR__ . '/../includes/footer.php';
?>

<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogs</title>
    <link rel="stylesheet" href="/assets/css/main.css">

    <style>
        .blogs-root {
            padding: 2%;
        }

        .blogs-header h1 {
            text-align: left;
            margin-bottom: 20px;
        }

        .blog-post {
            margin: 5% auto;
            padding: 2%;
            border: 1px solid #ccc;
            border-radius: 8px;
            background-color: #f5f5f57d;
            max-width: 80%;
            text-align: left;
        }

        .blog-post h2,
        .blog-post h3 {
            color: white;
            text-align: left !important;
        }

            {
            color: white;
            text-align: left !important;
        }

        .blog-post p {
            line-height: 1.6;
            text-align: left;
        }

        .blog-post img {
            display: block;
            margin: 20px auto;
            max-width: 100%;
            height: auto;
        }

        .timestamp {
            font-size: 1.5rem;
            color: white;
            margin-bottom: 10px;
            text-align: left;
        }

        .blog-divider {
            border-top: 1px solid #ddd;
            margin: 20px auto;
            width: 80%;
        }

        @media (max-width: 1024px) {
            .blogs-root {
                padding: 5%;
            }

            .blog-post {
                max-width: 90%;
            }

            .blogs-header h1 {
                font-size: 1.8rem;
            }

            .blog-post h2 {
                font-size: 1.6rem;
            }

            .blog-post p {
                font-size: 1rem;
            }

            .timestamp {
                font-size: 1.2rem;
            }
        }

        @media (max-width: 768px) {
            .blogs-root {
                padding: 5%;
            }

            .blog-post {
                max-width: 100%;
            }

            .blogs-header h1 {
                font-size: 1.5rem;
            }

            .blog-post h2 {
                font-size: 1.4rem;
            }

            .blog-post p {
                font-size: 0.9rem;
            }

            .timestamp {
                font-size: 1rem;
            }
        }
    </style>
</head>

<body>
    <?php renderHeader($lang); ?>

    <div class="blogs-root">
        <header class="blogs-header">
            <h1><?php echo $lang === 'DE' ? 'Unsere Blogs' : 'Our Blogs'; ?></h1>
        </header>

        <main>
            <?php foreach ($blogFolders as $index => $folder): ?>
                <?php
                $indexFile = $folder . '/index' . ($lang === 'DE' ? 'DE' : 'EN') . '.txt';
                if (file_exists($indexFile)) {
                    $content = file_get_contents($indexFile);
                    date_default_timezone_set('Europe/Berlin');
                    $lastModified = date('Y-m-d H:i', filemtime($indexFile));

                    preg_match('/<h2>(.*?)<\/h2>/', $content, $titleMatches);
                    $title = $titleMatches[1] ?? 'Untitled Blog';

                    $contentWithAdjustedImages = preg_replace_callback('/<img src="([^"]+)"/', function ($matches) use ($folder) {
                        $relativePath = $matches[1];
                        $absolutePath = $folder . '/' . basename($relativePath);
                        $webPath = '/blogs/' . basename($folder) . '/' . basename($relativePath);
                        return file_exists($absolutePath) ? '<img src="' . $webPath . '"' : $matches[0];
                    }, $content);

                    $contentWithoutTitle = preg_replace('/<h2>.*?<\/h2>/', '', $contentWithAdjustedImages, 1);
                    ?>
                    <article class="blog-post">
                        <div class="timestamp">
                            <?php echo $lang === 'DE' ? 'Erstellt/Bearbeitet: ' : 'Created/Changed: '; ?>
                            <?php echo $lastModified; ?>
                        </div>
                        <h2><?php echo $title; ?></h2>
                        <div><?php echo $contentWithoutTitle; ?></div>
                    </article>

                    <?php if ($index < count($blogFolders) - 1): ?>
                        <div class="blog-divider"></div>
                    <?php endif; ?>
                <?php } ?>
            <?php endforeach; ?>
        </main>
    </div>

    <?php renderFooter($lang); ?>
</body>

</html>