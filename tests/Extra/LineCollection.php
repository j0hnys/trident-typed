<?php

declare(strict_types=1);

namespace J0hnys\Typed\Tests\Extra;

use J0hnys\Typed\Collection;
use J0hnys\Typed\Types\GenericType;

class LineCollection extends Collection
{
    public function __construct(array $lines)
    {
        parent::__construct(new GenericType(Line::class), $lines);
    }

    public function current(): Line
    {
        return parent::current();
    }
}
