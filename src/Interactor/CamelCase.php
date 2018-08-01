<?php
declare(strict_types=1);

namespace Xaddax\Interactor;

final class CamelCase
{
    public function __invoke(string $string): string
    {
        return lcfirst(str_replace('_', '', ucwords($string, '_')));
    }
}