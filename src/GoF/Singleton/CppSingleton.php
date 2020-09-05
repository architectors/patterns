<?php

namespace Patterns\GoF\Singleton;

/**
 * Class CppSingleton
 *
 * C++ style Singleton pattern implementation
 * @package Patterns\GoF\Singleton
 */
class CppSingleton
{
    /**
     * Get a single instance of the current class
     * @return self
     */
    public static function getInstance() : self
    {
        static $instance;

        if (!$instance instanceof self) {
            $instance = new self();
        }

        return $instance;
    }

    /**
     * Singleton constructor.
     * Prevent direct object creation
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
