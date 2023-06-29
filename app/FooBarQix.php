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
            7 => 'Qix',
        ];
    }

    public function combined(int $number): string
    {
        $multipleResult = $this->multiple($number);
        $occurrenceResult = $this->occurrence($number);

        $result = $multipleResult;
        if ($multipleResult !== '' && $occurrenceResult !== '') {
            $result .= ', ';
        }
        $result .= $occurrenceResult;

        if ($result !== '') {
            return $result;
        } else {
            return (string) $number;
        }
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

    public function occurrence(int $number): string
    {
        if ($number <= 0) {
            throw new InvalidArgumentException('Number must be a positive integer.');
        }

        $result = [];

        $digits = str_split((string) $number);

        foreach ($digits as $digit) {
            if (isset($this->rules[$digit])) {
                $result[] = $this->rules[$digit];
            }
        }

        $result = implode(', ', $result);

        if ($result !== '') {
            return $result;
        } else {
            return (string) $number;
        }
    }
}
