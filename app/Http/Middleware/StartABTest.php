<?php

namespace App\Http\Middleware;

use App\Services\ABTestService;
use App\Services\SessionService;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StartABTest
{
    public function __construct(
        private readonly ABTestService $testService,
        private readonly SessionService $sessionService
    ) {
    }

    public function handle(Request $request, Closure $next): Response
    {

        if($this->testService->testExist()) {



        }else{
            $this->sessionService->emptyABTest();
        }


        //exit('---');

        return $next($request);
    }
}
