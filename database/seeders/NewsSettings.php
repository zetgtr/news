<?php

namespace News\Seeders;

use Illuminate\Database\Seeder;

class NewsSettings extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('news_settings')->insert($this->getData());
    }

    public function getData(): array
    {
        return [
            ['id'=>1,'url'=>'news'],
        ];
    }
}
