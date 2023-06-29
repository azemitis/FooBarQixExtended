<?php declare(strict_types=1);

namespace App;

use InvalidArgumentException;

class FooBarQix
{
    private array $rules;

    public function __construct()
    {
        $this->rules = [
            3 => 'Foo',
            5 => 'Bar',
        ];
    }

    public function multiple(int $number): string
    {
        if ($number <= 0) {
            throw new InvalidArgumentException('Number must be a positive integer.');
        }

        $result = '';

        foreach ($this->rules as $divisor => $output) {
            if ($number % $divisor === 0) {
                $result .= $output . ', ';
            }
        }

        $trimmedResult = rtrim($result, ', ');

        if ($trimmedResult !== '') {
            return $trimmedResult;
        } else {
            return (string) $number;
        }
    }
}
