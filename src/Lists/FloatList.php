<?php

declare(strict_types=1);

namespace J0hnys\Typed\Lists;

use J0hnys\Typed\Collection;
use J0hnys\Typed\Types\FloatType;

final class FloatList extends Collection
{
    public function __construct(array $data = [])
    {
        parent::__construct(new FloatType(), $data);
    }
}
