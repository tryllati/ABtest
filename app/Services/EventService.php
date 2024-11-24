<?php

namespace App\Services;

use App\Models\Test;
use App\Models\TestVariant;

class EventService implements EventServiceInterface
{
    public function __construct(
        private readonly SessionService $sessionService
    ) {
    }

    public function updatePageViewEventWithABTestByTestId(int $testId): void
    {
        $abTestVariants = $this->sessionService->sessionManager->get(ABTestService::AB_TEST_VARIANT_SESSION_KEY);

        $event = $this->sessionService->session()->events()
            ->where('type', 'pageview')
            ->get()
            ->last();

        $eventDetails = $event->data;
        $eventDetails['ab_test'][$testId] = $abTestVariants[$testId]->setHidden(['created_at', 'updated_at']);

        $event->update([
            'data' => $eventDetails
        ]);
    }

    public function createTestSelectedTestEvent(Test $test, TestVariant $variant): void
    {
        $this->sessionService->session()->events()
            ->create([
                'url'  => url(request()->path()),
                'type' => 'testselected',
                'data' => [
                    'ABTest' => [
                        'test_id'      => $test->id,
                        'test_name'    => $test->name,
                        'variant_id  ' => $variant->id,
                        'variant_name' => $variant->name,
                    ]
                ]
            ]);
    }
}
