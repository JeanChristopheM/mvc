<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Becode - Boiler plate MVC</title>
    <link rel="stylesheet" href="/style/style.css">
</head>
<body>
    <header>
        <nav class="menu limit">
            <h1>
                <a href="/home/">News</a>
                <?= ($_SESSION['usr']) ? "<span style='font-size: 1rem;'><a href='#'>+</a></span>" : '' ?>
            </h1>
            <ul>
                <li>
                    <a href="/articles/">Articles</a>
                </li>
                <?php if (isset($_SESSION['usr'])): ?>
                    <li class="last">
                    <span><?= $_SESSION['usr']['username'] ?> @ </span><a href="/logout/">Logout</a>
                    </li>
                <?php else: ?>
                    <li class="last">
                        <a href="/signup/">Sign up</a>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>