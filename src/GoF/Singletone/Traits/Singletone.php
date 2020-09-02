<?php

namespace Patterns\Gof\Singletone\Traits;

/**
 * Trait Singletone
 */
trait Singletone
{
    private static $instance;


    /**
     * Get single instance of self
     * @return self
     */
    public static function singletone() : self
    {
        if (!self::$instance instanceof self) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * Singletone constructor
     * Must be private
     */
    private function __construct()
    {
    }

    /**
     * Disable object cloning
     */
    private function __clone()
    {
    }
}
