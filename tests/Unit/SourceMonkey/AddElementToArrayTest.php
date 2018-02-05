<?php

namespace WebSpanner\SourceMonkey\Tests\Unit\SourceMonkey;

use WebSpanner\SourceMonkey\SourceMonkey;
use WebSpanner\SourceMonkey\Tests\TestCase;

class AddElementToArrayTest extends TestCase
{
    /** @test */
    function the_add_element_to_array_method_adds_a_new_element_to_the_end_of_an_array_in_a_file()
    {
        $this->markTestIncomplete();

        // Copy the default test file into our testing directory
        $testFilePath = $this->copyNewTestFile('PSR4Class.php');

        // Instantiate the class
        $sourceMonkey = new SourceMonkey($testFilePath);

        // Do the work
        $lines = $sourceMonkey->addElementToArray();

        // Assert that we get each line as we expect
        $this->assertEquals('Line 1', $lines[1]) ;
        $this->assertEquals('Line 2', $lines[2]);
    }
}

