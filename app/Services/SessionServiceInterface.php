<?php

namespace App\Services;

use App\Models\Session;
use App\Models\SessionTestVariant;

interface SessionServiceInterface
{
    public function session(): Session;

    public function sessionTestVariants(): SessionTestVariant;
}
