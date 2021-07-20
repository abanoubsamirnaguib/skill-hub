<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Registered;

use Illuminate\Support\Facades\Mail;
use App\Mail\RespondMAil;



use Illuminate\Http\Request;
use  App\Models\Cat;
use  App\Models\Skill;
use  App\Models\Exam;
use  App\Models\Question;
use  App\Models\User;
use  App\Models\Role;
use  App\Models\Message;

class AdminHomeController extends Controller
{
    public function Dashboard()
    {
       

    return view('Dashboard.index');
    }

    // Categories
    public function Categories()
    {
        $cats=Cat::paginate(3);
     return view('Dashboard.Categories' , ["cats"=>$cats] );
    }

    public function addCategories(Request $request)
    {
        $request->validate([
            'name' => 'required|max:30'
        ]);
        Cat::Create([
            "name" => $request->name 
        ]);

        $request->session()->flash('msg-sucsess', 'Category added successfully');

        return back();
    }

    public function updateCategories(Request $request)
    {
        $request->validate([
            'id' =>'required|exists:Cats,id',
            'NewName' => 'required|max:30'
        ]);
       
       Cat::where('id',$request->id)->Update([
            "name" => $request->NewName 
        ]);
        $request->session()->flash('msg-sucsess', 'Category Updated successfully');

        return back();
    }
    public function ActiveToggle(Cat $cat,Request $request)
    {
       
       $cat->Update([
            "active" => !$cat->active 
        ]);
        $request->session()->flash('msg-sucsess', 'Category Updated successfully');

        return back();
    }

    public function DeleteCategories(Cat $cat,Request $request)
    {
        // $cat = Cat::findOrFail($id);
        try 
           {
               $cat->Delete();
               $msg="Category Deleted successfully";
            // $request->session()->flash('msg-sucsess', 'Category Deleted successfully');
           } 
           catch(Exception $e){
            $msg="Category Delete fails";
            return back();
                // $request->session()->flash('msg-fail', $e);
             }
         $request->session()->flash('msg-sucsess', $msg);
        return back();
    }

    // skills
    public function Skills()
    {
        $cats=Cat::get();
        $Skills=Skill::paginate(3);
     return view('Dashboard.skills' , ["Skills"=>$Skills , "Cats"=>$cats ] );
    }
    public function addSkills(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:30',
            'desc' => 'required|string|max:100',
            'img' => 'required|mimes:jpg,jpeg,bmp,png|max:2048',
            'cats' => 'required|exists:Cats,id'
        ]);
        //   dd($request);
        $fileName = "skill".\rand(1,9).$request->file('img')->getClientOriginalName();
        $request->file('img')->move(public_path('assets/img'), $fileName);
            
        Skill::Create([
            "name" => $request->name ,
            "desc" => $request->desc,
            "img" => "assets/img/$fileName", 
            "cat_id" => $request->cats 
        ]);

        $request->session()->flash('msg-sucsess', 'Category added successfully');

        return back();
    }

    public function updateSkills(Request $request)
    {
        $request->validate([
            'id' =>'required|exists:Skills,id',
            'NewName' => 'required|string|max:30',
            'desc' => 'required|string|max:100',
            'img' => 'mimes:jpg,jpeg,bmp,png|max:2048',
            'cats' => 'required|exists:Cats,id'
        ]);

        $skill = Skill::find($request->id);
        $path = $skill->img;

            if( $request->hasFile('img')){
                \File::delete($path);
            $fileName = "skill".\rand(1,9).$request->file('img')->getClientOriginalName();
            $request->file('img')->move(public_path('assets/img'), $fileName);
            $path = "assets/img/$fileName";
            }

            $skill->Update([
            "name" => $request->NewName ,
            'desc' => $request->desc,
            'img' => $path,
            'cat_id' => $request->cats,
        ]);
        $request->session()->flash('msg-sucsess', 'Category Updated successfully');

        return back();
    }

    public function DeleteSkills(Skill $skill,Request $request)
    {
        // $cat = Cat::findOrFail($id);
        // dd($skill->img);
        try 
           {
               $skill->Delete();
            if(\File::exists($skill->img)) {
                \File::delete($skill->img);
            }               
               $msg="skill Deleted successfully";
            // $request->session()->flash('msg-sucsess', 'Category Deleted successfully');
           } 
           catch(Exception $e){
            $msg="Category Delete fails";
            return back();
                // $request->session()->flash('msg-fail', $e);
             }
         $request->session()->flash('msg-sucsess', $msg);
        return back();
    }

    public function ActiveToggleSkill(Skill $skill,Request $request)
    {
       
       $skill->Update([
            "active" => !$skill->active 
        ]);
        $request->session()->flash('msg-sucsess', 'Category Updated successfully');

        return back();
    }

    //exams
    public function Exam()
    {
        
        $Exams=Exam::select("id","skill_id","name","desc","img","questions_no","active")->orderBy("id","ASC")->paginate(10);
        
        return view('Dashboard.exam.exam' , ["Exams"=>$Exams] );

    }
    public function show(Exam $exam)
    {   
        return view('Dashboard.exam.ShowExam' , ["exam"=>$exam] );
    }
    public function showQuestion(Exam $exam)
    {   
        return view('Dashboard.exam.showQuestion' , ["exam"=>$exam] );
    }
    public function Create()
    {   
        $skills=Skill::get();
        return view('Dashboard.exam.create' , ["skills"=>$skills] );
    }
    public function store(Request $request)
    {   
        // dd($request);
        $request->validate([
            'name' => 'required|string|max:30',
            'desc' => 'required|string|max:5000',
            'img' => 'required|mimes:jpg,jpeg,bmp,png|max:2048',
            'skill' => 'required|exists:skills,id',
            'question_no' => 'required|integer|min:1|max:10',
            'difficulty' => 'required|integer|min:1|max:5',
            'duration_mins' => 'required|integer|min:1|max:90'
        ]);

        $fileName = "exam".\rand(1,9).$request->file('img')->getClientOriginalName();
        $request->file('img')->move(public_path('assets/img'), $fileName);
            
        $exam = Exam::Create([
            "name" => $request->name ,
            "desc" => $request->desc,
            "img" => "assets/img/$fileName", 
            "skill_id" => $request->skill ,
            'questions_no' => $request->question_no ,
            'difficulty' => $request->difficulty,
            'duration_mins' => $request->duration_mins,
            'active' =>"0"

        ]);

        $request->session()->flash('msg-sucsess', 'Category added successfully');
        $request->session()->flash('previous', "exam/$exam->id");

       return redirect (url("SkillsHub/Dashboard/Exams/createQuestion/$exam->id") );
    }

    public function CreateQuestion(Exam $exam)
    {   
        if ( (session('previous') != "exam/$exam->id" ) and (session('current') != "exam/$exam->id") ){
            return redirect (url("SkillsHub/Dashboard/Exams/") );
        }

        return view('Dashboard.exam.CreateQuestion' , ["exam"=>$exam] );
    }
    public function storeQuestion(Exam $exam,Request $request)
    {

        // dd($request);
        $request->validate([
            'title' => 'required|array',
            'title.*' => 'required|string|max:100',

            'option_1' => 'required|array',
            'option_1.*' => 'required|string|max:100',
            'option_2' => 'required|array',
            'option_2.*' => 'required|string|max:100',
            'option_3' => 'required|array',
            'option_3.*' => 'required|string|max:100',
            'option_4' => 'required|array',
            'option_4.*' => 'required|string|max:100',

            'right_ans' => 'required|array',
            'right_ans.*' => 'required|integer|in:1,2,3,4',
        ]);
            
        for ($i=0; $i <= $exam->questions_no-1; $i++){
        Question::Create([
            "exam_id" => $exam->id ,
            "title"   =>  $request->title[$i] ,
            'option_1' => $request->option_1[$i] ,
            'option_2' => $request->option_2[$i] ,
            'option_3' => $request->option_3[$i] ,
            'option_4' => $request->option_4[$i] ,
            'right_ans' => $request->right_ans[$i] ,
        ]);
        }

        // event(new NewExam("New Exam Added!"));

        $request->session()->flash('msg-sucsess', 'Question added successfully');
        $request->session()->flash('current', "exam/$exam->id");

       return redirect (url("SkillsHub/Dashboard/Exams/") );
    }
    public function EditExam(Exam $exam)
    {   
        $skills=Skill::get();
        return view('Dashboard.exam.EditExam' , ["exam"=>$exam , "skills"=>$skills] );
    }
    
    public function updateExam(Exam $exam,Request $request)
    {
        $request->validate([
            'id' =>'required|exists:exams,id',
            'name' => 'required|string|max:30',
            'desc' => 'required|string|max:5000',
            'img' => 'nullable|mimes:jpg,jpeg,bmp,png|max:2048',
            'skill' => 'required|exists:skills,id',
            'difficulty' => 'required|integer|min:1|max:5',
            'duration_mins' => 'required|integer|min:1|max:90'
        ]);

        $path = $exam->img;

            if( $request->hasFile('img')){
                \File::delete($path);
            $fileName = "exam".$exam->id.$request->file('img')->getClientOriginalName();
            $request->file('img')->move(public_path('assets/img'), $fileName);
            $path = "assets/img/$fileName";
            }

            $exam->Update([
                "name" => $request->name ,
                "desc" => $request->desc,
                "img" => $path, 
                "skill_id" => $request->skill ,
                'difficulty' => $request->difficulty,
                'duration_mins' => $request->duration_mins
        ]);
        $request->session()->flash('msg-sucsess', 'exam Updated successfully');

        return redirect (url("SkillsHub/Dashboard/Exams/show/$exam->id") );
    }
    public function EditQuestion(Exam $exam ,Question $ques)
    {   
        return view('Dashboard.exam.EditQuestion' , ["exam"=>$exam , "question"=>$ques] );
    }
    public function updateQuestion(Exam $exam,Question $ques,Request $request)
    {
       $data=$request->validate([
            'title'    => 'required|string|max:100',
            'option_1' => 'required|string|max:100',
            'option_2' => 'required|string|max:100',
            'option_3' => 'required|string|max:100',
            'option_4' => 'required|string|max:100',

            'right_ans' => 'required|integer|in:1,2,3,4'
        ]);

        $ques->Update($data);
        $request->session()->flash('msg-sucsess', 'exam Updated successfully');

        return redirect (url("SkillsHub/Dashboard/Exams/show/$exam->id/Question") );
    }
    public function ActiveToggleExam(Exam $exam,Request $request)
    {
        // dd($exam->questions_no);
       if($exam->questions_no == $exam->questions()->count() ) {

       $exam->Update([
            "active" => !$exam->active 
        ]);
        $request->session()->flash('msg-sucsess', 'Exam Updated successfully');
       }
        return back();
    }
    public function DeleteExam(Exam $exam,Request $request)
    {
        // dd($skill->img);
        try 
           {

               $exam->questions()->Delete();
               $exam->Delete();
            if(\File::exists($exam->img)) {
                \File::delete($exam->img);
            }               
               $msg="exam Deleted successfully";
            // $request->session()->flash('msg-sucsess', 'Category Deleted successfully');
           } 
           catch(Exception $e){
            $msg="exam Delete fails";
            return back();
                // $request->session()->flash('msg-fail', $e);
             }
         $request->session()->flash('msg-sucsess', $msg);
        return back();
    }

    //Students
    public function Students()
    {
        $students=User::select("id","name","email","email_verified_at")->where("role_id",1)
        ->orderBy("id","ASC")->paginate(10);
        // $students=User::find(2);
        // $e= $students->exams()->where("exam_id",20)->first();
        // dd($e->pivot->score);
    
            
        return view('Dashboard.students.student' , ["students"=>$students] );
    }

    public function showScore(User $student)
    {        
        $exams= $student->exams;
        return view('Dashboard.students.showscore' , ["student"=>$student, "exams"=>$exams] );
    }

    public function ActiveToggleStudentExam(User $student,$exam_id,Request $request)
    {
        // dd($status); 
        $status = $student->exams()->find($exam_id)->pivot->status;
        if($status == "closed"){
            $student->exams()->where("exam_id",$exam_id)->Update([
                "status" => "opened" 
            ]);
        } 
        else {
            $student->exams()->where("exam_id",$exam_id)->Update([
                    "status" => "closed" 
                ]);
            }
        $request->session()->flash('msg-sucsess', 'status Updated successfully');

        return back();
    }

    // Admins
    public function Admins()
    {
        $Admins=User::whereIn("role_id",[3,2])
        ->orderBy("id","ASC")->paginate(10);
            
        return view('Dashboard.admin.Admin' , ["Admins"=>$Admins] );
    }
    public function CreateAdmin()
    {   
        $AdminRoles=Role::select("name" ,'id')->whereIn("name",["admin","superadmin"])->get();              

        return view('Dashboard.admin.create' , ["AdminRoles"=>$AdminRoles] );                      
    }
    public function StoreAdmin(Request $request)
    {   
        // dd($request);
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:5000',
            'password' => 'required|string|max:200|confirmed',
            'role_id' => 'required|exists:roles,id'

        ]);
            
        $user = User::Create([
            "name" => $request->name ,
            'email' => $request->email,
            'password' => \Hash::make($request->password),
            'role_id' => $request->role_id
        ]);

        event(new Registered($user));

        $request->session()->flash('msg-sucsess', 'Admin added successfully');

       return redirect (url("SkillsHub/Dashboard/Admins") );
    }

    public function AdminsToggle($user_id,Request $request)
    {

        $Admin=User::find($user_id);
         if ($Admin->role->name == "admin"){
            $Admin->Update([
                "role_id" => Role::select("id")->where("name","superadmin")->first()->id
            ]);
         }
         elseif ($Admin->role->name == "superadmin")
         {
            $Admin->Update([
                "role_id" => Role::select("id")->where("name","admin")->first()->id
            ]);
         }

        $request->session()->flash('msg-sucsess', 'status Updated successfully');

        return back();
    }
    public function DeleteAdmin(User $admin)
    {
       $admin->delete();
       return back();
    }

    // Contacts

    public function Contacts()
    {
        $Messages=Message::select()
        ->orderBy("name","ASC")->paginate(10);
            
        return view('Dashboard.Contacts.Contact' , ["Messages"=>$Messages] );
    }

    public function ReplayMessages(Message $msg)
    {    
        return view('Dashboard.Contacts.Message' , ["Message"=>$msg] );
    }
    public function SendMail(Message $msg,Request $request)
    {   
        $request->validate([
            "subject"=>"required|string|max:500",
            "body" => "required|string|max:1000"
        ]);


        Mail::to($msg->email)->send(new RespondMAil(
            $request->subject,
            $request->body,
            $msg->name , 
            $request->user()->name
        ));
        
        return redirect(url("/SkillsHub/Dashboard/Contacts") );
        // return view('Dashboard.Contacts.Message' , ["Message"=>$msg] );
    }
    
}
