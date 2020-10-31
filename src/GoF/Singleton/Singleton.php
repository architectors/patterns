<?php

namespace Patterns\GoF\Singleton;

/**
 * Class Singleton
 * @package Patterns\GoF\Singleton
 */
class Singleton
{
    private static ?self $instance = null;


    /**
     * Get a single instance of the current class
     * @return self
     */
    public static function getInstance() : self
    {
        if (!self::$instance instanceof self) {
            self::$instance = new self();
        }

        return self::$instance;
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
