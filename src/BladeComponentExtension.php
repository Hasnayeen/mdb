<?php

namespace Hasnayeen\Mdb;

use Hasnayeen\Mdb\BladeComponentRenderer;
use League\CommonMark\Environment\EnvironmentBuilderInterface;
use League\CommonMark\Extension\ExtensionInterface;

class BladeComponentExtension implements ExtensionInterface
{
    public function register(EnvironmentBuilderInterface $environment): void
    {
        $environment->addBlockStartParser(new BladeComponentStartParser(), 200);
        $environment->addRenderer(BladeComponentBlock::class, new BladeComponentRenderer());
    }
}
