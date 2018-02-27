@extends('layouts.admin_layout')
@section('title','マッチング詳細')
@section('content')
  <div class="container" style="margin-top:50px">
  <h2>マッチングの詳細画面</h2>
  <table>
    <tr><th>学生ID:</th><td>{{$item->student_id}}</td></tr>
    <tr><th>学生名前:</th><td>{{$item->student->name}}</td></tr>
    <tr><th>会社ID:</th><td>{{$item->company_id}}</td></tr>
    <tr><th>会社名前:</th><td>{{$item->company->name}}</td></tr>
    <tr><th>学生アピール:</th><td>{{$item->student_comment}}</td></tr>
    <tr><th>会社コメント:</th><td>{{$item->company_comment}}</td></tr>
    <tr><th>結果:</th><td>{{$item->result->name}}</td></tr>

  </table>

    <button><a href="{{url('admin/matchindex')}}">back</a></button>
  </form>
</div>
@endsection
