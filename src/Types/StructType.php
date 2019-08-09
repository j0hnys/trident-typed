<?php

declare(strict_types=1);

namespace J0hnys\Typed\Types;

use J0hnys\Typed\Type;
use J0hnys\Typed\Struct;

final class StructType implements Type
{
    use Nullable;

    public function validate($value): Struct
    {
        return $value;
    }

    public function __toString(): string
    {
        return 'struct';
    }
}
