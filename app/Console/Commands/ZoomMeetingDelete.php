<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ZoomMeetingDelete extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'zoom:delete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Deleting the Meeting link which is expired';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        
        return 0;
    }
}
