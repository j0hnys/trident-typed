<?php

declare(strict_types=1);

namespace J0hnys\Typed\Lists;

use J0hnys\Typed\Collection;
use J0hnys\Typed\Types\CallableType;

final class CallableList extends Collection
{
    public function __construct(array $data = [])
    {
        parent::__construct(new CallableType(), $data);
    }
}
