<?php

namespace WebSpanner\SourceMonkey;

use Illuminate\Support\Str;
use WebSpanner\SourceMonkey\Exceptions\MonkeyNeedsAFileException;
use WebSpanner\SourceMonkey\Models\PHPClass;

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

        array_splice($fileContents, (int) $lineNumber, 0, [$string]);

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

        foreach (file($this->getPath()) as $key => $line) {
            $lines[$key + 1] = str_replace("\n", '', $line);
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
     * Returns the line number of the first line which contains the given string
     */
    public function firstLineWithString($string)
    {
        foreach ($this->getLines() as $lineNumber => $lineText) {
            if (Str::contains($lineText, $string)) {
                return $lineNumber;
            }
        }
    }

    /**
     * Delete the line at the given number
     *
     * @param int $lineNumber
     **/
    public function deleteLine($lineNumber)
    {
        $fileContents = $this->getLines();

        array_splice($fileContents, $lineNumber - 1, 1);

        $this->write(implode("\n", $fileContents));
    }

    /**
     * Replace the contents of the given line number with the given string
     *
     * @param int $lineNumber
     * @param string $string
     */
    public function replaceLine($lineNumber, $string)
    {
        $this->insertLineAfter($string, $lineNumber);

        $this->deleteLine($lineNumber);
    }

    /**
     * Get the property matching the given name from the source file and return
     * it as a Property model object or null if it does not exist
     *
     * @param string $propertyName
     * @return Models\Property|null
     **/
    public function getProperty($propertyName)
    {
        return $this->getClass()->getProperty($propertyName);
    }

    public function getClass()
    {
        return (new PHPClass($this->getPath()));
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
