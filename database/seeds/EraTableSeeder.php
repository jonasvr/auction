<?php

use Illuminate\Database\Seeder;
use App\Era;


class EraTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('eras');
        
            $era                	= new Era;
            $era->name          	= "Pre-war";        
            $era->save();

            $era                	= new Era;
            $era->name          	= "1940s-1950s";        
            $era->save();

            $era                	= new Era;
            $era->name          	= "1960s-1980s";        
            $era->save();

            $era                	= new Era;
            $era->name          	= "1980s-Present";        
            $era->save();

    }
}
