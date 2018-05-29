<?php

namespace Zoutapps\Laravel\ProjectSetup\Tests\Feature;

use Illuminate\Support\Facades\Artisan;
use Zoutapps\Laravel\ProjectSetup\Tests\TestCase;

class InspiringCommandTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function testInspiringCommand(): void
    {
        Artisan::call('inspiring');

        $this->assertContains('Leonardo da Vinci', Artisan::output());
    }
}
