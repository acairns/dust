<?php

declare(strict_types=1);

namespace Acairns\Dust\Conditions;

use Acairns\Dust\StubSpecification;
use Acairns\Dust\TestCase;

class IfNotConditionTest extends TestCase
{
    public function test_it_ignores_when_condition_satisfied(): void
    {
        $first = new StubSpecification(true);
        $second = new StubSpecification(false);

        self::assertSatisfied(
            new IfNotCondition($first, $second)
        );
    }

    public function test_it_evaluates_if_condition_did_not_satisfy(): void
    {
        $true = new StubSpecification(true);
        $false = new StubSpecification(false);

        self::assertSatisfied(
            new IfNotCondition($false, $true)
        );

        self::assertNotSatisfied(
            new IfNotCondition($false, $false)
        );
    }
}
