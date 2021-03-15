<?php
declare(strict_types=1);
/**
 * Infrastructure Related Agent
 * @author Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\FileManager\Infrastructure\Driver\Reader\File;

use Ticaje\FileManager\Infrastructure\Driver\Reader\Interfaces\Gateway\CsvFileInterface;
use Ticaje\FileManager\Infrastructure\Driver\Reader\Interfaces\FileInterface;
use Ticaje\FileManager\Infrastructure\Driver\Reader\Interfaces\SourceInterface;

/**
 * Class Csv
 * @package Ticaje\FileManager\Infrastructure\Driver\Reader\File
 */
class Csv extends Base implements SourceInterface, FileInterface
{
    /** @var string $delimiter */
    private $delimiter = ';';

    /**
     * Csv constructor.
     *
     * @param CsvFileInterface $implementor
     * @param bool             $hasHeader
     * @param string|null      $delimiter
     */
    public function __construct(
        CsvFileInterface $implementor,
        bool $hasHeader = false,
        string $delimiter = null
    ) {
        $implementor->setDelimiter($delimiter ?? $this->delimiter);
        parent::__construct($implementor, $hasHeader);
    }
}
