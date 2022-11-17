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

function getAllMusicians(): array
{
    global $connection;

    $query = "SELECT * FROM musician";
    $stmt = $connection->prepare($query);
    $stmt->execute();

    return $stmt->fetchAll();
}
