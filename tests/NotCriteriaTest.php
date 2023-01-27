<?php

declare(strict_types=1);

namespace Acairns\Dust;

class NotCriteriaTest extends TestCase
{
    public function test_it_inverses(): void
    {
        $true = new StubSpecification(true);
        $false = new StubSpecification(false);

        self::assertNotSatisfied(new NotCriteria($true));
        self::assertSatisfied(new NotCriteria($false));
    }
}
