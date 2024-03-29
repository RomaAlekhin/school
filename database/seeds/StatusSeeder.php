<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statuses')->insert([
            ['name' => 'Присутствовал'],
            ['name' => 'Оплачиваемый пропуск'],
            ['name' => 'Неоплачиваемый пропуск'],
        ]);
        DB::table('catalogs')->insert(['name' => 'statuses', 'description' => 'Статус посещения']);
    }
}
