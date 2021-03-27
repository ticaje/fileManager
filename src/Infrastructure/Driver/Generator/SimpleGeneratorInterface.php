<?php
declare(strict_types=1);
/**
 * Infrastructure Related Contractor
 * @author Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\FileManager\Infrastructure\Driver\Source;

/** The preference it's gonna be a \Generator but it's gonna be based only in a contract agreement, no constraints around */
use Iterator as BuiltInAgent;

/**
 * Interface SimpleGeneratorInterface
 * @package Ticaje\FileManager\Infrastructure\Driver\Source
 */
interface SimpleGeneratorInterface
{
    /**
     * @return BuiltInAgent
     */
    public function generate(): BuiltInAgent;
}
