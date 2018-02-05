<?php

namespace WebSpanner\SourceMonkey\Tests\Unit\Models\Str;

use WebSpanner\SourceMonkey\Tests\TestCase;
use WebSpanner\SourceMonkey\Models\Str;

class ContainsPropertyDeclarationTest extends TestCase
{
    /** @test */
    public function returns_true_for_public_property()
    {
        $string = new Str;

        $this->assertEquals(1, $string->containsPropertyDeclaration("protected \$blahblah = [\n"));
    }
}
