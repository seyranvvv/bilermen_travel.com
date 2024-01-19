<?php

use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
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
            $obj = new App\About();
            $obj->title_tm = $object[0];
            $obj->title_ru = $object[1];
            $obj->title_en = $object[2];
            $obj->name_tm = $object[3];
            $obj->name_ru = $object[4];
            $obj->name_en = $object[5];
            $obj->img= $object[6];
            $obj->image_index = $object[7];
            $obj->image_banner = $object[8];
            $obj->icon = $object[9];
            $obj->save();
        }
    }
}
