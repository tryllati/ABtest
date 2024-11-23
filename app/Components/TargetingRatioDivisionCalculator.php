<?php

namespace App\Components;

use App\Models\Test;
use App\Models\TestVariant;
use App\Services\SessionService;
use Illuminate\Support\Collection;

class TargetingRatioDivisionCalculator extends DivisionCalculator
{
    private TestVariant $nextVariant;

    public function __construct(
        private readonly SessionService $sessionService
    ) {
    }

    public function calculate(Test $test): static
    {
        $variants = $test->variants()->get();

        $subtests = [];
        foreach($variants as $variant){

            $subtests[] = [
                'name'         => $variant->name,
                'target_ratio' => $variant->ratio_number,
                'displays'     => $this->dbSessionTestVariantsCount($variant)
            ];
        }

        $this->setNextVariant(
            $variants,
            $this->determineNextSubtest($subtests)
        );

        return $this;
    }

    public function nextVariant(): TestVariant
    {
        return $this->nextVariant;
    }

    private function setNextVariant(Collection $variants, array $nextSubtest): void
    {
        $this->nextVariant = $variants->filter(
            function(TestVariant $variant) use ($nextSubtest) {
                return $nextSubtest['name'] === $variant->name;
            }
        )->first();
    }

    /**
     * by ChatGPT
     */
    private function determineNextSubtest(array $tests): array
    {
        // Calculate total targeting rate and impressions
        $totalWeights = array_sum(array_column($tests, 'target_ratio'));
        $totalDisplays = array_sum(array_column($tests, 'displays'));

        // Calculate variance for each subtest
        $differences = [];
        foreach ($tests as $key => $test) {
            $normalizedWeight = $test['target_ratio'] / $totalWeights;
            $currentRatio = $totalDisplays > 0 ? $test['displays'] / $totalDisplays : 0;

            $differences[$key] = $normalizedWeight - $currentRatio;
        }

        // Select the subtest with the largest deviation
        $nextTestKey = array_keys($differences, max($differences))[0];

        return $tests[$nextTestKey];
    }

    private function dbSessionTestVariantsCount(TestVariant $variant): int
    {
        return $this->sessionService->sessionTestVariants()
                    ->where('test_variant_id', $variant->id)
                    ->count();
    }
}
