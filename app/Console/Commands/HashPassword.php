<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class HashPassword extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'hash:password {password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Hash a given password';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $password = $this->argument('password');
        $hashedPassword = Hash::make($password);
        $this->info('Hashed Password: ' . $hashedPassword);
        return 0;
    }
}
