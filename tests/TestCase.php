<?php

namespace Hasnayeen\Mdb\Tests;

use Hasnayeen\Mdb\MdbServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [
            MdbServiceProvider::class,
        ];
    }
}
