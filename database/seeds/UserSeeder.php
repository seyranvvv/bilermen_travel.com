<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $objects = array(
            ['admin' , 'admin45'],
        );
        foreach ($objects as $object) {
            $obj = new App\User();
            $obj->username = $object[0];
            $obj->password = bcrypt($object[1]);
            $obj->active = true;
            $obj->save();

        }
    }
}
