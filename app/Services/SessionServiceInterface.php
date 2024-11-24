<?php

namespace App\Services;

use App\Models\Session;
use App\Models\SessionTestVariant;
use App\Models\TestVariant;

interface SessionServiceInterface
{
    public function session(): Session;

    public function sessionTestVariants(): SessionTestVariant;

    public function sessionContainTestVariantByTestId(int $testId): bool;

    public function createDbSessionTestVariant(TestVariant $variant): void;

    public function saveTestVariantInSession(TestVariant $variant): void;
}
