<?php

declare(strict_types=1);

namespace Acairns\Dust\Criteria;

use Acairns\Dust\StubSpecification;
use Acairns\Dust\TestCase;

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
