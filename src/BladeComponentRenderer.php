<?php

namespace Hasnayeen\Mdb;

use Illuminate\Support\Facades\Blade;
use League\CommonMark\Node\Node;
use League\CommonMark\Renderer\ChildNodeRendererInterface;
use League\CommonMark\Renderer\NodeRendererInterface;

class BladeComponentRenderer implements NodeRendererInterface
{
    public function render(Node $node, ChildNodeRendererInterface $childRenderer)
    {
        /** @var BladeComponentBlock $node */
        BladeComponentBlock::assertInstanceOf($node);

        return Blade::render($node->getLiteral());
    }
}
