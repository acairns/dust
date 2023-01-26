<?php

declare(strict_types=1);

namespace Acairns\Dust;

use PHPUnit\Framework\TestCase;

class AndSpecificationTest extends TestCase
{
    public function test_it_passes_when_both_items_are_true(): void
    {
        $first = new StubSpecification(true);
        $second = new StubSpecification(true);

        $specification = new AndSpecification($first, $second);

        self::assertTrue(
            $specification->isSatisfiedBy('anything')
        );
    }

    public function test_it_fails_when_one_item_is_false(): void
    {
        $first = new StubSpecification(true);
        $second = new StubSpecification(false);

        $specification = new AndSpecification($first, $second);

        self::assertFalse(
            $specification->isSatisfiedBy('anything')
        );
    }

    public function test_it_still_fails_when_both_items_are_false(): void
    {
        $first = new StubSpecification(false);
        $second = new StubSpecification(false);

        $specification = new AndSpecification($first, $second);

        self::assertFalse(
            $specification->isSatisfiedBy('anything')
        );
    }
}
