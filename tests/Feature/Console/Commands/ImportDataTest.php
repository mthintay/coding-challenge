<?php

namespace Tests\Feature\Console\Commands;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ImportDataTest extends TestCase
{
    /**
     * Test a console command
     *
     * @return void
     */
    public function testImportDataIsSuccessful()
    {
        $this->artisan('import:data')->assertExitCode(0);
    }
}
