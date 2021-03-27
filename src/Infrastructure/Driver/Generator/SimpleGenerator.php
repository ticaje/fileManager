<?php
declare(strict_types=1);
/**
 * Infrastructure Related Agent
 * @author Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\FileManager\Infrastructure\Driver\Source;

use Iterator as BuiltInAgent;
use Ticaje\FileManager\Infrastructure\Driver\Reader\Interfaces\DocumentManagerInterface;

/**
 * Class SimpleGenerator
 * @package Ticaje\FileManager\Infrastructure\Source\Generator
 */
class SimpleGenerator implements SimpleGeneratorInterface
{
    /** @var DocumentManagerInterface $documentManager */
    private $documentManager;

    /**
     * Generator constructor.
     *
     * @param DocumentManagerInterface $documentManager
     */
    public function __construct(
        DocumentManagerInterface $documentManager
    ) {
        $this->documentManager = $documentManager;
    }

    /**
     * @inheritDoc
     */
    public function generate(): BuiltInAgent
    {
        $this->yieldContent();
    }

    /**
     * @return BuiltInAgent
     * This is specific implementation
     */
    private function yieldContent(): BuiltInAgent
    {
        foreach ($this->documentManager->generateContent() as $item) {
            yield $item;
        }
    }
}
