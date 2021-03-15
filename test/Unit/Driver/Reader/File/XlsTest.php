<?php
declare(strict_types=1);
/**
 * Test Suite Class
 * @author Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\FileManager\Test\Unit\Driver\Reader\File;

use Ticaje\FileManager\Infrastructure\Driver\Reader\File\Xls;
use Ticaje\FileManager\Infrastructure\Driver\Reader\Interfaces\Gateway\XlsFileInterface as ImplementorInterface;

/**
 * Class XlsTest
 * @package Ticaje\FileManager\Test\Unit\Driver\Reader\File
 */
class XlsTest extends BaseTest
{
    protected $class = Xls::class;

    protected $implementorInterface = ImplementorInterface::class;
}
