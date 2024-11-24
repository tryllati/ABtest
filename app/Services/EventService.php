<?php

namespace App\Services;

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
}
