<?php

namespace WebSpanner\SourceMonkey\Tests;

use PHPUnit\Framework\TestCase as PHPUnitTestCase;

abstract class TestCase extends PHPUnitTestCase
{
    public function setUp()
    {
        // Define our constants
        if (!defined('TEST_FILES_DIR')) {
            define('TEST_FILES_DIR', realpath(__DIR__.'/test-files'));
            define('TEST_AREA_DIR', '/tmp/source-monkey');
        }

        // Clear out the test area directory if it exists and make a fresh one
        shell_exec('rm -rf '.TEST_AREA_DIR);
        mkdir(TEST_AREA_DIR);
    }

    protected function copyNewTestFile($filename = 'test-file.txt')
    {
        $newPath = TEST_AREA_DIR.'/'.$filename;

        copy(TEST_FILES_DIR.'/'.$filename, $newPath);

        return realpath($newPath);
    }

    protected function getLinesOfFile($path)
    {
        $zeroIndexed = file($path);

        $oneIndexed = [];

        foreach($zeroIndexed as $line => $contents)
        {
            $oneIndexed[$line + 1] = trim($contents);
        }

        return $oneIndexed;
    }

}
