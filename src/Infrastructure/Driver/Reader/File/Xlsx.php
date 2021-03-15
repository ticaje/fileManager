<?php
declare(strict_types=1);
/**
 * Infrastructure Related Agent
 * @author Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\FileManager\Infrastructure\Driver\Reader\File;

use Ticaje\FileManager\Infrastructure\Driver\Reader\Interfaces\Gateway\XlsxFileInterface;
use Ticaje\FileManager\Infrastructure\Driver\Reader\Interfaces\FileInterface;
use Ticaje\FileManager\Infrastructure\Driver\Reader\Interfaces\SourceInterface;

/**
 * Class Xlsx
 * @package Ticaje\FileManager\Infrastructure\Driver\Reader\File
 */
class Xlsx extends Base implements SourceInterface, FileInterface
{
    /**
     * Xlsx constructor.
     *
     * @param XlsxFileInterface $implementor
     * @param bool              $hasHeader
     */
    public function __construct(
        XlsxFileInterface $implementor,
        bool $hasHeader = false
    ) {
        parent::__construct($implementor, $hasHeader);
    }
}
