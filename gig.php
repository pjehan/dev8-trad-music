<?php
require_once "functions.php";
require_once "database.php";

// Récupérer l'id dans l'URL
$id = $_GET['id']; // $_GET ===>  [ 'id' => 4 ]
$gig = findOneGig($id);
// TODO: Si le concert n'existe pas --> 404

// TODO: Récupérer en base de données la liste des musiciens associés au concert affiché

getHeader('Gig Detail');
?>

<section class="container">
  <h1><?= $gig['name'] ?></h1>
  <!-- TODO: Afficher les détails d'un concert (image, date de début/fin, l'adresse...) -->
</section>

<?php getFooter(); ?>