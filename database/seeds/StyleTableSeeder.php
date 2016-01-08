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
            $style->name          	= "African-american";        
            $style->save();

            $style                	= new Style;
            $style->name          	= "Asian Contemporary";        
            $style->save();

            $style                	= new Style;
            $style->name          	= "Cemceptual";        
            $style->save();

            $style                	= new Style;
            $style->name          	= "Emerging Artist";        
            $style->save();

            $style                	= new Style;
            $style->name          	= "Figurative";        
            $style->save();

            $style                	= new Style;
            $style->name          	= "Middle Eastern Contemporary";        
            $style->save();

            $style                	= new Style;
            $style->name          	= "Minimaism";        
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
            $style->name          	= "Vintage Photographs";        
            $style->save();

            $style                	= new Style;
            $style->name          	= "Design";        
            $style->save();

            $style                	= new Style;
            $style->name          	= "Paintings and works on paper";        
            $style->save();

            $style                	= new Style;
            $style->name          	= "Photographs";        
            $style->save();

            $style                	= new Style;
            $style->name          	= "Prints and Multiples";        
            $style->save();

            $style                	= new Style;
            $style->name          	= "Sculpture";        
            $style->save();
    }
}
