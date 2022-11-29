<?php
/**
 * Ensemble des fonctions liées à la BDD
 */

$connection = new PDO('mysql:dbname=dev8_trad_music;host=127.0.0.1', 'root', 'root', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMULATE_PREPARES => false
]);

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

function findMusicianInstruments(int $musician_id): array
{
    global $connection;

    $query = "
            SELECT *
            FROM instrument
            INNER JOIN musician_has_instrument AS mhi ON mhi.instrument_id = instrument.id
            WHERE mhi.musician_id = $musician_id
    ";
    $stmt = $connection->prepare($query);
    $stmt->execute();

    return $stmt->fetchAll();
}

function findNextGigs(int $limit = 4): array
{
    global $connection;

    $query = "
        SELECT *
        FROM gig
        INNER JOIN pub ON pub.id = gig.pub_id
        WHERE gig.date_start > NOW()
        ORDER BY gig.date_start
        LIMIT $limit
    ";
    $stmt = $connection->prepare($query);
    $stmt->execute();

    return $stmt->fetchAll();
}
