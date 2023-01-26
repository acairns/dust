<?php

declare(strict_types=1);

namespace Acairns\Dust;

class StubSpecification implements Specification
{
    private bool $result;

    public function __construct(bool $result)
    {
        $this->result = $result;
    }

    public function isSatisfiedBy($item): bool
    {
        return $this->result;
    }
}
