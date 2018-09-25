# SourceMonkey

SourceMonkey is a package for working with source code, or text files on your local filesystem. SourceMonkey is useful for automated code generation and modification within your application.

## Installation

To install with composer use the following command:

    composer install webspanner/sourcemonkey

## Usage

### Instantiating the class

Pass the fully qualified path to the file which you are editing into the constructor.

    $sourceMonkey = new SourceMonkey('/tmp/my-file.php');

## Methods

### `insertLineAfter()`

To insert a string into a file after a given line number, moving all later text further down the page use the `insertLineAfter()` method

    $sourceMonkey->insertLineAfter('some string', 42);

### `write()`

To write a string to a file, overwriting it's existing contents use the `write()` method.

    $sourceMonkey->write('some string');

### `getLines()`

To read the contents of a file into a 1-indexed array of strings, without line breaks use the `getLines()` method.

    $sourceMonkey->getLines();

### `getPath()`

Get the path of the SourceMonkey instance

    $sourceMonkey->getPath();

### `firstLineWithString()`

Returns the line number of the first line which contains the given string

    $sourceMonkey->firstLineWithString($string);
    {

### `deleteLine()`

Delete the line at the given number

    $sourceMonkey->deleteLine($lineNumber);

### `replaceLine()`

Replace the contents of the given line number with the given string

    $sourceMonkey->replaceLine($lineNumber, $string);

###  `getProperty()`

Get the PHP class property matching the given name from the class in the given source file and return it as a Property model object or null if it does not exist

    $sourceMonkey->getProperty($propertyName);

### `getClass()`

Get the PHP class in the given file name

    $sourceMonkey->getClass()

