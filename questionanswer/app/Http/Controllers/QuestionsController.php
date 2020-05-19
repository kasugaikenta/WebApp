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
        return view('question');
        header("Location:question.blade.php");
    }
    
    public function sendQuestion(Request $request){
        //Validatorを使って入力された値のチェック(バリデーション)処理　（今回は255以上と空欄の場合エラーになります）
        $validator = Validator::make($request->all() , ['question' => 'required|max:1000', ]);

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
    
    //質問一覧画面表示処理
    public function index()
    {
        $questions = Question::orderBy('created_at', 'desc')
            ->get();
        return view('index', ['questions' => $questions]);
    }
    
    //質問表示画面表示処理
    public function detail($question_id)
    {
        $question = Question::find($question_id);
        return view('question_detail', ['question' => $question]);
    }
}