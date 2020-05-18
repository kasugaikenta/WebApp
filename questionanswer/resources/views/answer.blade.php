@extends('layouts.app')
@section('content')


<div class="panel-body">
  <!-- バリデーションエラーの場合に表示 --> 
  @include('common.errors')
  <form action="{{ url('/card/edit')}}" method="POST" class="form-horizontal">
    {{csrf_field()}} 
    <div class="form-group"> 
        <label for="listing" class="col-sm-3 control-label">質問者名</label> 
        <div class="col-sm-6"> 
            <input type="text" name="questioner" class="form-control" value="{{ old('questioner', Auth::user()->name) }}" readonly>
        </div>
      <div id="memo">
        <label for="listing" class="col-sm-3 control-label">Q.</label> 
        <div class="col-sm-6"> 
          <textarea name="question" class="form-control" value="{{ old('content') }}" style="resize : none">{{$question->content}}</textarea> 
        </div>
      </div>
      <div class="col-sm-6" id="list">
        <label for="listing" class="col-sm-3 control-label">カテゴリ</label>
        <select name="list_title" class="form-control">
          @foreach($listings as $listing)
            <option value="{{$listing->id}}"
              @if(old('list_title',$cards[0]->listing->id) == $listing->id)selected
              @endif>
            {{$listing->title}}</option>
          @endforeach
        </select>
      </div>
    </div>
    <div class="form-group"> 
        <div id="update"> 
          <button type="submit" class="btn btn-default">
            回答する</i> 
          </button> 
        </div>
      </div>
  </form>
</div>
@endsection
