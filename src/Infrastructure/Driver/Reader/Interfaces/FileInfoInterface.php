<?php
declare(strict_types=1);
/**
 * Infrastructure Related Contractor
 * @author Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\FileManager\Infrastructure\Driver\Reader\Interfaces;

/**
 * Interface FileInfoInterface
 * @package Ticaje\FileManager\Infrastructure\Driver\Reader\Interfaces
 * This interface dictates the methods to use when getting information from a specific file
 * We're gonna use fluent interface for this.
 */
interface FileInfoInterface
{
    /**
     * @return string
     */
    public function getExtension(): string;

    /**
     * @return string
     */
    public function getFileName(): string;

    /**
     * @return string
     */
    public function getBaseName(): string;

    /**
     * @return string
     */
    public function getDirName(): string;
}
