<?php
require_once "functions.php";
require_once "database.php";

if (isset($_POST['email'], $_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $musician = findOneMusicianEmail($email);
    if ($musician && password_verify($password, $musician['password'])) {
        session_start();
        $_SESSION['id'] = $musician['id'];

        header('Location: index.php');
    } else {
        $error = "Email or password incorrect!";
    }
}

getHeader('Login');
?>

<section class="container">

    <h1>Login</h1>

    <?php if (isset($error)): ?>
        <p>
            <?= $error ?>
        </p>
    <?php endif; ?>

    <form action="login.php" method="post">
        <div>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit">
            Login
        </button>
    </form>

</section>

<?php getFooter(); ?>
