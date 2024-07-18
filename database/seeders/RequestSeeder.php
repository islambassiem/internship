<?php

namespace Database\Seeders;

use App\Models\Request;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Request::factory(30)->create();
    }
}
