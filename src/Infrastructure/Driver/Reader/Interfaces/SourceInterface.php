<?php
declare(strict_types=1);
/**
 * Infrastructure Related Contractor
 * @author Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\FileManager\Infrastructure\Driver\Reader\Interfaces;

use Iterator;

/**
 * Interface SourceInterface
 * @package Ticaje\FileManager\Infrastructure\Driver\Reader\Interfaces
 */
interface SourceInterface
{
    /**
     * @param string $fileName
     *
     * @return SourceInterface
     */
    public function setSource(string $fileName): SourceInterface;

    /**
     * @return Iterator
     */
    public function getData(): Iterator;
}
