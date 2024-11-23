<?php

namespace App\Services;

use App\Components\TargetingRatioDivisionCalculator;
use App\Enums\ABTestDivisionTypeEnum;
use App\Exceptions\DivisionTypeException;
use App\Models\Test;
use App\Models\TestVariant;
use Illuminate\Database\Eloquent\Collection;

class ABTestService implements ABTestServiceInterface
{
    public const AB_TEST_VARIANT_SESSION_KEY = 'ab_test_variants';

    public function __construct(
        public readonly SessionService $sessionService,
        private readonly Test $tests
    ) {
    }

    public function test(): Test
    {
        return $this->tests;
    }

    /**
     * @return Collection<Test>
     */
    public function tests(): Collection
    {
        return $this->tests->get();
    }

    private function testVariantsExist(Test $test): int
    {
        return $test->variants()->count() > 0;
    }

    /**
     * @throws DivisionTypeException
     */
    public function runTest(Test $test): void
    {
        if($this->sessionService->sessionContainTestVariantByTestId($test->id)){
            return;
        }

        if($this->testVariantsExist($test)){
            $variant = $this->divisionCalculator($test);

            $this->sessionService->createDbSessionTestVariant($variant);
            $this->sessionService->createSessionTestEvent($test, $variant);
            $this->sessionService->saveTestVariantInSession($variant);
        }
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
