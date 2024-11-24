<?php

namespace App\Services;

interface EventServiceInterface
{
    public function updatePageViewEventWithABTestByTestId(int $testId): void;
}
