<?php

declare(strict_types=1);

namespace J0hnys\Typed\Types;

use J0hnys\Typed\Type;
use J0hnys\Typed\Exceptions\WrongType;

final class GenericType implements Type
{
    use Nullable;

    /** @var string */
    private $type;

    public function __construct(string $type)
    {
        $this->type = $type;
    }

    public function validate($value)
    {
        if (
            ! $value instanceof $this->type
        ) {
            throw WrongType::withMessage("must be of type {$this->type}");
        }

        return $value;
    }

    public function __toString(): string
    {
        return "generic<{$this->type}>";
    }
}
