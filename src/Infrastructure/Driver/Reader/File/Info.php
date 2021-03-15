<?php
declare(strict_types=1);
/**
 * Infrastructure Related Agent
 * @author Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\FileManager\Infrastructure\Driver\Reader\File;

use Ticaje\FileManager\Infrastructure\Driver\Reader\Interfaces\FileInfoInterface;

/**
 * Class Info
 * @package Ticaje\FileManager\Infrastructure\Driver\Reader\File
 */
class Info implements FileInfoInterface
{
    /** @var mixed $fileInfo */
    private $fileInfo;

    /**
     * Info constructor.
     *
     * @param string $fileName
     */
    public function __construct(string $fileName)
    {
        $this->fileInfo = pathinfo($fileName);
    }

    /**
     * @inheritDoc
     */
    public function getBaseName(): string
    {
        return $this->fileInfo['basename'];
    }

    /**
     * @inheritDoc
     */
    public function getDirName(): string
    {
        return $this->fileInfo['dirname'];
    }

    /**
     * @inheritDoc
     */
    public function getExtension(): string
    {
        return $this->fileInfo['extension'];
    }

    /**
     * @inheritDoc
     */
    public function getFileName(): string
    {
        return $this->fileInfo['filename'];
    }
}
