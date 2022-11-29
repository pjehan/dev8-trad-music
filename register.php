<?php
require_once "functions.php";
require_once "database.php";



getHeader('Register');
?>

<section class="container">

    <h1>Register</h1>

    <form action="register.php" method="post">
        <div>
            <label for="first_name">First name</label>
            <input type="text" id="first_name" name="first_name" placeholder="First name">
        </div>
        <div>
            <label for="last_name">Last name</label>
            <input type="text" id="last_name" name="last_name" placeholder="Last name">
        </div>
        <div>
            <label for="image">Image</label>
            <input type="file" id="image" name="image">
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" id="email" name="email">
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" id="password" name="password">
        </div>
        <button type="submit" class="btn btn-primary">
            Register
        </button>
    </form>

</section>

<?php getFooter(); ?>
