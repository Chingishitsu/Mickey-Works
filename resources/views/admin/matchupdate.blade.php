@extends('layouts.admin_layout')
@section('title','マッチング編集')
@section('content')
<div class="container" style="margin-top:50px">
  <h2>マッチングの情報編集画面</h2>
  <form>
    <div class="form-group">
      <label>企業ID</label>
      <input type="text" class="form-control" id="name" name="">
    </div>

    <div class="form-group">
      <label>留学生ID</label>
      <input type="password" class="form-control" id="pwd">
    </div>

    <div class="form-group">
      <label>留学生アピール</label>
      <textarea class="form-control" rows="5" id="message"></textarea>
    </div>

    <div class="form-group">
      <label>企業コメント</label>
      <textarea class="form-control" rows="5" id="message"></textarea>
    </div>

    <div class="form-group">
      <label>マッチング結果</label>
      <select class="form-control" id="csub">
        <option>未読</option>
        <option>合格</option>
        <option>未定</option>
        <option>不合格</option>
      </select>
    </div>

    <button type="submit" class="btn btn-primary">提出</button>
    <button type="reset" class="btn btn-primary">リセット</button>
  </form>
</div>
@endsection
