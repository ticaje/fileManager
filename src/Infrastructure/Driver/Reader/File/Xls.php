<?php
declare(strict_types=1);
/**
 * Infrastructure Related Agent
 * @author Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\FileManager\Infrastructure\Driver\Reader\File;

use Ticaje\FileManager\Infrastructure\Driver\Reader\Interfaces\Gateway\XlsFileInterface;
use Ticaje\FileManager\Infrastructure\Driver\Reader\Interfaces\FileInterface;
use Ticaje\FileManager\Infrastructure\Driver\Reader\Interfaces\SourceInterface;

/**
 * Class Xls
 * @package Ticaje\FileManager\Infrastructure\Driver\Reader\File
 */
class Xls extends Base implements SourceInterface, FileInterface
{
    /**
     * Xls constructor.
     *
     * @param XlsFileInterface $implementor
     * @param bool             $hasHeader
     */
    public function __construct(
        XlsFileInterface $implementor,
        bool $hasHeader = false
    ) {
        parent::__construct($implementor, $hasHeader);
    }
}
