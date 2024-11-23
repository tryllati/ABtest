<?php

namespace App\Services;

use App\Models\Test;
use Illuminate\Database\Eloquent\Collection;

interface ABTestServiceInterface
{
    public function test(): Test;

    public function tests(): Collection;

    public function runTest(Test $test): void;
}
