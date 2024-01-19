<?php

use Illuminate\Database\Seeder;

class ContactWithSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $objects = array(
            ['sadfsdfsdf', '','', 'fghdfgdg fdgdfdfgh','','']
        );
        foreach ($objects as $object) {
            $obj = new App\ContactWith();
            $obj->title_tm = $object[0];
            $obj->title_ru = $object[1];
            $obj->title_en = $object[2];
            $obj->body_tm = $object[3];
            $obj->body_ru = $object[4];
            $obj->body_en = $object[5];
            $obj->save();
        }
    }
}
