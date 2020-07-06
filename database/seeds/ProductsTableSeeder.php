<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 11; $i++)
            DB::table('products')->insert([
                'title' => 'Product ' . $i,
                'price' => rand(200, 1500),
                'in_stock' => 1,
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi vero ipsam natus adipisci corporis incidunt. Provident mollitia qui tempore illo eius harum! Temporibus numquam tempora ratione libero consequuntur magnam ad est molestiae accusamus quae exercitationem, illo laudantium blanditiis nesciunt ex praesentium laborum eveniet odit perferendis velit provident debitis esse! Quibusdam est amet rerum eveniet quas. Molestias vero, numquam reprehenderit dolorem quas perspiciatis, id non doloribus quos facere ipsum placeat consequuntur quibusdam? Quis, ullam? Fugit, soluta? Possimus doloremque dignissimos quia! Unde itaque iste ipsa deserunt placeat quisquam veniam ab, repellat at officiis facere molestias sunt nulla ullam obcaecati amet recusandae voluptatum!',
            ]);
    }
}
