<?php

namespace Hasnayeen\Mdb;

use League\CommonMark\Node\Node;
use Hasnayeen\Mdb\BladeComponentBlock;
use Illuminate\Support\Facades\Blade;
use League\CommonMark\Renderer\NodeRendererInterface;
use League\CommonMark\Renderer\ChildNodeRendererInterface;

class BladeComponentRenderer implements NodeRendererInterface
{
    public function render(Node $node, ChildNodeRendererInterface $childRenderer)
    {
        /** @var BladeComponentBlock $node */
        BladeComponentBlock::assertInstanceOf($node);

        return Blade::render($node->getLiteral());
    }
}
