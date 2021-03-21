<?php
declare(strict_types=1);
/**
 * Infrastructure Related Agent
 * @author Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\FileManager\Implementors\Reader\File\BoxSpout;

use Box\Spout\Common\Type;
use Ticaje\FileManager\Infrastructure\Driver\Reader\Interfaces\Gateway\XlsxFileInterface;

/**
 * Class Xlsx
 * @package Ticaje\FileManager\Implementors\Reader\File
 */
class Xlsx extends Base implements XlsxFileInterface
{
    /** @var string $type */
    protected $type = Type::XLSX;
}
