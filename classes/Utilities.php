<?php

declare(strict_types=1);

class Utilities
{
    static public function humanDate(string $dateToFormat): string
    {
        return date('D jS M, Y', strtotime($dateToFormat));
    }
}
