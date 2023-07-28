<?php

namespace News\Seeders;

use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('menus')->insert($this->getData());
    }

    public function getData()
    {
        return [
            ['id'=>1000,'name'=>'Новости','position'=>'left','logo'=>'fa fa-align-justify','controller'=>'Admin\NewsController','url'=>'news','parent'=>5],
        ];
    }
}
