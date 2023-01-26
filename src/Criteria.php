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

    public function isSatisfiedBy($item): bool
    {
        try {
            array_walk($this->specifications, static function(Specification $specification) use ($item) {
                if (! $specification->isSatisfiedBy($item)) {
                    throw new \RuntimeException();
                }
            });
        }
        catch (\RuntimeException $exception) {
            return false;
        }

        return true;
    }
}
