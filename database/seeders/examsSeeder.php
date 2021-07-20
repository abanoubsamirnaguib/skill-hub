<?php

namespace Database\Seeders;

use App\Models\Exam;
use Illuminate\Database\Seeder;

class examsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // for ($e = 1; $e <= 8; $e++) {
        //     for ($i = 1; $i <= 3; $i++) {
        //         Exam::create([
        //             'name'=>"exam$i",
        //             'desc'=>"Pro eu error molestie deserunt. At per viderer bonorum persecuti.",
        //             'img' =>"/assets/exam img/exam$e.jpg",
        //             'skill_id'=> $e,
        //             'questions_no'=>'7',
        //             'difficulty'=>  mt_rand(1, 5),
        //             'duration_mins'=>  mt_rand(1, 3)*30
        //             ]);
        //         }
        //     }

        $exams = Exam::get();  
        $i=1;
                foreach($exams as $exam){
            $exam->img= "/assets/exam img/exam$i.jpg";
            $exam->save(); 
            $i++;
    }
    }
}
