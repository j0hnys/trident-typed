<?php

declare(strict_types=1);

namespace Spatie\Typed\Types;

use Spatie\Typed\Type;
use Spatie\Typed\Struct;

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
