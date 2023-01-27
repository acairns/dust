<?php

declare(strict_types=1);

namespace Acairns\Dust;

use PHPUnit\Framework\TestCase as PHPUnitTestCase;

abstract class TestCase extends PHPUnitTestCase
{
    public static function assertSatisfied(Specification $specification): void
    {
        static::assertSatisfiedBy($specification, null);
    }

    public static function assertSatisfiedBy(Specification $specification, $item = null): void
    {
        static::assertTrue(
            $specification->isSatisfiedBy($item),
        );
    }

    public static function assertNotSatisfied(Specification $specification): void
    {
        static::assertNotSatisfiedBy($specification, null);
    }

    public static function assertNotSatisfiedBy(Specification $specification, $item = null): void
    {
        static::assertFalse(
            $specification->isSatisfiedBy($item),
        );
    }
}
