<?php

use Illuminate\Database\Seeder;

class IconCardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $objects = array(
            ['','Gave insurances','','',  '','','', 'counter', '12', 'k'],
            ['','Professional team','','',  '','','', 'counter', '12', '+'],
            ['','Satisfied customers','','',  '','','', 'counter', '12', 'k'],
            ['','Our success rate','','',  '','','', 'counter', '12', '%'],

            ['','Safe your money','','',  'Lorem ipsum dolor amet consectetur adipiscing elit do eiusmod tempor incid idunt ut labore.','','', 'index_icon', '01', ''],
            ['','Safe your money','','',  'Lorem ipsum dolor amet consectetur adipiscing elit do eiusmod tempor incid idunt ut labore.','','', 'index_icon', '02', ''],
            ['','Safe your money','','',  'Lorem ipsum dolor amet consectetur adipiscing elit do eiusmod tempor incid idunt ut labore.','','', 'index_icon', '03', ''],
        );
        foreach ($objects as $object) {
            $obj = new App\IconCard();
            $obj->icon = $object[0];
            $obj->text = $object[1];
            $obj->text_ru = $object[2];
            $obj->text_en = $object[3];
            $obj->name = $object[4];
            $obj->name_ru = $object[5];
            $obj->name_en = $object[6];
            $obj->type = $object[7];
            $obj->counter = $object[8];
            $obj->after_text = $object[9];
            $obj->save();
        }
    }
}
