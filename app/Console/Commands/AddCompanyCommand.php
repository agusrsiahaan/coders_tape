<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Company;

class AddCompanyCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'contact:company';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Adds a New Company';

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
        $name = $this->ask('What is the company name ?');
        $phone = $this->ask('What is the company\'s phone number ?');

        if ($this->confirm('Are you ready to insert "' .$name. '"?')) {
                $company = Company::create([
                'name' => $name,
                'phone' => $phone,
            ]);
            
            $this->info('Added: '.$company->name);        
        };

        $this->warn('No new company was added.');

        // $this->warn('This is a warning');
        // $this->error('This is an error');
    }
}
