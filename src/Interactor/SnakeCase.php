<?php
declare(strict_types=1);

namespace Xaddax\Interactor;

final class SnakeCase
{
    public function __invoke(string $string): string
    {
        $string = preg_replace('/(?<=\\w)(?=[A-Z])/',"_$1", $string);

        return strtolower($string);
    }
}