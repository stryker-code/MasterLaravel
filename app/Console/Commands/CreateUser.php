<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:create {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate user';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $this->info(
            User::factory()->create(
                ['name' => $this->argument('name')]
            )
        );
    }
}
