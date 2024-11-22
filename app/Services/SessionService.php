<?php

namespace App\Services;

use App\Http\Middleware\StartSession;
use App\Models\Session;
use App\Models\SessionTestVariant;
use App\Models\Test;
use App\Models\TestVariant;
use Illuminate\Contracts\Session\Session as SessionContract;

class SessionService implements SessionServiceInterface
{
    public function __construct(
        private readonly SessionContract $sessionManager,
        private readonly Session $session,
        private readonly SessionTestVariant $sessionTestVariant // Ha átalakítom külön szolgáltatásokra akkor lehet olvashatóbb
    ){
    }

    public function dbSessionId()
    {
        return $this->sessionManager->get(StartSession::DB_SESSION_ID_KEY);
    }

    public function emptyABTest(): void
    {
        if($this->issetABTest())
        {
            //megszüntetjük a tesztet
        }
    }

    public function issetABTest(): bool
    {

        return true;
    }

    public function session(): Session
    {
        return $this->session;
    }

    public function setABTestVariant(Test $test, TestVariant $variant): void
    {
        // Event létrehozása
        $this->session->events()
            ->update([
                'data' => ['ABTest' => [
                    'test_id'      => $test->id,
                    'test_name'    => $test->name,
                    'variant_name' => $variant->name,
                ]]
            ]);

        // session testVariant létrehozása
        $this->session->testVariants()->create([
            'test_variant_id' => $variant->id
        ]);
    }

    public function sessionTestVariants(): SessionTestVariant // interface
    {
        return $this->sessionTestVariant;
    }

    public function allSessionTestVariants()
    {
        return $this->sessionTestVariant->all();
    }
}
