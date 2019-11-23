<?php

namespace ChameleonW\LaravelShop\Wap\Member\Console\Commands;

use Illuminate\Console\Command;

class InstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'wap-member:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install the wap-member package';

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
     * @return mixed
     */
    public function handle()
    {
        $this->call('migrate');
        $this->call('vendor:publish', [
            "--provider"=>"ChameleonW\LaravelShop\Wap\Member\Providers\MemberServiceProvider"
        ]);
    }
}
