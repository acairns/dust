<?php

declare(strict_types=1);

namespace Acairns\Dust\Conditions;

use Acairns\Dust\StubSpecification;
use Acairns\Dust\TestCase;

class IfThenCriteriaTest extends TestCase
{
    public function test_it_ignores_when_condition_does_not_satisfy(): void
    {
        $true = new StubSpecification(true);
        $false = new StubSpecification(false);

        self::assertNotSatisfied(
            new IfThenCriteria($false, $true)
        );
    }

    public function test_it_evaluates_if_condition_satisfied(): void
    {
        $true = new StubSpecification(true);
        $false = new StubSpecification(false);

        self::assertNotSatisfied(
            new IfThenCriteria($true, $false)
        );

        self::assertSatisfied(
            new IfThenCriteria($true, $true)
        );
    }
}
