<?php

namespace App\Services;

use App\Components\TargetingRatioDivisionCalculator;
use App\Enums\ABTestDivisionTypeEnum;
use App\Exceptions\DivisionTypeException;
use App\Models\Test;
use App\Models\TestVariant;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class ABTestService implements ABTestServiceInterface
{
    public function __construct(
        private readonly SessionService $sessionService,
        private readonly Test $tests
    ){
    }

    public function testCount(): int
    {
        return $this->availableTests()->count();
    }

    public function testVariantsExist(Test $test): int
    {
        return $this->testVariantsCount($test) > 0;
    }

    public function testVariantsCount(Test $test): int
    {
        return $test->variants()->count();
    }

    /**
     * @return Builder<Test>
     */
    public function availableTests(): Builder
    {
        return $this->tests->where('status', 1);
    }

    /**
     * @return Collection<Test>
     */
    public function tests(): Collection
    {
        return $this->availableTests()->get();
    }

    /**
     * @throws DivisionTypeException
     */
    public function runTest(Test $test): void
    {
        if($this->testVariantsExist($test)){
            $variant = $this->divisionCalculator($test);

            $this->sessionService->setABTestVariant($test, $variant);
        }

        // sessionben is ellenőrizni kell majd valahol később
        // Majd a sessionben kell az ellenőrzést megvalósítani, hogy ha ott már van nem kell vele foglalkozni
    }

    /**
     * @param  Test $test
     * @return TestVariant
     *
     * @throws DivisionTypeException
     */
    protected function divisionCalculator(Test $test): TestVariant
    {
        return match ($test->type) {
            ABTestDivisionTypeEnum::TARGETING_RATIO =>
                TargetingRatioDivisionCalculator::make($this->sessionService)
                    ->calculate($test)
                    ->nextVariant(),

            // other division calculator..

            default => throw new DivisionTypeException('Something went wrong!'),
        };
    }
}
