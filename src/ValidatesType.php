<?php

declare(strict_types=1);

namespace J0hnys\Typed;

use TypeError;
use J0hnys\Typed\Exceptions\WrongType;

trait ValidatesType
{
    private function validateType(Type $type, $value)
    {
        try {
            $value = $type->validate($value);
        } catch (TypeError $typeError) {
            throw WrongType::wrap($typeError);
        }

        return $value;
    }
}
