# Solid File Manager API
## This library is an API to simple use of file management, is oriented when big files managements is involved.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/ticaje/solid-file-manager.svg?style=flat-square)](https://packagist.org/packages/ticaje/solid-file-manager)
[![Quality Score](https://img.shields.io/scrutinizer/g/ticaje/fileManager.svg?style=flat-square)](https://scrutinizer-ci.com/g/ticaje/fileManager)
[![Total Downloads](https://img.shields.io/packagist/dt/ticaje/solid-file-manager.svg?style=flat-square)](https://packagist.org/packages/ticaje/solid-file-manager)

## Preface

Traditionally dealing with big files turns into a nightmare, especially for reading them, cause it brings about sort of bottleneck into our system.
I have provided a solution to this problem be creating an API based on Hexagonal Design and S.O.L.I.D principles that allows developers on just few
steps start reading efficiently big files in an asynchronous way using modern techniques.

## Installation

You can install this package using composer(the only way i recommend)

```bash
composer require ticaje/solid-file-manager
```

## What's the fuzz about this library

This library can be included using standalone project, DI framework or higher level platform like Symfony or Laravel; regardless any context it will work
using loose coupling approach by default. Gonna explain with a sample how easy is to work with.

### Real Life Example 

Imagine that you have a big XLSX file you need to read without breaking your application cause need to read it from a browser just for checking the first five rows of it, 
but the file is too big. It seems weird but this is something that happened to me in the real world. As you can imagine reading the file via standard methods provided in PHP
does not resolve this problem cause there is a time delay you can not afford loosing cause you are on a browser and your app could go down.
The magic to achieving this is by using Generators which allows you to iterate data without the need to build an array in memory cause it uses data yielding by reference
which could be translated as async data handling or at least on demand.

### Standalone Instantiation

```php

<?php
declare(strict_types=1);

use Ticaje\FileManager\Implementors\Reader\File\BoxSpout\Xlsx as Implementor;
use Ticaje\FileManager\Infrastructure\Driver\Iterator\SimpleIterator;
use Ticaje\FileManager\Infrastructure\Driver\Reader\File\Xlsx as FileAgent;

$fileName = '/path/to/file.xlsx'; // Too simple to explain
$implementor = new Implementor();
$fileManager = new FileAgent($implementor, true); // gonna say it has header
$fileManager->setSource($fileName);
$simpleIterator = new SimpleIterator($fileManager);

// Get first five rows
$firstFiveRows = $simpleIterator->getChunk(0, 5);
print_r($firstFiveRows); // printing content out

// Get rest of content
$content = $fileManager->getContent();
while ($content->valid()) {
    $item = $content->current();
    print_r($implementor->asArray($item)); // printing content out
    $content->next();
}

// Printing out header
$header = $fileManager->getHeader();
print_r($implementor->asArray($header));

```

Let me explain every component of our system

___Implementor___

This is the agent that contains the current implementation of XLSX file, you can add your own as long as it implements 

_Ticaje\FileManager\Infrastructure\Driver\Reader\Interfaces\Gateway\XlsxFileInterface_

which requires two methods: fetchData and asArray which are really self explanatory.

___FileAgent___

This is the high level solution to file reading, it's a wrapper to accept, by using Port & Adapters design pattern, XLSX implementations, so it act as a machinery
to read and fetch, using internally data yielding by reference.

It accepts the object in charge of reading the file, can be any implementations and whether the file contains header or not.


___SimpleIterator___

This is the class that actually accepts the generator(the content fetched be reference) and performs custom operations on it, in our case fetching the first 5 rows of our file,
it doesnt matter if the file weights 330kb or 30Mb, it will fetch the content by reference and access it dynamically on demand.

It accepts the file content as Iterator of course and the implementor it self that provides a way to return data using custom methods such extracting a single cell, a set of rows or a chunk if the file.

It's really that simple, if u try then you gonna see how fast it fetches the desired content to browser/consumer.

## Credits

- [Héctor Luis Barrientos](https://github.com/ticaje)
- [All Contributors](../../contributors)

## License

The GNU General Public License (GPLv3). Please see [License File](LICENSE) for more information.
