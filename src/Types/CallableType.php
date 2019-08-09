<?php

declare(strict_types=1);

namespace J0hnys\Typed\Types;

use J0hnys\Typed\Type;

final class CallableType implements Type
{
    use Nullable;

    public function validate($value): callable
    {
        return $value;
    }

    public function __toString(): string
    {
        return 'callable';
    }
}
