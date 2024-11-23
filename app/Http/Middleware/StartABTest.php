<?php

namespace App\Http\Middleware;

use App\Models\Test;
use App\Services\ABTestService;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StartABTest
{
    public function __construct(
        private readonly ABTestService $testService
    ) {
    }

    public function handle(Request $request, Closure $next): Response
    {
        if($this->testService->tests()->isNotEmpty()) {

            $this->testService->tests()
                ->map(
                    fn(Test $test) => $this->testService->runTest($test)
                );
        }

        return $next($request);
    }
}
