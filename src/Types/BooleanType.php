<?php

declare(strict_types=1);

namespace J0hnys\Typed\Types;

use J0hnys\Typed\Type;

final class BooleanType implements Type
{
    use Nullable;

    public function validate($value): bool
    {
        return $value;
    }

    public function __toString(): string
    {
        return 'boolean';
    }
}
