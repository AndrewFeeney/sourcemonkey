<?php

namespace WebSpanner\SourceMonkey\Tests\Unit\SourceMonkey;

use WebSpanner\SourceMonkey\SourceMonkey;
use WebSpanner\SourceMonkey\Tests\TestCase;

class InsertLineAfterTest extends TestCase
{
    /** @test */
    function the_insert_line_after_method_inserts_a_string_on_a_new_line_after_the_given_line()
    {
        // Copy the default test file into our testing directory
        $testFilePath = $this->copyNewTestFile();

        // Get the lines of file into a one-indexed array
        $file = $this->getLinesOfFile($testFilePath);

        // Assert that the file's initial state is as we expect
        $this->assertEquals($file[9], 'Line 9');
        $this->assertEquals($file[10], 'Line 10');
        $this->assertEquals($file[11], 'Line 11');

        // Do the work
        $sourceMonkey = new SourceMonkey($testFilePath);
        $sourceMonkey->insertLineAfter('Have a banana', 9);

        // Get the lines of the edited file in a one-indexed array
        $editedFile = $this->getLinesOfFile($testFilePath);

        // Assert that the file's new state is as we expect
        $this->assertEquals($editedFile[9], 'Line 9');
        $this->assertEquals($editedFile[10], 'Have a banana');
        $this->assertEquals($editedFile[11], 'Line 10');
    }
}
