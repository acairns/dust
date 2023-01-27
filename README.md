# Dust

[![CI](https://github.com/acairns/dust/actions/workflows/ci.yaml/badge.svg)](https://github.com/acairns/dust/actions)

Specification Library for PHP

**Note:** Library is currently being developed.

## Requirements

- PHP >= 7.4


## Setup

```
composer require acairns/dust
```


## Usage

Again, this is in active development - interface will definitely change!
Still figuring out an intuitive interface, so it's overly verbose until then.

```php
$first = new FirstRule();
$second = new SecondRule();
$third = new ThirdRule();

$both = new AndCriteria($first, $second);
$any = new OrCriteria($first, $second);

$criteria = (new Criteria($first, $second))
    ->and($both)
    ->or($any)
    ->not($third);

$criteria->isSatisfiedBy($something);
```

Dust can handle conditional criteria.

But, be careful - it can impact comprehension.

```php
$true = new StubSpecification(true);
$false = new StubSpecification(false);

$criteria = (new Criteria($false))      // false
    ->ifNotThen($true)                  // true
    ->ifThen($false)                    // false
    ->or($true);                        // true

$criteria->isSatisfiedBy($something);   // true
```


## Reading

- [The original Specification Pattern paper by Martin Fowler and Eric Evans](https://www.martinfowler.com/apsupp/spec.pdf)
