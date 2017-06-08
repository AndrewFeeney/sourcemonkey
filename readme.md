# SourceMonkey

SourceMonkey is a package for working with source code, or text files on your local filesystem. SourceMonkey is useful for automated code generation and modification within your application.

## Installation

To install with composer use the following command:

    composer install webspanner/sourcemonkey

## Usage

### Instantiating the class

Pass the fully qualified path to the file which you are editing into the constructor.

    $sourceMonkey = new SourceMonkey('/tmp/my-file.php');

### Inserting a line in to a file

To insert a string into a file after a given line number, moving all later text further down the page use the `insertAfterLine()` method

    $sourceMonkey->insertAfterLine('some string', 42);

### Writing a string to a file

To write a string to a file, overwriting it's existing contents use the `write()` method.

    $sourceMonkey->write('some string');

### Reading a file's contents

To read the contents of a file into an array of strings, without line breaks use the `getLines()` method.

    $sourceMonkey->getLines();

