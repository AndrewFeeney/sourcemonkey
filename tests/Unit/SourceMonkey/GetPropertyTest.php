<?php

namespace WebSpanner\SourceMonkey\Tests\Unit\SourceMonkey;

use WebSpanner\SourceMonkey\SourceMonkey;
use WebSpanner\SourceMonkey\Tests\TestCase;
use WebSpanner\SourceMonkey\Models\Property;

class GetPropertyTest extends TestCase
{
    /** @test */
    public function the_get_property_method_returns_a_property_class_representing_a_classes_property()
    {
        // Copy the default test file into our testing directory
        $testFilePath = $this->copyNewTestFile('PSR4Class.php');

        // Instantiate the class
        $sourceMonkey = new SourceMonkey($testFilePath);

        // Do the work
        $property = $sourceMonkey->getProperty('array');
        dd(__LINE__);
        // Assert that we get a Property object
        $this->assertInstanceOf(Property::class, $property);
    }
}
