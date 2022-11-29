<?php
require_once "functions.php";
require_once "database.php";

if(isset($_POST['first_name']) && isset($_POST['email'])) {
    // TODO: Vérifier que les données sont valides
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $image = null;
    if (isset($_FILES['image'])) {
        $image = $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/' . $image);
    }

    $is_inserted = insertMusician($first_name, $last_name, $image, $email, $password);

    if ($is_inserted) {
        header('Location: index.php'); // Redirection vers l'accueil
    }
}

getHeader('Register');
?>

<section class="container">

    <h1>Register</h1>

    <form action="register.php" method="post" enctype="multipart/form-data">
        <div>
            <label for="first_name">First name</label>
            <input type="text" id="first_name" name="first_name" placeholder="First name" required>
        </div>
        <div>
            <label for="last_name">Last name</label>
            <input type="text" id="last_name" name="last_name" placeholder="Last name">
        </div>
        <div>
            <label for="image">Image</label>
            <input type="file" id="image" name="image" accept="image/*">
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary">
            Register
        </button>
    </form>

</section>

<?php getFooter(); ?>
