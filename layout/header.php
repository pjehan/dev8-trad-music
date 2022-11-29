<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php if ($description !== null): ?>
      <meta name="description" content="<?= $description ?>">
    <?php endif; ?>
    <title><?= $title ?> - Trad Music</title>
    <script defer src="dist/app.js"></script>
</head>
<body>

<header class="site-header">
    <div class="container">
        <nav class="navbar">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.html">Contact</a></li>
            </ul>
            <ul>
                <li><a href="login.php">Connection</a></li>
                <li><a href="register.php">Register</a></li>
            </ul>
        </nav>
    </div>
</header>

<main>
