<?php

namespace App\Services;

use App\Exceptions\DivisionTypeException;
use App\Models\Test;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class ABTestService implements ABTestServiceInterface
{
    public function __construct(
        protected readonly SessionService $sessionService,
        protected readonly Test $tests
    ){
    }

    public function testExist(): bool
    {
        return $this->tests()->isNotEmpty();
    }

    public function testISNotExist(): bool
    {
        return $this->tests()->isEmpty();
    }

    public function testCount(): int
    {
        return $this->availableTests()->count();
    }

    public function testVariantsCount(Test $test): int
    {
        return $test->variants()->count();
    }

    public function availableTests(): Builder
    {
        return $this->tests->where('status', 1);
    }

    /**
     * @return Collection<Test>
     */
    public function tests(): Collection
    {
        return $this->availableTests()->get();
    }

    /**
     * @throws DivisionTypeException
     */
    public function division(Test $test): void
    {
        switch($test->type->value)
        {
            case 'targeting ratio':
                    // célzási arány meghatározása
                break;

            // other..

            default:
                throw new DivisionTypeException('Something went wrong!');
        }
    }
}
