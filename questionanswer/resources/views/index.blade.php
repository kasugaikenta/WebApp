@extends('layouts.app')
@section('content')

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
            
        @foreach ($questions as $question)
            <div class="question_wrapper">
                <a class="question_answer_link" href="/detail/{{$question->id}}">
                    <div class="question_title">{{ $question->user->name }}</div> <!-- ユーザ名 pタグのがいい？ -->
                    <h3 class="question_title">{{ $question->title }}</h3> <!-- 質問のタイトル -->
                    <div class="chose_categorie">
                        <input type="text" value="{{old('tag1',$question->tag1)}}" style="background-color : white" readonly>
                        <input type="text" value="{{old('tag2',$question->tag2)}}" style="background-color : white" readonly>
                        <input type="text" value="{{old('tag3',$question->tag3)}}" style="background-color : white" readonly>
                    </div>
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

