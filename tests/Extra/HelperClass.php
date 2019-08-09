<?php

declare(strict_types=1);

namespace J0hnys\Typed\Tests\Extra;

use J0hnys\Typed\Lists\IntegerList;

class HelperClass
{
    public function __construct()
    {
        $list = new IntegerList();

        $list[] = new Wrong();
    }
}
