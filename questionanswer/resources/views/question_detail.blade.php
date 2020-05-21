@extends('layouts.app')
@section('content')
<?php
    date_default_timezone_set('Asia/Tokyo');
?>

<div class="question_detail_container">
    <!-- 質問 -->
    <div class="question_wrapper">
        <h2>質問</h2>
        <h3 class="question_title">{{ $question->title }}</h3> <!-- タイトル -->
        <div class="question_name">{{ $question->user->name }}</div> <!-- 「ユーザ名：」って文字入れる？ -->
        <div class="question_content">{{ $question->content }}</div> <!-- 内容 -->
        <div class="chose_categorie">
            <input type="text" value="{{old('tag1',$question->tag1)}}" style="background-color : white" readonly>
            <input type="text" value="{{old('tag2',$question->tag2)}}" style="background-color : white" readonly>
            <input type="text" value="{{old('tag3',$question->tag3)}}" style="background-color : white" readonly>
        </div>
        <div class="question_time">{{ $question->created_at }}</div> <!-- 「投稿日時：」って文字入れる？表示形式わからん -->
    </div>
    <!-- 回答 -->
    <div class="answer_list">
        <h2>回答</h2>
        @foreach ($question->answers as $answer)
            <div class="answer_wrapper">
                <!-- 回答は匿名 -->
                <div class="answer_content">{{ $answer->content }}</div>
                <div class="answer_time">{{ $answer->created_at }}</div> <!-- 「回答日時：」って文字入れる？ -->
            </div>
        @endforeach
    </div>
    <div class="btnWrapper">
        <a class="btn" href="{{ url('/answer', $question->id) }}">回答する</a>
    </div>
</div>
@endsection

