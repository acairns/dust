<?php

declare(strict_types=1);

namespace Acairns\Dust;

final class IfThenCriteria implements Specification
{
    private Specification $given;
    private Specification $then;

    public function __construct(Specification $given, Specification $then)
    {
        $this->given = $given;
        $this->then = $then;
    }

    public function isSatisfiedBy($item): bool
    {
        if (! $this->given->isSatisfiedBy($item)) {
            return false;
        }

        return $this->then->isSatisfiedBy($item);
    }
}
