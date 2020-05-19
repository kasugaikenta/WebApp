<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Answer;
use Validator;
use Auth;

class AnswersController extends Controller
{
    public function answer($question_id){
        $question=Question::where('id',$question_id)
            ->first();

        return view('answer',['question'=>$question,'question_id'=>$question_id]);
        header("Location:answer.blade.php");
    }
    
    public function sendAnswer(Request $request){
        
        $answers = new Answer;
        $answers->content = $request->answer_content;
        $answers->question_id = $request->question_id;
        $answers->save();
        return redirect('/');
    }
    
}
