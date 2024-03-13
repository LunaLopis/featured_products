<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {     
        if(file_exists(base_path('database/csv/categories.csv')))  {
            $csv = fopen(base_path('database/csv/categories.csv'), 'r');
            $array = [];
            fgetcsv($csv, 1000, ",");        
            while (($data = fgetcsv($csv, 1000, ",")) !== FALSE) 
            {
              $array[] =  ['name'=> $data[0], 'color'=>$data[1]];
            }    
            fclose($csv);
            
            foreach($array as $element){
                $category = new Category();
                $category->fill($element);
                $category->save();
            }           
        }
        else {
            print_r('il file non è stato trovato');
        } 
    }

    
}
