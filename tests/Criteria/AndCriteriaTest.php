<?php

declare(strict_types=1);

namespace Acairns\Dust\Criteria;

use Acairns\Dust\StubSpecification;
use Acairns\Dust\TestCase;

class AndCriteriaTest extends TestCase
{
    public function test_it_passes_when_both_items_are_true(): void
    {
        $first = new StubSpecification(true);
        $second = new StubSpecification(true);

        self::assertSatisfied(
            new AndCriteria($first, $second)
        );
    }

    public function test_it_fails_when_one_item_is_false(): void
    {
        $first = new StubSpecification(true);
        $second = new StubSpecification(false);

        self::assertNotSatisfied(
            new AndCriteria($first, $second)
        );
    }

    public function test_it_still_fails_when_both_items_are_false(): void
    {
        $first = new StubSpecification(false);
        $second = new StubSpecification(false);

        self::assertNotSatisfied(
            new AndCriteria($first, $second)
        );
    }
}
