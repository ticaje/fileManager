<?php
declare(strict_types=1);
/**
 * Infrastructure Related Agent
 * @author Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\FileManager\Implementors\Reader\File\BoxSpout;

use Box\Spout\Common\Exception\UnsupportedTypeException;
use Box\Spout\Reader\Common\Creator\ReaderFactory;
use Box\Spout\Reader\Exception\ReaderNotOpenedException;
use Box\Spout\Reader\ReaderInterface;
use Box\Spout\Reader\SheetInterface;
use Exception;
use Generator;
use Iterator;
use Ticaje\FileManager\Infrastructure\Driver\Reader\Interfaces\Gateway\FileGatewayInterface;

/**
 * Class Base
 * @package Ticaje\FileManager\Implementors\Reader\File\BoxSpout
 */
abstract class Base implements FileGatewayInterface
{
    /** @var ReaderInterface $concretion */
    protected $concretion;

    /** @var string $type */
    protected $type;

    /**
     * Base constructor.
     * @throws Exception
     */
    public function __construct()
    {
        try {
            $this->concretion = ReaderFactory::createFromType($this->type);
        } catch (UnsupportedTypeException $exception) {
            throw new Exception("Reader Agent Class does not exist");
        }
    }

    /**
     * @inheritDoc
     */
    public function fetchData(string $fileName): Iterator
    {
        $this->concretion->open($fileName);
        $sheet = $this->getActiveSheet();

        return $this->yieldData($sheet);
    }

    /**
     * @return SheetInterface
     * @throws ReaderNotOpenedException
     */
    private function getActiveSheet(): SheetInterface
    {
        $sheets = $this->concretion->getSheetIterator();
        /** @var Sheet $sheet */
        foreach ($sheets as $sheet) {
            if ($sheet->isActive()) {
                return $sheet;
            }
        }
    }

    /**
     * @param SheetInterface $sheet
     *
     * @return Generator
     */
    private function yieldData(SheetInterface $sheet)
    {
        foreach ($sheet->getRowIterator() as $row) {
            yield $row;
        }
    }

    /**
     * @inheritDoc
     */
    public function asArray($object)
    {
        return is_array($object) ? $object : $object->toArray();
    }
}
