<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        
        DB::table('users')->truncate();

        $this->call([
            UsersSeeder::class,
        ]);
    }
}
