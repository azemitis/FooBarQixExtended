<?php declare(strict_types=1);

namespace App;

use InvalidArgumentException;

class InfQixFoo
{
    private array $rules;

    public function __construct()
    {
        $this->rules = [
            8 => 'Inf',
            7 => 'Qix',
            3 => 'Foo',
        ];
    }

    public function combined(int $number): string
    {
        $multipleResult = $this->multiple($number);
        $occurrenceResult = $this->occurrence($number);
        $sumResult = $this->sumOfDigits($number);

        $result = $multipleResult;
        if ($multipleResult !== '' && $occurrenceResult !== '') {
            $result .= '; ';
        }
        $result .= $occurrenceResult;

        if ($sumResult) {
            $result .= 'Inf';
        }

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
                $result .= $output . '; ';
            }
        }

        $trimmedResult = rtrim($result, '; ');

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

        $result = implode('; ', $result);

        if ($result !== '') {
            return $result;
        } else {
            return '';
        }
    }

    public function sumOfDigits(int $number): bool
    {
        $digits = str_split((string) $number);
        $sum = array_sum($digits);

        return $sum !== 0 && $sum % 8 === 0;
    }
}
