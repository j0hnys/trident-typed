<?php

declare(strict_types=1);

namespace J0hnys\Typed\Tests\Extra;

use J0hnys\Typed\Struct;
use J0hnys\Typed\Types\GenericType;

/**
 * @property Point a
 * @property Point b
 */
class Line extends Struct
{
    public function __construct(int $x1, int $y1, int $x2, int $y2)
    {
        parent::__construct([
            'a' => new GenericType(Point::class),
            'b' => new GenericType(Point::class),
        ]);

        $this->a = new Point($x1, $y1);
        $this->b = new Point($x2, $y2);
    }
}
