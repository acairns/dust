<?php

declare(strict_types=1);

namespace Acairns\Dust;

final class Criteria implements Specification
{
    /** @var Specification[] */
    private array $specifications;

    public function __construct(Specification ...$specifications)
    {
        $this->specifications = $specifications;
    }

    public function and(Specification $specification): Specification
    {
        return new AndCriteria($specification, $this);
    }

    public function or(Specification $specification): Specification
    {
        return new OrCriteria($specification, $this);
    }

    public function isSatisfiedBy($item): bool
    {
        foreach ($this->specifications as $specification) {
            if (! $specification->isSatisfiedBy($item)) {
                return false;
            }
        }

        return true;
    }
}
