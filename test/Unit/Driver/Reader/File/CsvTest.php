<?php
declare(strict_types=1);
/**
 * Test Suite Class
 * @author Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\FileManager\Test\Unit\Driver\Reader\File;

use Ticaje\FileManager\Infrastructure\Driver\Reader\File\Csv;
use Ticaje\FileManager\Infrastructure\Driver\Reader\Interfaces\Gateway\CsvFileInterface as ImplementorInterface;

/**
 * Class CsvTest
 * @package Ticaje\FileManager\Test\Unit\Driver\Reader\File
 */
class CsvTest extends BaseTest
{
    protected $class = Csv::class;

    protected $implementorInterface = ImplementorInterface::class;

}
