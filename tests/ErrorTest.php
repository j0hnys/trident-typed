<?php

declare(strict_types=1);

namespace J0hnys\Typed\Tests;

use TypeError;
use J0hnys\Typed\T;
use J0hnys\Typed\Tuple;
use J0hnys\Typed\Struct;
use J0hnys\Typed\Collection;
use J0hnys\Typed\Tests\Extra\Post;
use J0hnys\Typed\Lists\GenericList;
use J0hnys\Typed\Tests\Extra\Wrong;
use J0hnys\Typed\Types\GenericType;
use J0hnys\Typed\Tests\Extra\HelperClass;

class ErrorTest extends TestCase
{
    /** @test */
    public function collection_stacktrace_shows_correct_line()
    {
        $list = new GenericList(Post::class);

        try {
            $list[] = 1;
        } catch (TypeError $e) {
            $line = __LINE__ - 2;

            $fileName = __FILE__;

            $this->assertContains("{$fileName}:{$line}", $e->getMessage());
        }
    }

    /** @test */
    public function nested_stacktrace_shows_correct_line()
    {
        $list = new Collection(new GenericType(Post::class));

        try {
            $list[] = 1;
        } catch (TypeError $e) {
            $line = __LINE__ - 2;

            $fileName = __FILE__;

            $this->assertContains("{$fileName}:{$line}", $e->getMessage());
        }
    }

    /** @test */
    public function error_in_class_backtrace_shows_correct_line()
    {
        try {
            new HelperClass();
        } catch (TypeError $e) {
            $this->assertContains('HelperClass.php:15', $e->getMessage());
        }
    }

    /** @test */
    public function tuple_stacktrace_shows_correct_line()
    {
        $tuple = new Tuple(T::generic(Wrong::class), T::generic(Wrong::class));

        try {
            $tuple[0] = 'a';
        } catch (TypeError $e) {
            $line = __LINE__ - 2;

            $fileName = __FILE__;

            $this->assertContains("$fileName:{$line}", $e->getMessage());
        }
    }

    /** @test */
    public function struct_stacktrace_shows_correct_line()
    {
        $struct = new Struct([
            'name' => T::string(),
        ]);

        try {
            $struct['name'] = new Wrong();
        } catch (TypeError $e) {
            $line = __LINE__ - 2;

            $fileName = __FILE__;

            $this->assertContains("$fileName:{$line}", $e->getMessage());
        }
    }
}
