@extends('layouts.admin_layout')
@section('title','マッチング一覧')

@section('content')
  <div class="container">
  <h2>マッチング情報の検索</h2>
  <form action="" method="get">
    <div class="form-inline">
      <h3>会社名記入</h3><input type="text" class="form-control" name="company_name" value="{{$company_name}}">
    </div>

    <div class="form-inline">
      <h3>留学生名前記入</h3><input type="text" class="form-control" name="student_name" value="{{$student_name}}">
    </div>

    <input type="submit" class="btn btn-info" value="検索">
  </form>
    <br>
    <a href="{{url('admin/matchadd')}} " class="btn btn-info">新規</a>
</div>

<div class="container">

  <h3>検索結果</h3>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>マッチングID</th>
        <th>企業のID</th>
        <th>企業本名</th>
        <th>留学生のID</th>
        <th>留学生の名前</th>
        <th>マッチングの結果</th>
        <th>edit</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($items as $item)
      <tr>
        <td><a href="#" >{{$item->id}}</a></td>
        <td><a href="#" >{{$item->company_id}}</a></td>
        <td><a href="#" >{{$item->company->name}}</a></td>
        <td><a href="#" >{{$item->student_id}}</a></td>
        <td><a href="#" >{{$item->student->name}}</a></td>
        <td><a href="#" >{{$item->result->name}}</a></td>
        <td><a href="matchview/{{$item->id}}" >view</a></td>
        <td><a href="matchupdate/{{$item->id}}">update</a></td>
        <td><a href="matchdelete/{{$item->id}}">delete</a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
  {{$items->links()}}
</div>
@endsection
