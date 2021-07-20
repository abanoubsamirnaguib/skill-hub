<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class settingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::truncate();
        Setting::create([
            "email"=>"Educate@email.com",            
            "phone"=>"122-547-223-45" ,         
            "facebook"=>"www.facebook.com" ,         
            "twitter"=>"www.twitter.com" ,     
            "instagram"=>"www.instagram.com" ,     
            "youtube"=>"www.youtube.com" ,   
            "linkedin"=>"www.linkedin.com"  
        ]);
    }
}
