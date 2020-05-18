@extends('layouts.app')
@section('content')
<div class="panel-body">
<!-- バリデーションエラーの場合に表示 --> 
@include('common.errors')
  <!-- 質問作成フォーム -->
  <form action="{{ url('question')}}" method="POST" class="form-horizontal">
  {{csrf_field()}} 
    <div class="form-group"> 
      
      <div　class="col-sm-6">
        <label for="listing" class="col-sm-3 control-label">質問者名</label> 
        <div class="col-sm-6"> 
            <input type="text" name="questioner" class="form-control" value="{{ old('questioner', Auth::user()->name) }}" readonly>
        </div>
        <label for="listing" class="col-sm-3 control-label">質問内容</label> 
        <div class="col-sm-6"> 
          <textarea name="question" class="form-control"></textarea>
        </div>
        <?php
          date_default_timezone_set('Asia/Tokyo');
          $time = date("Y/m/d H:i:s");
        ?>
        <label for="listing" class="col-sm-3 control-label">質問日時</label> 
        <div class="col-sm-6"> 
            <input type="text" name="time" class="form-control" value="{{ old('time', $time) }}" readonly>
        </div>
        <div class="col-sm-6"> 
          <input type= name="question" class="form-control"></textarea>
        </div>
      </div>
    </div>
    <div id="make"> 
      <div> 
        <button type="submit" class="btn btn-default">
        作成 </button> 
      </div>
    </div>
  </form>
</div> 
@endsection