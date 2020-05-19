@extends('layouts.app')
@section('content')

<div class="question_list_container">
    <div class="question_list">
        <h2>質問一覧</h2>
        @foreach ($questions as $question)
            <div class="question_wrapper">
                <a class="question_answer_link" href="/detail/{{$question->id}}">
                    <div class="question_title">{{ $question->user->name }}</div> <!-- ユーザ名 pタグのがいい？ -->
                    <h3 class="question_title">{{ $question->title }}</h3> <!-- 質問のタイトル -->
                    <div class="question_time">{{ $question->created_at }}</div> <!-- 投稿日時 -->
                </a>
            </div>
        @endforeach
    </div>
    <div class="btnWrapper">
        <a class="questionBtn" href="{{ url('/question') }}">質問する</a> <!-- ログインしてなかったらログイン画面へ -->
    </div>
</div>
@endsection

