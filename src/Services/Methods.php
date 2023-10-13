<?php

namespace LaravelLiberu\DynamicMethods\Services;

use Illuminate\Support\Collection;

class Methods
{
    public static function bind(string $model, string | array $methods)
    {
        Collection::wrap($methods)
            ->each(fn ($method) => (new Method($model, new $method()))->bind());
    }
}
