<?php

namespace Hasnayeen\Mdb;

use League\CommonMark\Node\Block\AbstractBlock;
use League\CommonMark\Node\StringContainerInterface;

class BladeComponentBlock extends AbstractBlock implements StringContainerInterface
{
    private string $literal = '';

    public function getLiteral(): string
    {
        return $this->literal;
    }

    public function setLiteral(string $literal): void
    {
        $this->literal = $literal;
    }
}
