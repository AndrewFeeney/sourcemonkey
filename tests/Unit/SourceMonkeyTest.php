<?php

namespace WebSpanner\SourceMonkey\Tests;

class SourceMonkeyTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        define('TEST_FILES_DIR', realpath(__DIR__.'/test-files'));
    }

    /** @test */
    function the_insert_line_method_inserts_a_string_on_the_given_line()
    {
        $testFilePath = $this->copyNewTestFile();

        $this->assertEquals(file($testFilePath)[9], 'Line 9');
        $this->assertEquals(file($testFilePath)[10], 'Line 10');
        $this->assertEquals(file($testFilePath)[11], 'Line 11');

        $sourceMonkey = new SourceMonkey($testFilePath);

        $sourceMonkey->insertLine(10, 'Have a banana');

        $this->assertEquals(file($testFilePath)[9], 'Line 9');
        $this->assertEquals(file($testFilePath)[10], 'Have a banana');
        $this->assertEquals(file($testFilePath)[11], 'Line 10');
    }
}
