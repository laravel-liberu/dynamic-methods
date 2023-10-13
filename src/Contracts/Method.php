<?php

namespace LaravelLiberu\DynamicMethods\Contracts;

use Closure;

interface Method
{
    public function name(): string;

    public function closure(): Closure;
}
