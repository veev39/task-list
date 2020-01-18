<?php

namespace App;

use Illuminate\Contracts\Console\Kernel;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Symfony\Component\HttpKernel\HttpKernelInterface;

abstract class TestCase extends BaseTestCase
{
    /**
     * Creates the application.
     *
     * @return HttpKernelInterface
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';
        
        $app->make(Kernel::class)->bootstrap();
        
        return $app;
    }
}
