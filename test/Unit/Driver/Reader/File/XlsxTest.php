<?php
declare(strict_types=1);
/**
 * Test Suite Class
 * @author Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\FileManager\Test\Unit\Driver\Reader\File;

use Ticaje\FileManager\Infrastructure\Driver\Reader\File\Xlsx;
use Ticaje\FileManager\Infrastructure\Driver\Reader\Interfaces\Gateway\XlsxFileInterface as ImplementorInterface;

/**
 * Class XlsxTest
 * @package Ticaje\FileManager\Test\Unit\Driver\Reader\File
 */
class XlsxTest extends BaseTest
{
    protected $class = Xlsx::class;

    protected $implementorInterface = ImplementorInterface::class;
}
