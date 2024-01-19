<?php

use Illuminate\Database\Seeder;

class WhyChooseUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $objects = array(
            ['Ayydyn gijeler','','','sadfsafsf sdf sdf sdf sdfs dsdf', '', '','','','','']
        );
        foreach ($objects as $object) {
            $obj = new App\WhyChooseUs();
            $obj->title_tm = $object[0];
            $obj->title_ru = $object[1];
            $obj->title_en = $object[2];
            $obj->name_tm = $object[3];
            $obj->name_ru = $object[4];
            $obj->name_en = $object[5];
            $obj->body_tm = $object[3];
            $obj->body_ru = $object[4];
            $obj->body_en = $object[5];

            $obj->save();
        }
    }
}
