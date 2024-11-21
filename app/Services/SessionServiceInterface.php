<?php

namespace App\Services;

interface SessionServiceInterface
{
    public function emptyABTest(): void;

    public function issetABTest(): bool;
}
