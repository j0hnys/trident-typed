<?php

declare(strict_types=1);

namespace J0hnys\Typed\Lists;

use J0hnys\Typed\Collection;
use J0hnys\Typed\Types\GenericType;

final class GenericList extends Collection
{
    public function __construct(string $type, array $data = [])
    {
        parent::__construct(new GenericType($type), $data);
    }
}
