<?php

namespace WebSpanner\SourceMonkey\Models;

use Illuminate\Support\Str as IlluminateStr;

class PHPClass
{
    public function __construct($path = null)
    {
        $this->path = $path;
    }

    public function getProperty($propertyName)
    {
        $propertyLines = collect(new \SplFileObject($this->path))->keyBy(function ($line, $index) {
            return $index + 1;
        })->filter(function ($line, $index) {
            return (new Str($line))->containsPropertyDeclaration();
        })->filter(function ($propertyLine) use ($propertyName) {
            return (new Str($propertyLine))->getVariableName() == $propertyName;
        });

        return $propertyLines->map(function ($line) {
            return trim(
                IlluminateStr::before(
                IlluminateStr::after($line, '$'),
                '='
                )
            );
        });
    }
}
