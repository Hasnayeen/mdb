<?php

namespace Hasnayeen\Mdb;

use League\CommonMark\Parser\Block\BlockStart;
use League\CommonMark\Parser\Block\BlockStartParserInterface;
use League\CommonMark\Parser\Cursor;
use League\CommonMark\Parser\MarkdownParserStateInterface;

class BladeComponentStartParser implements BlockStartParserInterface
{
    public function tryStart(Cursor $cursor, MarkdownParserStateInterface $parserState): ?BlockStart
    {
        if ($cursor->isIndented() || $cursor->getNextNonSpaceCharacter() !== '<') {
            return BlockStart::none();
        }

        $cursor->advance();
        if ($cursor->getNextNonSpaceCharacter() !== 'x') {
            return BlockStart::none();
        }

        $componentName = $cursor->match('/x-[a-z0-9-]+/');

        return BlockStart::of(new BladeComponentParser($componentName, $cursor->getLine()))->at($cursor);
    }
}
