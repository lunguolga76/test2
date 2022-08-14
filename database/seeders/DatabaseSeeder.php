<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Filesystem\Filesystem;
use App\Models\Cv;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Cv::factory()->count(200)->create();

    }
}
