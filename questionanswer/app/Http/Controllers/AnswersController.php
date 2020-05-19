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
        return view('answer',['question_id'=>$question_id]);
        header("Location:answer.blade.php");
    }
    
    public function sendAnswer(Request $request){
        $validator = Validator::make($request->all() , ['question' => 'required|max:1000', ]);

        //バリデーションの結果がエラーの場合
        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator->errors())->withInput();
            // 上記では、入力画面に戻りエラーメッセージと、入力し���内容をフォーム表示させる処理を記述しています
        }
        
        $answers = new Answer;
        $answers->content = $request->question_content;
        $answers->question_id = $request->question_id;
        $answers->save();
        
    }
    
}
