<?php

declare(strict_types=1);

namespace Acairns\Dust;

use PHPUnit\Framework\TestCase;

class OrSpecificationTest extends TestCase
{
    public function test_it_passes_when_both_items_are_true(): void
    {
        $first = new StubSpecification(true);
        $second = new StubSpecification(true);

        $specification = new OrSpecification($first, $second);

        self::assertTrue(
            $specification->isSatisfiedBy('anything')
        );
    }

    public function test_it_passes_when_one_item_is_false(): void
    {
        $first = new StubSpecification(true);
        $second = new StubSpecification(false);

        $specification = new OrSpecification($first, $second);

        self::assertTrue(
            $specification->isSatisfiedBy('anything')
        );
    }

    public function test_it_fails_when_both_items_are_false(): void
    {
        $first = new StubSpecification(false);
        $second = new StubSpecification(false);

        $specification = new OrSpecification($first, $second);

        self::assertFalse(
            $specification->isSatisfiedBy('anything')
        );
    }
}
