<?php

declare(strict_types=1);

namespace J0hnys\Typed\Types;

use J0hnys\Typed\Type;

final class IntegerType implements Type
{
    use Nullable;

    public function validate($value): int
    {
        return $value;
    }

    public function __toString(): string
    {
        return 'integer';
    }
}
