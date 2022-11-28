<?php
/**
 * Ensemble des fonctions liées à la BDD
 */

$connection = new PDO('mysql:dbname=dev8_trad_music;host=127.0.0.1', 'root', 'root');

function getAllGigs(): array
{
    return [
        [
            'image' => 'oconnell.jpg',
            'pub' => 'O\'Connell',
            'date' => new DateTime('2022-12-03 21:00:00')
        ],
        [
            'image' => 'templebar.jpg',
            'pub' => 'Temple bar',
            'date' => new DateTime('2022-12-01 20:30:00')
        ],
        [
            'image' => 'thebrazenhead.jpg',
            'pub' => 'The Brazen Head',
            'date' => new DateTime('2022-12-03 21:00:00')
        ],
        [
            'image' => 'mulligans.jpg',
            'pub' => 'Mulligan\'s',
            'date' => new DateTime('2023-01-05 21:15:00')
        ],
    ];
}

// Créer une seule fonction avec des paramètres pour générer et retourner les résultats d'une requête SQL
function findAll(string $table, array $conditions = [], array $order = []): array
{
    global $connection;

    $query = "SELECT * FROM $table";

    // Génération de la clause WHERE
    if (count($conditions) > 0) {
        $i = 0; // Compteur pour savoir si 1er tour de boucle
        foreach ($conditions as $key => $condition) {
            $keyword = 'WHERE';
            // Si ce n'est pas le 1er tour de boucle, on utilise le mot clé "AND" à la place de "WHERE"
            if ($i > 0) {
                $keyword = 'AND';
            }
            $query .= " $keyword $key = '$condition'";
            $i++;
        }
    }

    // Génération de la clause ORDER BY
    if (count($order) > 0) {
        $i = 0; // Compteur pour savoir si 1er tour de boucle
        foreach ($order as $key => $value) {
            $keyword = 'ORDER BY';
            // Si ce n'est pas le 1er tour de boucle, on utilise la virgule à la place de "ORDER BY"
            if ($i > 0) {
                $keyword = ',';
            }
            $query .= " $keyword $key $value";
            $i++;
        }
    }

    $stmt = $connection->prepare($query);
    $stmt->execute();

    return $stmt->fetchAll();
}


// getAll('musician');
// ==> SELECT * FROM musician

// getAll('musician', ['first_name' => 'Gavin', 'last_name' => 'Pennycook']);
// ==> SELECT * FROM musician WHERE first_name = 'Gavin' AND last_name = 'Pennycook'

// getAll('musician', ['first_name' => 'Sean'], ['first_name' => 'ASC', 'last_name' => 'ASC']);
// ==> SELECT * FROM musician WHERE first_name = 'Sean' ORDER BY first_name ASC, last_name ASC
