<?php
require_once "functions.php";
require_once "database.php";

$gigs = getAllGigs();
$musicians = findAll('musician', [], ['first_name' => 'ASC', 'last_name' => 'ASC']);
// SELECT * FROM musician ORDER BY first_name ASC, last_name ASC;

getHeader('Accueil', 'Description de la page accueil');
// getHeader('Accueil', 'Description de la page accueil', ['css/accueil.css', 'css/form.css']);
?>

<section class="container">
  <h1>Find your trad musicians in seconds!</h1>
</section>

<section class="container">
  <h2>Next gigs in town</h2>

  <div class="grid">
      <?php foreach ($gigs as $gig) : ?>
          <?php include "inc/gig_card.php"; ?>
      <?php endforeach; ?>
  </div>
</section>

<section class="container">
  <h2>Available musicians</h2>

  <div class="grid">
      <?php foreach ($musicians as $musician) : ?>
          <?php include "inc/musician_card.php"; ?>
      <?php endforeach; ?>
  </div>
</section>

<?php getFooter(); ?>
