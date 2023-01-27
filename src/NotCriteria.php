<?php

declare(strict_types=1);

namespace Acairns\Dust;

final class NotCriteria implements Specification
{
    private Specification $specification;

    public function __construct(Specification $specification)
    {
        $this->specification = $specification;
    }

    public function isSatisfiedBy($item): bool
    {
        return ! $this->specification->isSatisfiedBy($item);
    }
}
