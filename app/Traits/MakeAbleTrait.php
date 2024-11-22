<?php

namespace App\Traits;

trait MakeAbleTrait
{
    public static function make(mixed $parameters = null): static
    {
        return is_null($parameters)
            ? new static()
            : new static($parameters);
    }
}
