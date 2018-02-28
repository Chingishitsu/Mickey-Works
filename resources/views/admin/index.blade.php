@extends('layouts.admin_layout')
@section('title','')
@section('content')
  <div class="container">

    <div class="card bg-info text-white">
      <div class="card-body">
        <a href="#" style="color:white;font-size:30px;">企業の検索</a>
      </div>
    </div>
    <br>
    <div class="card bg-warning text-white">
      <div class="card-body">
        <a href="#" style="color:white;font-size:30px;">留学生の検索</a>
      </div>
    </div>
    <br>
    <div class="card bg-danger text-white">
      <div class="card-body">
        <a href="{{url('admin/matchindex')}}" style="color:white;font-size:30px;">マッチング履歴検索</a>
      </div>
    </div>

  </div>
@endsection