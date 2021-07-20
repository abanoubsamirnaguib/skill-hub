<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Resources\catResource;
use App\Http\Resources\SkillsResource;
use App\Http\Resources\examsResource;
use  App\Models\Cat;
use  App\Models\Skill;
use  App\Models\Exam;
use  App\Models\User;

use Carbon\Carbon;

class ApiController extends Controller
{
    public function Categories()
    {
        return catResource::collection(Cat::all());
    }
    public function showCat($id)
    {   

        return new catResource(Cat::with("skills")->findOrFail($id));
    }
    public function showSkill($id)
    {   

        return new SkillsResource(Skill::with("exams")->findOrFail($id));
    }
    public function showExam($id)
    {   

        return new examsResource(Exam::findOrFail($id));
    }
    public function showExamQuestion($id)
    {   

        return new examsResource(Exam::with("questions")->findOrFail($id));
    }

   
    
    public function register(Request $request)
    {
        $validator = \Validator::make($request->all(),[
            "name" => "required|string|max:255",
            'email' => 'required|unique:users|max:255|email:rfc',
            'password' => 'required|max:20|min:3|confirmed',
        ]);

        if($validator->fails()){
            return ( response()->json($validator->errors()) );
        }
        
        
        $user=User::Create([
            "name"=>$request->name,
            "email"=>$request->email,
            "password"=> \Hash::make($request->password),
            "role_id"=> 1
            
            ]);
        $token = $user->createToken("auth-token");

        return ['token' => $token->plainTextToken];
    }

    public function exam_start($exam_id ,Request $request ){

        $user=$request->user();

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

    
    return["sucsess" ,"sucsess"];
}


    public function exam_submit(Request $request, $exam_id) 
    {
        
        $validator = \Validator::make($request->all(),[
            "answers"=>"required|array",
            "answers.*" =>"required|in:1,2,3,4"
        ]);

        if( $validator->fails()){
         return response()->json($validator->errors());
        }


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
            
            $user=$request->user();
            $pivotRow=$user->exams()->where("exam_id",$exam_id)->first();
            $StartTime= $pivotRow->pivot->created_at;
            $CurrentTime= Carbon::now();

            $TimeMins=$CurrentTime->diffInMinutes($StartTime) ;

            // if ($TimeMins > $pivotRow->duration_mins  ){
            //     $score=0;
            // }

            $user->exams()->updateExistingPivot($exam_id,[
                "score"=>"$score",
                "time_mins"=>"$TimeMins"
            ]
            );
    // $request->session()->flash("success","you finished the exam successfully with $score %");

        return ( ["success"=>"you finished the exam successfully with $score %"] );
    }

    public function token(Request $request)
    {

        // dd($request->user()->tokens()->find(1)->token);
        $user=[
            "user name" =>$request->user()->name,
            "token" => $request->user()->tokens()->find(1)->token
            
        ];
            return response()->json($user);
    }
}
