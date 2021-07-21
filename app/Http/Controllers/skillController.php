<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use  App\Models\Skill;
use  App\Models\Cat;
use App\Models\Exam;
use  App\Models\Message;
use App\Models\Question;

use App\Events\SentNotification;

use Carbon\Carbon;

// use  App\View\Components\navComponent;

class skillController extends Controller
{
     function home()
    {  
         $cats=Cat::get("name");
        $skills=Skill::get();

        // event(new SentNotification);

        return view('pages.home',["skills"=>$skills ,'cats' => $cats ]);
    }
    function master()
    {
        //  $cats=Cat::get();
        return view('master.master');
    }
    function FillContact(REQUEST $request)
    {
        $validatedData = $request->validate([
            'email' => ['required', 'max:255',"email:rfc,dns"],
            'name' => ['required','min:6','string'],
            'message' => ['required','min:10','max:255','string']
        ]);
        $Messages=new Message;
        $Messages->email=$request->email;
        $Messages->name=$request->name;
        $Messages->body=$request->message;
        $Messages->subject=$request->subject;
        $Messages->save();

        return redirect('/SkillsHub/home');
    }
    function category($id)
    {
        $cats=Cat::findOrFail($id);
        $skills=$cats->skills()->paginate(1);
        return view('pages.category', ['cats'=>$cats, "skills"=>$skills]);
    }
    function skill($id)
    {
        $skills=Skill::findOrFail($id);
        $exams=$skills->exams()->paginate(3);
        return view('pages.skills' , ['skills'=>$skills,'exams'=>$exams]);
    }
    function exam($exam_id)
    {
        $exam=Exam::findOrFail($exam_id);
        $user= Auth::user();
        $canViewStartBtn = true;
        if($user !== null ){
            $pivotRow = $user->exams()->where("exam_id","$exam_id")->first();

            if($pivotRow !==null and $pivotRow->pivot['status'] == 'closed'){
                $canViewStartBtn = false;
            }
        }

        // dd ($canViewStartBtn);

        return view('pages.exam' , ['exam'=>$exam ,"canViewStartBtn"=>"$canViewStartBtn"] );
    }

    function exam_start($exam_id ,Request $request ){
            $user=Auth::user();
            if( !$user->exams->contains($exam_id) ){
            $user->exams()->attach($exam_id); 
        }
        else{
            $user->exams()->updateExistingPivot($exam_id,[
                    "status"=>"closed" ,
                    "created_at" => Carbon::now()
            ]
            );
        }

            $request->session()->flash('prev', "start/$exam_id");
        
        return redirect("/SkillsHub/exam/questions/{$exam_id}");
    }
     
    function exam_questions($exam_id ,Request $request)
    {
        // return session('prev');
        if(session('prev') !== "start/$exam_id"){
            return redirect("/SkillsHub/exam/show/{$exam_id}");
        }
        $exam=Exam::findOrFail($exam_id);
        $questions=$exam->questions();
        // return $questions;
        // Question::findOrFail($id);
        $request->session()->flash('prev', "questions/$exam_id");


        return view('pages.question' , ['exam'=>$exam,'questions'=>$questions ]);
    }

    function exam_submit(Request $request, $exam_id) 
    {
        if(session('prev') !== "questions/$exam_id"){
            return redirect("/SkillsHub/exam/show/{$exam_id}");
        }

        $request->validate([
            "answers"=>"required|array",
            "answers.*" =>"required|in:1,2,3,4"
        ]);

       $exam=Exam::findOrFail($exam_id);

       $point=0;
       $TotalAnswer=$exam->questions->count();
       
       foreach ( $exam->questions as $question){
       if(isset($request->answers[$question->id] ) ){
            $userAns= $request->answers[$question->id];
            $rightAns = $question->right_ans;

            if($userAns == $rightAns){ $point++;}
       }
    }
        $score= ($point/$TotalAnswer) *100;
    //    return($score);

    //    calculating time
    $user=Auth::user();
    $pivotRow=$user->exams()->where("exam_id",$exam_id)->first();
    $StartTime= $pivotRow->pivot->created_at;
    $CurrentTime=Carbon::now();

    $TimeMins=$CurrentTime->diffInMinutes($StartTime) ;

    if ($TimeMins > $pivotRow->duration_mins  ){
        $score=0;
    }

    $user->exams()->updateExistingPivot($exam_id,[
        "score"=>"$score",
        "time_mins"=>"$TimeMins"
    ]
    );
    $request->session()->flash("success","you finished the exam successfully with $score %");

   return redirect( url("/SkillsHub/exam/show/$exam_id") );
    }
}
