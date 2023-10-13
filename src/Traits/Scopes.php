<?php

namespace LaravelLiberu\DynamicMethods\Traits;

trait Scopes
{
    use Methods;

    public function hasNamedScope($scope)
    {
        return isset(static::$dynamicMethods['scope'.ucfirst($scope)])
            || parent::hasNamedScope($scope);
    }
}
