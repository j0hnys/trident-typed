<?php

declare(strict_types=1);

namespace J0hnys\Typed\Tests\Types;

use J0hnys\Typed\Type;
use PHPUnit\Framework\TestCase;
use J0hnys\Typed\Types\NullType;

final class NullTypeTest extends TestCase
{
    /** @test */
    public function constructor_sets_type(): void
    {
        $type = $this->prophesize(Type::class);

        $nullableType = new NullType($type->reveal());

        $this->assertSame($type->reveal(), $nullableType->getType());
        $this->assertInstanceOf(NullType::class, $nullableType->nullable());
    }
}
