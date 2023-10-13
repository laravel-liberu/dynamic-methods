<?php

namespace LaravelLiberu\DynamicMethods\Traits;

use Illuminate\Support\Str;

trait Mutators
{
    use Methods;

    public function hasGetMutator($key)
    {
        return static::$dynamicMethods['get'.Str::studly($key).'Attribute']
            || parent::hasGetMutator($key);
    }

    public function hasSetMutator($key)
    {
        return isset(static::$dynamicMethods['set'.Str::studly($key).'Attribute'])
            || parent::hasSetMutator($key);
    }
}
