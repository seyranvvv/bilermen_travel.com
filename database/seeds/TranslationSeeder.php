<?php

use Illuminate\Database\Seeder;

class TranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $objects = array(
              ['contact_us_text', 'Contact us text!'],
              ['about_contact_text', 'Find a local insurance agent'],
              ['partners_text', 'Trusted and funded by more then 800 companies'],

            ['index_service_one', 'We’re covering all the insurance fields'],
            ['index_service_two', 'Nullam eu nibh vitae est tempor molestie id sed ex. Quisque dignissim maximus ipsum, sed rutrum metus tincidunt et. Sed eget tincidunt ipsum.'],
            ['index_post', 'Latest news & articles from the blog'],
            ['years_number', '30'],
            ['years_text', 'years of experience'],
            ['certificate_text', 'sertifikat']



        );
        foreach ($objects as $object) {
            $obj = new App\Translation();
            $obj->slug = $object[0];
            $obj->name_tm = $object[1];
            $obj->save();
        }
    }
}
