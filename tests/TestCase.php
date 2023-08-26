<?php

namespace Hasnayeen\Mdb\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Hasnayeen\Mdb\MdbServiceProvider;

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
