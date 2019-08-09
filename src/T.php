<?php

declare(strict_types=1);

namespace J0hnys\Typed;

use J0hnys\Typed\Types\NullType;
use J0hnys\Typed\Types\ArrayType;
use J0hnys\Typed\Types\FloatType;
use J0hnys\Typed\Types\UnionType;
use J0hnys\Typed\Types\StringType;
use J0hnys\Typed\Types\BooleanType;
use J0hnys\Typed\Types\GenericType;
use J0hnys\Typed\Types\IntegerType;
use J0hnys\Typed\Types\CallableType;
use J0hnys\Typed\Types\CollectionType;
use J0hnys\Typed\Types\StructType;
use J0hnys\Typed\Exceptions\InferredTypeError;

class T
{
    public static function array(): ArrayType
    {
        return new ArrayType();
    }

    public static function bool(): BooleanType
    {
        return new BooleanType();
    }

    public static function boolean(): BooleanType
    {
        return new BooleanType();
    }

    public static function callable(): CallableType
    {
        return new CallableType();
    }

    public static function collection(): CollectionType
    {
        return new CollectionType();
    }

    public static function struct(): StructType
    {
        return new StructType();
    }

    public static function float(): FloatType
    {
        return new FloatType();
    }

    public static function double(): FloatType
    {
        return new FloatType();
    }

    public static function generic(string $type): GenericType
    {
        return new GenericType($type);
    }

    public static function int(): IntegerType
    {
        return new IntegerType();
    }

    public static function integer(): IntegerType
    {
        return new IntegerType();
    }

    public static function string(): StringType
    {
        return new StringType();
    }

    public static function union(Type ...$types): UnionType
    {
        return new UnionType(...$types);
    }

    public static function nullable(Type $type): NullType
    {
        return new NullType($type);
    }

    public static function infer($value): Type
    {
        if (is_callable($value)) {
            return new CallableType();
        }

        if (is_object($value)) {
            return new GenericType(get_class($value));
        }

        $type = gettype($value);

        if (! method_exists(self::class, $type)) {
            throw InferredTypeError::cannotInferType($type);
        }

        return forward_static_call(self::class.'::'.$type);
    }
}
