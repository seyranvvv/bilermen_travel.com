<?php

use App\Translation;
use Illuminate\Database\Seeder;

class NewTranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $objects = array(
            ['project_name', 'ÄTIÝAÇLANDYRYŞ KOMPANIÝASY "HAZAR ÄTIÝAÇLANDYRYŞ" AGPJ-I'],
        );
        foreach ($objects as $object) {
            Translation::updateOrCreate([
                'slug' => $object[0],
                'name_tm' => $object[1],
            ]);
        }
    }
}
