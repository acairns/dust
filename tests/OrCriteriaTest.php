<?php

declare(strict_types=1);

namespace Acairns\Dust;

class OrCriteriaTest extends TestCase
{
    public function test_it_passes_when_both_items_are_true(): void
    {
        $first = new StubSpecification(true);
        $second = new StubSpecification(true);

        self::assertSatisfied(
            new OrCriteria($first, $second)
        );
    }

    public function test_it_passes_when_one_item_is_false(): void
    {
        $first = new StubSpecification(true);
        $second = new StubSpecification(false);

        self::assertSatisfied(
            new OrCriteria($first, $second)
        );
    }

    public function test_it_fails_when_both_items_are_false(): void
    {
        $first = new StubSpecification(false);
        $second = new StubSpecification(false);

        self::assertNotSatisfied(
            new OrCriteria($first, $second)
        );
    }
}
