<?php

namespace Hasnayeen\Mdb;

use League\CommonMark\Node\Block\AbstractBlock;
use League\CommonMark\Parser\Block\AbstractBlockContinueParser;
use League\CommonMark\Parser\Block\BlockContinue;
use League\CommonMark\Parser\Block\BlockContinueParserInterface;
use League\CommonMark\Parser\Cursor;

class BladeComponentParser extends AbstractBlockContinueParser
{
    private BladeComponentBlock $block;

    private string $content = '';

    private string $componentName = '';

    private bool $finished = false;

    public function __construct(string $componentName, ?string $content = '')
    {
        $this->componentName = $componentName;
        $this->content = $content;
        $this->block = new BladeComponentBlock;
    }

    public function getBlock(): BladeComponentBlock
    {
        return $this->block;
    }

    public function isContainer(): bool
    {
        return true;
    }

    public function canContain(AbstractBlock $childBlock): bool
    {
        return true;
    }

    public function canHaveLazyContinuationLines(): bool
    {
        return true;
    }

    public function tryContinue(Cursor $cursor, BlockContinueParserInterface $activeBlockParser): ?BlockContinue
    {
        if ($this->finished) {
            return BlockContinue::none();
        }

        if ($cursor->isBlank()) {
            return BlockContinue::none();
        }

        $remainder = $cursor->getRemainder();
        $line = $cursor->getLine();
        $this->addLine($remainder);

        return BlockContinue::at($cursor);
    }

    public function addLine(string $line): void
    {
        if ($this->content !== '') {
            $this->content .= "\n";
        }

        $this->content .= $line;

        if (str_contains($line, $this->componentName)) {
            $this->finished = true;
        }
    }

    public function closeBlock(): void
    {
        $this->block->setLiteral($this->content);
        $this->content = '';
    }
}
