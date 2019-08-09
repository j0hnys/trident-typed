<?php

declare(strict_types=1);

namespace J0hnys\Typed\Types;

use J0hnys\Typed\Type;
use J0hnys\Typed\Collection;

final class CollectionType implements Type
{
    use Nullable;

    public function validate($value): Collection
    {
        return $value;
    }

    public function __toString(): string
    {
        return 'collection';
    }
}
