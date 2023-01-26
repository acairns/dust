<?php

declare(strict_types=1);

namespace Acairns\Dust;

interface Specification
{
    public function isSatisfiedBy($item): bool;
}
