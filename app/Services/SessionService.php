<?php

namespace App\Services;

use App\Models\Session;
use App\Models\SessionTestVariant;
use App\Models\TestVariant;
use Illuminate\Contracts\Session\Session as SessionContract;

class SessionService implements SessionServiceInterface
{
    public function __construct(
        public readonly SessionContract $sessionManager,
        private readonly Session $session,
        private readonly SessionTestVariant $sessionTestVariant
    ){
    }

    public function session(): Session
    {
        return $this->session;
    }

    public function sessionTestVariants(): SessionTestVariant
    {
        return $this->sessionTestVariant;
    }

    public function sessionContainTestVariantByTestId(int $testId): bool
    {
        $abTestVariants = $this->sessionManager->get(ABTestService::AB_TEST_VARIANT_SESSION_KEY);

        if(empty($abTestVariants)){
            return false;
        }

        return array_key_exists($testId, $abTestVariants);
    }

    public function createDbSessionTestVariant(TestVariant $variant): void
    {
        $sessionTestVariant = new SessionTestVariant;

        $sessionTestVariant->session_id      = $this->session->id;
        $sessionTestVariant->test_variant_id = $variant->id;

        $sessionTestVariant->save();
    }

    public function saveTestVariantInSession(TestVariant $variant): void
    {
        $abTestVariants = $this->sessionManager->get(ABTestService::AB_TEST_VARIANT_SESSION_KEY);

        if(empty($abTestVariants)){
            $abTestVariants = [];
        }

        $abTestVariants[$variant->test_id] = $variant;

        $this->sessionManager->put(ABTestService::AB_TEST_VARIANT_SESSION_KEY, $abTestVariants);
    }
}
