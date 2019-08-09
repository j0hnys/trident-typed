<?php

declare(strict_types=1);

namespace J0hnys\Typed\Types;

use J0hnys\Typed\Type;

final class ArrayType implements Type
{
    use Nullable;

    public function validate($value): array
    {
        return $value;
    }

    public function __toString(): string
    {
        return 'array';
    }
}
