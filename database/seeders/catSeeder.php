<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use  App\Models\Cat;
class catSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

     protected $cats=[
         ["name" => "Design"],
         ["name" => "Programming"],
         ["name" => "Drawing"],
         ["name" => "Web Development"],
         ["name" => "Photography"],
         ["name" => "Typography"]
     ];
    public function run()
    {
        foreach( $this->cats as $cat){
            $cat= new Cat($cat);
            $cat->save();
        } 
  
    }
}
