<?php
declare(strict_types=1);
/**
 * Infrastructure Related Agent
 * @author Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\FileManager\Implementors\Reader\File;

use Iterator;
use PhpOffice\PhpSpreadsheet\Reader\Xls as XlsLibrary;
use Ticaje\FileManager\Infrastructure\Driver\Reader\Interfaces\Gateway\XlsFileInterface;

/**
 * Class Xls
 * @package Ticaje\FileManager\Implementors\Reader\File
 */
class Xls implements XlsFileInterface
{
    /** @var XlsLibrary $concretion */
    private $concretion;

    /**
     * Xls constructor.
     *
     * @param XlsLibrary $concretion
     */
    public function __construct(
        XlsLibrary $concretion
    ) {
        $this->concretion = $concretion;
    }

    /**
     * @inheritDoc
     */
    public function fetchData(string $fileName): Iterator
    {
        $sheet = $this->concretion->load($fileName);

        return $sheet->getActiveSheet()->getRowIterator();
    }
}
