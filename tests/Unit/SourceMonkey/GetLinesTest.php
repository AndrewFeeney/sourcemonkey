<?php

namespace WebSpanner\SourceMonkey\Tests\Unit\SourceMonkey;

use WebSpanner\SourceMonkey;
use WebSpanner\SourceMonkey\Tests\TestCase;

class GetLinesTest extends TestCase
{
    /** @test */
    function the_get_lines_method_returns_the_lines_of_a_file_as_a_one_indexed_array_without_any_carriage_returns()
    {
        // Copy the default test file into our testing directory
        $testFilePath = $this->copyNewTestFile('two-line-file.txt');

        // Instantiate the class
        $sourceMonkey = new SourceMonkey($testFilePath);

        // Do the work
        $lines = $sourceMonkey->getLines();

        // Assert that we get each line as we expect
        $this->assertEquals('Line 1', $lines[1]) ;
        $this->assertEquals('Line 2', $lines[2]);
    }
}

