<?php
declare(strict_types=1);
/**
 * Infrastructure Related Contractor
 * @author Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\FileManager\Infrastructure\Driver\Reader\Interfaces;

use Ticaje\FileManager\Infrastructure\Driver\Reader\Interfaces\Gateway\FileGatewayInterface;

/**
 * Interface FileInterface
 * @package Ticaje\FileManager\Infrastructure\Driver\Reader\Interfaces
 * We're gonna use fluent interface for this.
 */
interface FileInterface
{
    /**
     * @return mixed
     */
    public function getHeader();

    /**
     * @return mixed
     */
    public function getContent();

    /**
     * @return bool
     */
    public function hasHeader(): bool;

    /**
     * @return FileGatewayInterface
     */
    public function getImplementor(): FileGatewayInterface;
}
