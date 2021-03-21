<?php
declare(strict_types=1);
/**
 * Infrastructure Related Agent
 * @author Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\FileManager\Infrastructure\Driver\Traits;

use Iterator;
use Ticaje\FileManager\Infrastructure\Driver\Reader\Interfaces\FileInterface as ReferencedSignature;

/**
 * Trait FileInterface
 * @package Ticaje\FileManager\Infrastructure\Driver\Traits
 * Classes using this trait must implement interface FileInterface
 */
trait FileInterface
{
    /** @var Iterator|array $header */
    private $header = [];

    /** @var Iterator|array $content */
    private $content;

    /**
     * @inheritDoc
     */
    private function setHeader(): ReferencedSignature
    {
        if ($this->hasHeader()) {
            $this->header = $this->isContentIterator() ? (function () {
                return $this->content->current();
            })() : array_shift($this->getContent());
        }

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getHeader()
    {
        return !empty($this->header) ? $this->header : (function () {
            $this->setHeader();

            return $this->header;
        })();
    }

    /**
     * @inheritDoc
     */
    private function setContent(Iterator $content): ReferencedSignature
    {
        $this->content = $content;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getContent():Iterator
    {
        return $this->content;
    }

    /**
     * @inheritDoc
     */
    public function hasHeader(): bool
    {
        return $this->hasHeader;
    }

    private function isContentIterator()
    {
        return $this->content instanceof Iterator;
    }
}
