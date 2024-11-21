<?php

namespace App\Services;

use App\Models\Session;

class SessionService implements SessionServiceInterface
{
    public function __construct(
        private readonly Session $session
    ){
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

    /*
    public function testExist(): bool
    {
        return $this->tests()->isNotEmpty();
    }

    public function testCount(): int
    {
        return $this->availableTests()->count();
    }

    protected function availableTests(): Builder
    {
        return $this->tests->where('status', 1);
    }


*/

}
