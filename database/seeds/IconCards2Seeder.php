<?php

use Illuminate\Database\Seeder;

class IconCards2Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $objects = array(
            ['', 'Gave insurances', '', '', '', '', '', 'why-choose-us', '0', ''],
            ['', 'Professional team', '', '', '', '', '', 'why-choose-us', '0', ''],
            ['', 'Satisfied customers', '', '', '', '', '', 'why-choose-us', '0', ''],
            ['', 'Our success rate', '', '', '', '', '', 'why-choose-us', '0', ''],
        );

        foreach ($objects as $object) {
            $obj = new App\IconCard();
            $obj->icon = $object[0];
            $obj->text = $object[1];
            $obj->text_ru = $object[1];
            $obj->text_en = $object[1];
            $obj->name = $object[1];
            $obj->name_ru = $object[1];
            $obj->name_en = $object[1];
            $obj->type = $object[7];
            $obj->counter = $object[8];
            $obj->after_text = $object[9];
            $obj->save();
        }
    }
}
