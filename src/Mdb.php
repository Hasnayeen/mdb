<?php

namespace Hasnayeen\Mdb;

use Illuminate\Support\Str;
class Mdb
{
    public function render(string $content, $config = []): string
    {
        return Str::mdb($content, $config);
    }
}
