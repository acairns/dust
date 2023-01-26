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
$first = new FirstRuleSpecification();
$second = new SecondRuleSpecification();

$both = new AndCriteria($first, $second);
$or = new OrCriteria($first, $second);

$criteria = new Critera($first, $second, $both, $or);

$criteria->isSatisfiedBy($something);
```


## Reading

[The original Specification Pattern paper by Martin Fowler and Eric Evans](https://www.martinfowler.com/apsupp/spec.pdf)

