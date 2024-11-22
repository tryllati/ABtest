<?php

namespace App\Components;

use App\Models\Test;
use App\Models\TestVariant;

interface DivisionCalculatorInterface
{
    public function calculate(Test $test): static;

    public function nextVariant(): TestVariant;
}
