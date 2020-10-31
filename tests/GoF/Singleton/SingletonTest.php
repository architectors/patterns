<?php

namespace Patterns\Tests\GoF\Singleton;

use Patterns\GoF\Singleton\Singleton;
use Patterns\GoF\Singleton\CppSingleton;
use Patterns\GoF\Singleton\Traits\Singleton as SingletonTrait;
use PHPUnit\Framework\TestCase;

class SingletonTest extends TestCase
{
    public function testSingletonClass()
    {
        $first  = Singleton::getInstance();
        $second = Singleton::getInstance();

        $this->assertSame($first, $second);
    }

    public function testCppStyleSingletonTrait()
    {
        $first  = CppSingleton::getInstance();
        $second = CppSingleton::getInstance();

        $this->assertSame($first, $second);
    }

    public function testSingletonTrait()
    {
        $first  = SingletonConcern::singleton();
        $second = SingletonConcern::singleton();

        $this->assertSame($first, $second);
    }
}

class SingletonConcern
{
    use SingletonTrait;
}
