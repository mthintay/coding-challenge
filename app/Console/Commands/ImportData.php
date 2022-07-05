<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Libraries\DataImporter;
use Doctrine\ORM\EntityManagerInterface;

class ImportData extends Command
{
    private $em;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:data {count=1}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch and store users from an API';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;

        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @param \App\Libraries\DataImporter $data
     * @return mixed
     */
    public function handle(DataImporter $data)
    {
        $data->importUsers($this->argument('count'), $this->em);
    }
}
