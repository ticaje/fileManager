<?php
declare(strict_types=1);
/**
 * Infrastructure Related Agent
 * @author Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\FileManager\Implementors\Reader\File\BoxSpout;

use Box\Spout\Common\Type;
use Ticaje\FileManager\Infrastructure\Driver\Reader\Interfaces\Gateway\CsvFileInterface;

/**
 * Class Csv
 * @package Ticaje\FileManager\Implementors\Reader\File
 */
class Csv extends Base implements CsvFileInterface
{
    /** @var string $type */
    protected $type = Type::CSV;

    /**
     * @inheritDoc
     */
    public function setDelimiter(string $delimiter): CsvFileInterface
    {
        $this->concretion->setFieldDelimiter($delimiter);

        return $this;
    }

}
