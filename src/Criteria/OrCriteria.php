<?php

declare(strict_types=1);

namespace Acairns\Dust\Criteria;

use Acairns\Dust\Specification;

final class OrCriteria implements Specification
{
    private Specification $first;
    private Specification $second;

    public function __construct(Specification $first, Specification $second)
    {
        $this->first = $first;
        $this->second = $second;
    }

    public function isSatisfiedBy($item): bool
    {
        return $this->first->isSatisfiedBy($item)
            || $this->second->isSatisfiedBy($item);
    }
}
