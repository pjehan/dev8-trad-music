<?php
/**
 * Ensemble des fonctions liées à la BDD
 */

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
    return [
        [
            'image' => 'sean-obroin.jpeg',
            'firstname' => 'Sean',
            'lastname' => 'O\'Broin',
            'instruments' => [
                [
                    'name' => 'Flute'
                ],
                [
                    'name' => 'Guitar',
                    'picto' => 'guitar'
                ]
            ]
        ],
        [
            'image' => 'gavin-pennycook.jpg',
            'firstname' => 'Gavin',
            'lastname' => 'Pennycook',
            'instruments' => [
                [
                    'name' => 'Violon'
                ]
            ]
        ]
    ];
}
