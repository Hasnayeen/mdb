<?php

namespace Hasnayeen\Mdb\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Hasnayeen\Mdb\Mdb
 */
class Mdb extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Hasnayeen\Mdb\Mdb::class;
    }
}
