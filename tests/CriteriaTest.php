<?php

declare(strict_types=1);

namespace Acairns\Dust;

use PHPUnit\Framework\TestCase;

class CriteriaTest extends TestCase
{
    public function test_it_can_validate_multiple_specifications_and_criteria(): void
    {
        $passing = new StubSpecification(true);
        $failing = new StubSpecification(false);

        $and = new AndCriteria($passing, $passing);
        $or  = new OrCriteria($passing, $failing);

        $criteria = new Criteria($passing, $and, $or);

        self::assertTrue(
            $criteria->isSatisfiedBy('something')
        );
    }

    public function test_it_fails_when_a_single_specification_fails(): void
    {
        $passing = new StubSpecification(true);
        $failing = new StubSpecification(false);

        $and = new AndCriteria($passing, $passing);
        $or  = new OrCriteria($passing, $failing);

        $criteria = new Criteria($passing, $and, $or, $failing);

        self::assertFalse(
            $criteria->isSatisfiedBy('something')
        );
    }

    public function test_multiple_criteria_can_be_nested(): void
    {
        $passing = new StubSpecification(true);
        $failing = new StubSpecification(false);

        $and = new AndCriteria($passing, $passing);
        $or  = new OrCriteria($passing, $failing);

        $first = new Criteria($passing, $and, $or);
        $second = new Criteria($passing, $and, $or, $first);

        self::assertTrue(
            $second->isSatisfiedBy('something')
        );
    }
}
