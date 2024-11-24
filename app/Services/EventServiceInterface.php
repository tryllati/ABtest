<?php

namespace App\Services;

use App\Models\Test;
use App\Models\TestVariant;

interface EventServiceInterface
{
    public function updatePageViewEventWithABTestByTestId(int $testId): void;

    public function createTestSelectedTestEvent(Test $test, TestVariant $variant): void;
}
