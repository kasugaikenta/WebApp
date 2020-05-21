@extends('layouts.app')
@section('content')

<div class="question_list_container">
    <div class="question_list">
        <h2></h2>
        <h2>マイページ 質問一覧</h2>
        @foreach ($questions as $question)
            @if($question->flag == 1)
                <!--styleのbackgroundは消しても大丈夫です。-->
                <div class="question_wrapper" style="background-color:#f6993f;">
                    <div class="tuuti">
                        <a class="question_answer_link" href="/question/viewed/{{$question->id}}">
                            <!--消してもいいやつ-->
                            <!--<i class="glyphicon glyphicon-ok">通知</i>-->
                            <!--通知機能をわかりやすくしたかったからつけたやつ-->
                            <h3 class="question_title">{{ $question->title }}</h3><!-- 質問のタイトル -->
                            <div class="question_time">{{ date($question->created_at) }}</div>
                        </a>
                    </div>
                </div>
            @endif
        @endforeach
        @foreach ($questions as $question)
            @if($question->flag == 0)
                <div class="question_wrapper">
                    <a class="question_answer_link" href="/detail/{{$question->id}}">
                        <h3 class="question_title">{{ $question->title }}</h3><!-- 質問のタイトル -->
                        <div class="question_time">{{ date($question->created_at) }}</div>
                    </a>
                </div>
            @endif
        @endforeach
    </div>
    <div class="btnWrapper">
        <a class="questionBtn" href="{{ url('/question') }}">質問する</a> <!-- ログインしてなかったらログイン画面へ -->
    </div>
</div>
@endsection
