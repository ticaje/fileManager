<?php
declare(strict_types=1);
/**
 * Infrastructure Related Agent
 * @author Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\FileManager\Infrastructure\Driver\Iterator;

use Iterator as SuperIterator;
use Ticaje\FileManager\Infrastructure\Driver\Reader\Interfaces\Gateway\FileGatewayInterface;

/**
 * Class SimpleIterator
 * @package Ticaje\FileManager\Infrastructure\Driver\Iterator
 * This is an API to provide high level interaction with iterators. It offers composition over inheritance approach, so
 * the iterator is being injected through constructor and the class offers the possibility of accessing useful features
 * to files especially on big ones
 */
class SimpleIterator implements SimpleIteratorInterface
{
    /** @var SuperIterator $content */
    private $content;

    /** @var array $cachedRows */
    private $cachedRows = [];

    /** @var FileGatewayInterface $implementor */
    private $implementor;

    /**
     * SimpleIterator constructor.
     *
     * @param SuperIterator        $content
     * @param FileGatewayInterface $implementor
     */
    public function __construct(
        SuperIterator $content,
        FileGatewayInterface $implementor
    ) {
        $this->content = $content;
        $this->implementor = $implementor;
    }

    /**
     * @inheritDoc
     */
    public function findCell(int $rowIndex, int $columnIndex)
    {
        $row = $this->findRow($rowIndex);

        return $row ? $row[$columnIndex] : null;
    }

    /**
     * @inheritDoc
     */
    public function findRow(int $number): ?array
    {
        $found = false;
        $result = null;
        if (isset($this->cachedRows[$number])) {
            return $this->cachedRows[$number];
        }
        while (!$found) {
            $row = $this->content->current();
            $key = $this->content->key();
            $found = $number === $key;
            $this->cachedRows[$key] = $row;
            $result = $row;
            $this->content->next();
        }

        return $this->implementor->asArray($result);
    }

    /**
     * @inheritDoc
     */
    public function getChunk(int $begin, int $end): ?array
    {
        $result = [];
        // Returns none if no range at all
        if ($begin >= $end || $begin < 0) {
            return $result;
        }
        // Pick data from cache first of none
        if ($begin < $this->content->key()) {
            // Last row not inclusive
            $range = range($begin, $end - 1);
            array_walk($range, function ($i) use (&$result) {
                if (isset($this->cachedRows[$i])) {
                    $result[$i] = $this->cachedRows[$i];
                }
            });
        }
        // Go for the left un-cached data
        // Csv file with no data and just the header, key is null
        while (!is_null($this->content->key()) && ($this->content->key() < $end)) {
            $key = $this->content->key();
            // This almost unlikely
            if (isset($this->cachedRows[$key])) {
                $result[$key] = $this->cachedRows[$key];
                $this->content->next();
                continue;
            }
            $row = $this->content->current();
            if ($key >= $begin) {
                $result[$key] = $this->implementor->asArray($row);
            }
            // Always cache row
            $this->cachedRows[$key] = $this->implementor->asArray($row);
            $this->content->next();
        }

        return $result;
    }
}