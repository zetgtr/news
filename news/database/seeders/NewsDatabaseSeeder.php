<?php

namespace News\Seeders;

use Illuminate\Database\Seeder;

class NewsDatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            NewsSettings::class,
            MenuSeeder::class
        ]);
    }
}
