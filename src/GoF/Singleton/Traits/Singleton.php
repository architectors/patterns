<?php

namespace Patterns\Gof\Singleton\Traits;

/**
 * Trait Singleton
 */
trait Singleton
{
    private static $instance;


    /**
     * Get single instance of self
     * @return self
     */
    public static function singleton() : self
    {
        if (!self::$instance instanceof self) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * Singleton constructor
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
