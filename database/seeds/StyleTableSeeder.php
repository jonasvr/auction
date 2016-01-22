<?php

use Illuminate\Database\Seeder;
use App\Style;

class StyleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('styles');

            $style                	= new Style;
            $style->name          	= "Abstract";
            $style->save();

            $style                	= new Style;
            $style->name          	= "African";
            $style->save();

            $style                	= new Style;
            $style->name          	= "Asian";
            $style->save();

            $style                	= new Style;
            $style->name          	= "Cemceptual";
            $style->save();

            $style                	= new Style;
            $style->name          	= "Emerging";
            $style->save();

            $style                	= new Style;
            $style->name          	= "Figurative";
            $style->save();

            $style                	= new Style;
            $style->name          	= "Middle";
            $style->save();

            $style                	= new Style;
            $style->name          	= "Mini";        
            $style->save();

            $style                	= new Style;
            $style->name          	= "Modern";
            $style->save();

            $style                	= new Style;
            $style->name          	= "Pop";
            $style->save();

            $style                	= new Style;
            $style->name          	= "Urban";
            $style->save();

            $style                	= new Style;
            $style->name          	= "Vintage";
            $style->save();

            $style                	= new Style;
            $style->name          	= "Design";
            $style->save();

            $style                	= new Style;
            $style->name          	= "Paintings";
            $style->save();

            $style                	= new Style;
            $style->name          	= "Photographs";
            $style->save();

            $style                	= new Style;
            $style->name          	= "Prints";
            $style->save();

            $style                	= new Style;
            $style->name          	= "Sculpture";
            $style->save();
    }
}
