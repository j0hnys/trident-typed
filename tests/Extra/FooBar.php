<?php

namespace J0hnys\Typed\Tests\Extra;

use J0hnys\Typed\Tuple;
use J0hnys\Typed\Types\GenericType;

class FooBar extends Tuple
{
    public function __construct(Foo $foo, Bar $bar)
    {
        parent::__construct(new GenericType(Foo::class), new GenericType(Bar::class));

        $this[0] = $foo;
        $this[1] = $bar;
    }

    /**
     * @param mixed $offset
     *
     * @return \J0hnys\Typed\Tests\Extra\Foo|\J0hnys\Typed\Tests\Extra\Bar
     */
    public function offsetGet($offset)
    {
        return parent::offsetGet($offset);
    }
}
