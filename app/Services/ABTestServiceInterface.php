<?php

namespace App\Services;

use App\Models\Test;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

interface ABTestServiceInterface
{
    public function testCount(): int;

    public function testVariantsCount(Test $test): int;

    public function testVariantsExist(Test $test): int;

    public function availableTests(): Builder;

    public function tests(): Collection;

    public function runTest(Test $test): void;
}
