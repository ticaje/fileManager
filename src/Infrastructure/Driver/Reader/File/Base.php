<?php
declare(strict_types=1);
/**
 * Infrastructure Related Agent
 * @author Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\FileManager\Infrastructure\Driver\Reader\File;

use Iterator;
use Ticaje\FileManager\Infrastructure\Driver\Reader\Interfaces\Gateway\FileGatewayInterface;
use Ticaje\FileManager\Infrastructure\Driver\Reader\Interfaces\SourceInterface;
use Ticaje\FileManager\Infrastructure\Driver\Traits\FileInterface as ContractorTrait;

/**
 * Class Base
 * @package Ticaje\FileManager\Infrastructure\Driver\Reader\File
 */
abstract class Base
{
    use ContractorTrait;

    /** @var FileGatewayInterface $implementor */
    protected $implementor;

    /** @var bool $hasHeader */
    protected $hasHeader;

    /**
     * Csv constructor.
     *
     * @param FileGatewayInterface $implementor
     * @param bool                 $hasHeader
     */
    public function __construct(
        FileGatewayInterface $implementor,
        bool $hasHeader = false
    ) {
        $this->implementor = $implementor;
        $this->hasHeader = $hasHeader;
    }

    /**
     * @inheritDoc
     */
    public function setSource(string $fileName): SourceInterface
    {
        $content = $this->implementor->fetchData($fileName);
        $this->setContent($content);
        $this->setHeader();

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getData(): Iterator
    {
        $content = $this->getContent();
        if ($content instanceof Iterator) {
            return $content;
        }
        if (is_array($content)) {
            foreach ($this->getContent() as $item) {
                yield $item;
            }
        }
    }

    /**
     * @inheritDoc
     */
    public function getImplementor(): FileGatewayInterface
    {
        return $this->implementor;
    }
}
