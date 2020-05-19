<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Answer;
use Validator;
use Auth;

class QuestionsController extends Controller
{
    public function question(){
        if(!Auth::check()) return redirect('/login');
        return view('question');
        header("Location:question.blade.php");
    }
    
    public function sendQuestion(Request $request){
<<<<<<< HEAD
        //Validatorを使って入力された値のチェック(バリデーション)処理
        $validator = Validator::make($request->all() , ['question_content' => 'required|max:1000', ]);
=======
        //Validatorを使って入力された値のチェック(バリデーション)処理　（今回は255以上と空欄の場合エラーになります）
        $validator = Validator::make($request->all() , ['question_content' => 'required|max:1000', ])
        $validator = Validator::make($request->all() , ['question' => 'required|max:1000', ]);
>>>>>>> d67f5d1d0d4f14c6f447133e025891783344997b

        //バリデーションの結果がエラーの場合
        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator->errors())->withInput();
            // 上記では、入力画面に戻りエラーメッセージと、入力し���内容をフォーム表示させる処理を記述しています
        }
        
        if(mb_strlen($request->question_content,'euc') > 30){
            $title = $request->question_content;
            $title = mb_substr($request->question_content,0,30);
            $continue = "...";
            $title = $title.$continue;
        }
            
        $questions = new Question;
        $questions->title = $title;
        $questions->content = $request->question_content;
        $questions->user_id = Auth::user()->id;
        $question->save();
    }
    
    //マイページ表示処理
    public function my_questions(){
        $questions = Question::where('user_id',Auth::user()->id)->get();
        return view('mypage', ['questions' => $questions]);
    }
}