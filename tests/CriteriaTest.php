<?php

declare(strict_types=1);

namespace Acairns\Dust;

class CriteriaTest extends TestCase
{
    public function test_it_can_validate_multiple_specifications_and_criteria(): void
    {
        $passing = new StubSpecification(true);
        $failing = new StubSpecification(false);

        $and = new AndCriteria($passing, $passing);
        $or  = new OrCriteria($passing, $failing);

        $criteria = new Criteria($passing, $and, $or);

        self::assertSatisfied($criteria);
    }

    public function test_it_fails_when_a_single_specification_fails(): void
    {
        $passing = new StubSpecification(true);
        $failing = new StubSpecification(false);

        $and = new AndCriteria($passing, $passing);
        $or  = new OrCriteria($passing, $failing);

        self::assertNotSatisfied(
            new Criteria($passing, $and, $or, $failing)
        );
    }

    public function test_multiple_criteria_can_be_nested(): void
    {
        $passing = new StubSpecification(true);
        $failing = new StubSpecification(false);

        $and = new AndCriteria($passing, $passing);
        $or  = new OrCriteria($passing, $failing);

        $criteria = new Criteria($passing, $and, $or);

        self::assertSatisfied(
            new Criteria($passing, $and, $or, $criteria)
        );
    }

    public function test_it_can_create_nested_compositions(): void
    {
        $passing = new StubSpecification(true);
        $failing = new StubSpecification(false);

        $criteria = new Criteria($passing);

        $andComposition = $criteria->and($failing);
        $orComposition = $criteria->or($failing);

        self::assertNotSatisfied($andComposition);
        self::assertSatisfied($orComposition);
    }

    public function test_it_can_support_fluid_interface(): void
    {
        $specification = new StubSpecification(true);

        $criteria = (new Criteria($specification))
            ->and($specification)
            ->or($specification);

        self::assertSatisfied($criteria->and($specification));
    }

    public function test_it_checks_simple_not_satisfied_criteria(): void
    {
        $true = new StubSpecification(true);
        $false = new StubSpecification(false);

        $simple = (new Criteria($true))
            ->not($false);

        self::assertSatisfied($simple);

        $complex = (new Criteria($true))
            ->not($false)
            ->and($simple)
            ->not($simple);

        self::assertNotSatisfied($complex);
    }

    public function test_it_can_handle_complex_nested_not_criteria(): void
    {
        $true = new StubSpecification(true);
        $false = new StubSpecification(false);

        $simple = (new Criteria($true))
            ->not($false);

        $complex = (new Criteria($true))
            ->not($false)
            ->and($simple)
            ->not($simple);

        self::assertNotSatisfied($complex);
    }
}
