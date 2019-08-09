<?php

declare(strict_types=1);

namespace J0hnys\Typed\Tests\Extra;

use J0hnys\Typed\Tuple;
use J0hnys\Typed\Types\IntegerType;

class Point extends Tuple
{
    public function __construct(int $x, int $y)
    {
        parent::__construct(new IntegerType(), new IntegerType());

        $this[0] = $x;
        $this[1] = $y;
    }

    /**
     * @param mixed $offset
     *
     * @return int
     */
    public function offsetGet($offset)
    {
        return parent::offsetGet($offset);
    }

    public function getX(): int
    {
        return $this[0];
    }

    public function getY(): int
    {
        return $this[1];
    }
}
