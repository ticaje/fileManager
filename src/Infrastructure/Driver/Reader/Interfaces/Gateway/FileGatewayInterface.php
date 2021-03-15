<?php
declare(strict_types=1);
/**
 * Infrastructure Related Contractor
 * @author Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\FileManager\Infrastructure\Driver\Reader\Interfaces\Gateway;

use Iterator;

/**
 * Interface FileGatewayInterface
 * @package Ticaje\FileManager\Infrastructure\Driver\Reader\Interfaces\Gateway
 */
interface FileGatewayInterface
{
    /**
     * @param string $fileName
     *
     * @return Iterator
     */
    public function fetchData(string $fileName): Iterator;

    /**
     * @param $object
     *
     * @return mixed
     */
    public function asArray($object);
}
