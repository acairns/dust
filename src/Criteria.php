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

    public function and(Specification $specification): self
    {
        return new self(
            new AndCriteria($this, $specification)
        );
    }

    public function or(Specification $specification): self
    {
        return new self(
            new OrCriteria($this, $specification)
        );
    }

    public function not(Specification $specification): self
    {
        return new self(
            new AndCriteria($this, new NotCriteria($specification))
        );
    }

    public function ifThen(Specification $then): self
    {
        return new self(
            new IfThenCriteria($this, $then)
        );
    }

    public function ifNotThen(Specification $then): self
    {
        return new self(
            new IfNotThenCriteria($this, $then)
        );
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
