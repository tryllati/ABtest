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

    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(Request): (Response) $next
     *
     * @return Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        $tests = $this->testService->tests();

        if($tests->isNotEmpty()) {

            $tests->map(
                fn(Test $test) => $this->testService->runTest($test)
            );
        }

        return $next($request);
    }
}
