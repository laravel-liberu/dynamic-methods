<?php

namespace LaravelLiberu\DynamicMethods\Traits;

use BadMethodCallException;
use Closure;

trait Methods
{
    protected static array $dynamicMethods = [];

    public function __call($method, $args)
    {
        if (isset(static::$dynamicMethods[$method])) {
            $params = [static::$dynamicMethods[$method], $this, static::class];
            $closure = Closure::bind(...$params);

            return $closure(...$args);
        }

        if (method_exists(parent::class, '__call')) {
            return parent::__call($method, $args);
        }

        throw new BadMethodCallException(
            'Method '.static::class.'::'.$method.'() not found'
        );
    }

    public static function addDynamicMethod($name, Closure $method)
    {
        static::$dynamicMethods[$name] = $method;
    }
}
