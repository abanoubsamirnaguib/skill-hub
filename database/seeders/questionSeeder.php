<?php

namespace Database\Seeders;

use App\Models\Exam;
use App\Models\Question;
use Illuminate\Database\Seeder;

class questionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    
    public function run()
    {
        Question::truncate();
        $exams= Exam::get();
        foreach($exams as $exam){
            for($i=1; $i<=7; $i++){
                Question::create([
                "exam_id"=>$exam->id ,
                "title"=>"What is ".$exam->skill->name." used for?",
                "option_1"=>"server-side scripting",
                "option_2"=>"client-side scripting",
                "option_3"=>"game development",
                "option_4"=>"machine learning",
                "right_ans"=>mt_rand(1,4)
        ]);
    }
    }
}
}
