<?php

declare(strict_types=1);

namespace J0hnys\Typed;

use J0hnys\Typed\Types\NullType;

interface Type
{
    public function validate($value);

    public function nullable(): NullType;
}
