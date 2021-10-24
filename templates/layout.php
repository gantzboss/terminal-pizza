<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/css/style.css">
    <script src="/js/jquery-3.6.0.min.js"></script>
    <script src="/js/main.js"></script>
    <title><?= $title ?></title>
</head>
<body>
    <header class="main-header">
        <a href="/">Главная</a>
        <?= $header ?>
    </header>
    <main class="main-content">
        <?= $content ?>
    </main>
    <footer class="main-footer">
        
    </footer>
</body>
</html>