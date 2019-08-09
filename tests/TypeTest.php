<?php

declare(strict_types=1);

namespace J0hnys\Typed\Tests;

use TypeError;
use J0hnys\Typed\T;
use J0hnys\Typed\Type;
use J0hnys\Typed\Collection;
use J0hnys\Typed\Types\ArrayType;
use J0hnys\Typed\Types\FloatType;
use J0hnys\Typed\Tests\Extra\Post;
use J0hnys\Typed\Types\StringType;
use J0hnys\Typed\Tests\Extra\Wrong;
use J0hnys\Typed\Types\BooleanType;
use J0hnys\Typed\Types\GenericType;
use J0hnys\Typed\Types\IntegerType;
use J0hnys\Typed\Types\CallableType;
use J0hnys\Typed\Types\CollectionType;
use J0hnys\Typed\Exceptions\InferredTypeError;

class TypeTest extends TestCase
{
    /**
     * @test
     * @dataProvider successProvider
     */
    public function successful_types($type, $value)
    {
        $collection = new Collection($type);

        $collection[] = $value;

        $this->assertCount(1, $collection);
    }

    /**
     * @test
     * @dataProvider failProvider
     */
    public function wrong_types_throw_type_errors($type, $value)
    {
        $this->expectException(TypeError::class);

        $collection = new Collection($type);

        $collection[] = $value;
    }

    /** @test */
    public function unknown_types_cannot_be_inferred()
    {
        $this->expectException(InferredTypeError::class);

        T::infer(STDOUT);
    }

    /**
     * @test
     * @dataProvider inferredProvider
     */
    public function type_inference($value, Type $type)
    {
        $this->assertInstanceOf(get_class($type), T::infer($value));
    }

    public function successProvider()
    {
        return [
            [new ArrayType(), ['a']],
            [new BooleanType(), true],
            [new CallableType(), function () {
            }],
            [new CollectionType(), new Collection(new ArrayType())],
            [new FloatType(), 1.1],
            [new GenericType(Post::class), new Post()],
            [new IntegerType(), 1],
            [new StringType(), 'a'],
            [T::nullable(T::string()), 'a'],
            [T::nullable(T::collection()), null],
        ];
    }

    public function failProvider()
    {
        return [
            [ArrayType::class, new Wrong()],
            [BooleanType::class, new Wrong()],
            [CallableType::class, new Wrong()],
            [CollectionType::class, new Wrong()],
            [FloatType::class, new Wrong()],
            [new GenericType(Post::class), new Wrong()],
            [IntegerType::class, new Wrong()],
            [StringType::class, new Wrong()],
            [T::nullable(T::string()), new Wrong()],
        ];
    }

    public function inferredProvider()
    {
        return [
            ['a', T::string()],
            [1, T::int()],
            [1.1, T::float()],
            [new Post(), T::generic(Post::class)],
            [[], T::array()],
            [true, T::boolean()],
            [function () {
            }, T::callable()],
        ];
    }
}
