<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $currentType = 'student';
        for ($i = 0; $i < 10; $i++) {
            $this->createBaseUser($currentType, $i);
        }

        $currentType = 'teacher';
        for ($i = 10; $i < 20; $i++) {
            $this->createBaseUser($currentType, $i);
        }
    }

    private function createBaseUser($type, $index)
    {
        $typeable = '\\App\\' . ucfirst($type);
        $typeable_id = $this->createRelatedSeed($type);

        DB::table('users')->insert([
            'name' => 'John',
            'surname' => 'Doe',
            'email' => "john_$index@example.com",
            'password' => Hash::make('password'),
            'type' => $type,
            'typeable_id' => $typeable_id,
            'typeable_type' => $typeable,
        ]);
    }

    private function createRelatedSeed($type)
    {
        $table = $type . 's';
        return DB::table($table)->insertGetId([]);
    }
}
