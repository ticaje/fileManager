<?php
declare(strict_types=1);
/**
 * Infrastructure Related Contractor
 * @author Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\FileManager\Infrastructure\Driver\Reader\Interfaces;

/**
 * Interface DocumentManagerInterface
 * @package Ticaje\FileManager\Infrastructure\Driver\Reader\Interfaces
 */
interface DocumentManagerInterface
{
    /**
     * @return mixed
     */
    public function generateContent(): mixed;
}
