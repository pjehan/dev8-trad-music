<?php

function dump(mixed $var, bool $stop = true): void
{
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
    if ($stop) {
        die;
    }
}

function getHeader(string $title, string $description = null): void
{
    require_once 'layout/header.php';
}

function getFooter(): void
{
    require_once 'layout/footer.php';
}
