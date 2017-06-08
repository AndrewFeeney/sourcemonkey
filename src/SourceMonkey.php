<?php

namespace WebSpanner;

use WebSpanner\SourceMonkey\Exceptions\MonkeyNeedsAFileException;

class SourceMonkey
{
    public function __construct($path = null)
    {
        $this->path = $path;
    }

    /**
     * Insert the string on a new in the file after the given line number
     *
     * @param string $string
     * @param int $lineNumber
     **/
    public function insertLineAfter($string, $lineNumber)
    {
        $fileContents = $this->getLines();

        array_splice($fileContents, $lineNumber, 0, [$string]);

        $this->write(implode("\n", $fileContents));
    }

    /**
     * Get the lines of the file as a one indexed array, stripping out any newline characters
     *
     * @return array
     **/
    public function getLines()
    {
        $lines = [];

        foreach(file($this->getPath()) as $key => $line) {
            $lines[$key + 1] = str_replace("\n", "", $line);
        }

        return $lines;
    }

    /**
     * Return the path or throw an exception if it is not set
     *
     * @return string
     **/
    public function getPath()
    {
        if (is_null($this->path)) {
            throw new MonkeyNeedsAFileException();
        }

        return $this->path;
    }

    /**
     * Write the given string to the file, replacing its existing contents
     *
     * @param string $string
     **/
    public function write($string)
    {
        file_put_contents($this->getPath(), $string);
    }
}
