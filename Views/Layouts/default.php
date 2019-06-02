<!doctype html>
<head>
    <meta charset="utf-8">

    <title>Tracker Ara</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://pagination.js.org/dist/2.1.4/pagination.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <style>
        body {
            padding-top: 5rem;
        }

        .starter-template {
            padding: 3rem 1.5rem;
            text-align: center;
        }
    </style>
</head>

<body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="#">Tracker Ara</a>
    <? if (!$isAdmin): ?>
        <a class="navbar-brand" href="/auth/login">Вход</a>
    <? else: ?>
        <a class="navbar-brand" href="/auth/logout">Выход</a>
    <? endif; ?>

</nav>

<main role="main" class="container">
    <div>
        <?php
        echo $content_for_layout;
        ?>
    </div>

</main>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://kit.fontawesome.com/afa0f3ed32.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="/js/script.js"></script>
</body>
</html>
