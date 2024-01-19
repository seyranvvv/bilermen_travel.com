<?php

use Illuminate\Database\Seeder;

class ServiceAboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $objects = array(
            ['sadfsdfsdf', '','', 'fghdfgdg fdgdfdfgh','','','']
        );
        foreach ($objects as $object) {
            $obj = new App\ServiceAbout();
            $obj->title_tm = $object[0];
            $obj->title_ru = $object[1];
            $obj->title_en = $object[2];
            $obj->name_tm = $object[3];
            $obj->name_ru = $object[4];
            $obj->name_en = $object[5];
            $obj->img = $object[6];
            $obj->save();
        }
    }
}
