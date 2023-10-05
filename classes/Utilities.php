<?php

declare(strict_types=1);

class Utilities
{
    static public function humanDate(string $dateToFormat): string
    {
        return date('D jS M, Y', strtotime($dateToFormat));
    }

    static public function redirect(string $location, int $status): void
    {
        header("Location: $location", response_code: $status);
        exit;
    }
}
