<?php

declare(strict_types=1);

namespace Acairns\Dust;

use PHPUnit\Framework\TestCase;

class OrCriteriaTest extends TestCase
{
    public function test_it_passes_when_both_items_are_true(): void
    {
        $first = new StubSpecification(true);
        $second = new StubSpecification(true);

        $criteria = new OrCriteria($first, $second);

        self::assertTrue(
            $criteria->isSatisfiedBy('anything')
        );
    }

    public function test_it_passes_when_one_item_is_false(): void
    {
        $first = new StubSpecification(true);
        $second = new StubSpecification(false);

        $criteria = new OrCriteria($first, $second);

        self::assertTrue(
            $criteria->isSatisfiedBy('anything')
        );
    }

    public function test_it_fails_when_both_items_are_false(): void
    {
        $first = new StubSpecification(false);
        $second = new StubSpecification(false);

        $criteria = new OrCriteria($first, $second);

        self::assertFalse(
            $criteria->isSatisfiedBy('anything')
        );
    }
}
