<?php

declare(strict_types=1);

namespace Acairns\Dust;

class ReadmeTest extends TestCase
{
    public function test_example_usage_from_readme(): void
    {
        $first = new StubSpecification(true);
        $second = new StubSpecification(true);

        $both = new AndCriteria($first, $second);
        $any = new OrCriteria($first, $second);

        $criteria = (new Criteria($first, $second))
            ->and($both)
            ->or($any);

        self::assertSatisfied($criteria);
    }
}
