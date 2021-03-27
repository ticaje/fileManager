<?php
declare(strict_types=1);
/**
 * Infrastructure Related Contractor
 * @author Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\FileManager\Infrastructure\Driver\Iterator;

/**
 * Interface SimpleIteratorInterface
 * @package Ticaje\FileManager\Infrastructure\Driver\Iterator
 */
interface SimpleIteratorInterface
{
    /**
     * @param int $number
     *
     * @return array|null
     */
    public function findRow(int $number): ?array;

    /**
     * @param int $rowIndex
     * @param int $columnIndex
     *
     * @return mixed
     */
    public function findCell(int $rowIndex, int $columnIndex);

    /**
     * @param int $begin
     * @param int $end
     *
     * @return array|null
     */
    public function getChunk(int $begin, int $end): ?array;
}
