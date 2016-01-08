<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        $this->call(UsersTableSeeder::class);
        $this->call(EraTableSeeder::class);
        $this->call(StyleTableSeeder::class);
        $this->call(CountryTableSeeder::class);


        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        
        Model::reguard();
    }
}
