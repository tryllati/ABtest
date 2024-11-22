<?php

namespace App\Components;

use App\Interfaces\MakeAbleInterface;
use App\Traits\MakeAbleTrait;

abstract class DivisionCalculator implements DivisionCalculatorInterface, MakeAbleInterface
{
    use MakeAbleTrait;
}
