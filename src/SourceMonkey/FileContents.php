<?php

namespace WebSpanner\SourceMonkey;

use Illuminate\Support\Str;

class FileContents
{
    public function __construct($contents)
    {
        $this->contents = $contents;
    }

    public function firstLineWithString($string)
    {
        foreach ($this->lines() as $lineNumber => $contents) {
            if (Str::contains($contents, $string)) {
                return $lineNumber;
            }
        }
    }

    public function lines()
    {
        return file($this->contents);
    }

    public function linesBefore($lineNumber)
    {
        return (new FileContents(implode(array_slice($this->lines(), $lineNumber), '')));
    }

    public function toString()
    {
        return $this->contents;
    }
}
