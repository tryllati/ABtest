<?php

declare(strict_types=1);

namespace App\Interfaces;

interface MakeAbleInterface
{
    public static function make(mixed $parameters = null): static;
}
