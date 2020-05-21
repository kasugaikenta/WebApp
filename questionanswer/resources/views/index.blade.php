@extends('layouts.app')
@section('content')
<?php
    date_default_timezone_set('Asia/Tokyo');
?>

<div class="question_list_container">
    <div class="question_list">
        <h2>質問一覧</h2>
        <form action="{{ url('search')}}" method="POST">
        {{csrf_field()}} 
            <label for="listing" class="col-sm-3 control-label">タグ検索</label>
                <select name="categorie_tag">
                    <option value="{{'-'}}">-</option>
                    <option value="{{'すべて'}}">すべて</option>
                    <option value="{{'C言語'}}">C言語</option>
                    <option value="{{'C++'}}">C++</option>
                    <option value="{{'Java'}}">Java</option>
                    <option value="{{'HTML'}}">HTML</option>
                    <option value="{{'CSS'}}">CSS</option>
                    <option value="{{'Java Script'}}">Java Script</option>
                    <option value="{{'PHP'}}">PHP</option>
                    <option value="{{'Ruby'}}">Ruby</option>
                    
                </select>
            <button type="submit">検索</button>
        </form>
        
        <form action="{{ url('searchkeywords')}}" method="POST">
        {{csrf_field()}} 
            <label for="listing" class="col-sm-3 control-label">キーワード検索</label>
            <input type="text" name="search_keywords">
            <button type="submit">検索</button>
        </form>
        <?php
            if(empty($questions)){
                echo("<p>検索結果が得られませんでした...</p>");
                echo("<p>わからなければ聞いてみよう！</p>");
                echo("<p>↓</p>");
            }
        ?>
        @foreach ($questions as $question)
            <div class="question_wrapper">
                <a class="question_answer_link" href="/detail/{{$question->id}}">
                    <div class="question_title">{{ $question->user->name }}</div> <!-- ユーザ名 pタグのがいい？ -->
                    <h3 class="question_title">{{ $question->title }}</h3> <!-- 質問のタイトル -->
                    <div class="question_time">{{ $question->created_at }}</div> <!-- 投稿日時 -->
                </a>
                <div class="chose_categorie">
                        <h4>Tag<span style="padding : 3px"></span>:<span style="padding : 5px"></span>{{$question->tag1}}<span style="padding : 20px"></span>{{$question->tag2}}<span style="padding : 20px"></span>{{$question->tag3}}</h4>
                </div>
            </div>
        @endforeach
    </div>
    <div class="btnWrapper">
        <a class="questionBtn" href="{{ url('/question') }}">質問する</a> <!-- ログインしてなかったらログイン画面へ -->
    </div>
</div>
@endsection

