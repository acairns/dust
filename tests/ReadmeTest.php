<?php

declare(strict_types=1);

namespace Acairns\Dust;

class ReadmeTest extends TestCase
{
    public function test_example_usage_from_readme(): void
    {
        $first = new StubSpecification(true);
        $second = new StubSpecification(true);
        $third = new StubSpecification(false);

        $both = new AndCriteria($first, $second);
        $any = new OrCriteria($first, $second);

        $criteria = (new Criteria($first, $second))
            ->and($both)
            ->or($any)
            ->not($third);

        self::assertSatisfied($criteria);
    }

    public function test_conditional_usage_example(): void
    {
        $true = new StubSpecification(true);
        $false = new StubSpecification(false);

        $criteria = (new Criteria($false))
            ->ifNotThen($true)
            ->ifThen($false)
            ->or($true);

        self::assertSatisfied($criteria);
    }
}
