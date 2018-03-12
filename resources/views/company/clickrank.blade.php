@extends('layouts.company_layout')
@section('title','rank')
@section('content')
<div class="container" style="margin-top:50px">
    <table class="table table-striped">
        <tr>
            <th>rank</th><th>name</th><th>访问量</th>
        </tr>
        @foreach($clicks as $rank =>$click)
            <tr><th>{{$rank+1}}</th><th>{{$click->name}}</th><th>{{$click->clicks}}</th></tr>
        @endforeach
    </table>
</div>
@endsection