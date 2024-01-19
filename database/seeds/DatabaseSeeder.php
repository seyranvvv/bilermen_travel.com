<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ContactSeeder::class);
        $this->call(ContactWithSeeder::class);
        $this->call(TranslationSeeder::class);
        $this->call(AboutSeeder::class);
        $this->call(IconCardSeeder::class);
        $this->call(ServiceAboutSeeder::class);
        $this->call(WhyChooseUsSeeder::class);
        $this->call(IconCards2Seeder::class);
        $ratio = 100;
        if (true) {
            for ($i = 1; $i <= $ratio * 10; $i++) {
                $this->call(IpAddressSeeder::class);
            }
            echo ' 12 ok / ';

            for ($i = 1; $i <= $ratio * 5; $i++) {
                $this->call(UserAgentSeeder::class);
            }
            echo ' 13 ok / ';


            for ($i = 1; $i <= $ratio * 5; $i++) {
                factory(App\Models\Visitor::class, 10)->create();
            }
            echo ' 15 ok / ';

            factory(App\Models\LoginAttempt::class, $ratio / 10)->create();
            echo ' 16 ok / ';


        }
    }
}
