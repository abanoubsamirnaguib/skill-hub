<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use  App\Models\Skill;

class skillSeeder extends Seeder
{

    protected $skills=[
        [
            "name" => "Excel",
            "desc" => "Beginner to Pro in Excel: Financial Modeling and Valuation",
            "img"  => 'assets/img/exam1.jpg' ,
            "cat_id" => 1,
        ],
        [
            "name" => "CSS",
            "desc" => "Introduction to CSS",
            "img"  => 'assets/img/exam2.jpg' ,
            "cat_id" => 2,
        ],
        [
            "name" => "Drawing",
            "desc" => "The Ultimate Drawing Course | From Beginner To Advanced",
            "img"  => 'assets/img/exam3.jpg' ,
            "cat_id" => 3,
        ],
        [
            "name" => "Web Development",
            "desc" => "The Complete Web Development Course",
            "img"  => 'assets/img/exam4.jpg' ,
            "cat_id" => 4,
        ],
        [
            "name" => "PHP",
            "desc" => "PHP Tips, Tricks, and Techniques",
            "img"  => 'assets/img/exam5.jpg' ,
            "cat_id" => 4,
        ],
        [
            "name" => "Programming",
            "desc" => "All You Need To Know About Programming",
            "img"  => 'assets/img/exam6.jpg' ,
            "cat_id" => 2,
        ],
        [
            "name" => "Photography",
            "desc" => "How to Get Started in Photography",
            "img"  => 'assets/img/exam7.jpg' ,
            "cat_id" => 5,
        ],
        [
            "name" => "Typography",
            "desc" => "Typography From A to Z",
            "img"  => 'assets/img/exam8.jpg' ,
            "cat_id" => 6,
        ],

    ];
    public function run()
    {
        foreach( $this->skills as $skill){
            $cat= new Skill($skill);
            $cat->save();
        }
    }
}
