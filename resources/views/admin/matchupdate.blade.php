@extends('layouts.admin_layout')
@section('title','マッチング編集')
@section('content')
<div class="container" style="margin-top:50px">
  <h2>マッチングの情報編集画面</h2>
  <form action="" method="post">
    {{ csrf_field() }}
    <div class="form-group">
      <span>留学生ID</span><span style="color: #bd2130">{{$errors->first('student_id')}}</span>
      <select class="form-control" name="student_id">
        @if ($_SERVER['REQUEST_METHOD'] = "get")
          @foreach($students as $student)
            @php
            $select = ($item->student_id == $student->id)? "selected":"";
            @endphp
          <option value="{{$student->id}}" {{$select}}>{{$student->id.'|'.$student->name.'|'.$student->email}}</option>
          @endforeach
        @else
          @foreach($students as $student)
            @php
              $select = (old('student_id') == $student->id)? "selected":"";
            @endphp
            <option value="{{$student->id}}" {{$select}}>{{$student->name.'|'.$student->email}}</option>
          @endforeach
         @endif
      </select>
    </div>

    <div class="form-group">
      <span>企業ID</span><span style="color: #bd2130">{{$errors->first('company_id')}}</span>
      <select class="form-control" name="company_id">
        @if ($_SERVER['REQUEST_METHOD'] = "get")
          @foreach($companies as $company)
            @php
              $select = ($item->company_id == $company->id)? "selected":"";
            @endphp
            <option value="{{$company->id}}" {{$select}}>{{$company->id.'|'.$company->name}}</option>
          @endforeach
        @else
          @foreach($students as $student)
            @php
              $select = (old('company_id') == $company->id)? "selected":"";
            @endphp
            <option value="{{$company->id}}" {{$select}}>{{$cpmpany->id.'|'.$company->name}}</option>
          @endforeach
        @endif
      </select>
    </div>

    <div class="form-group">
      <span>学生アピール</span><span style="color: #bd2130">{{$errors->first('student_comment')}}</span>
<textarea class="form-control" rows="5" name="student_comment">
@if (old('student_comment') != null)
{{old('student_comment')}}
@else
{{$item->student_comment}}
@endif
</textarea>
    </div>

    <div class="form-group">
      <label>企業コメント</label>
<textarea class="form-control" rows="5" name="company_comment">
@if (old('company_comment') != null)
{{old('company_comment')}}
@else
{{$item->company_comment}}
@endif
</textarea>
    </div>

    <div class="form-group">
      <label>マッチング結果</label>
      <select class="form-control" name="result_id">
       @if (old('result_id') != null)
          @foreach($results as $result)
            @php
              $select = (old('result_id') == $result->id)? "selected":"";
            @endphp
            <option value="{{$result->id}}" {{$select}}>{{$result->name}}</option>
          @endforeach
       @else
          @foreach($results as $result)
            @php
              $select = ($item->result_id == $result->id)? "selected":"";
            @endphp
            <option value="{{$result->id}}" {{$select}}>{{$result->name}}</option>
          @endforeach
       @endif
      </select>
    </div>

    <button type="submit" class="btn btn-primary">提出</button>
    <button><a href="{{url('admin/matchindex')}}">back</a></button>
  </form>
</div>
@endsection
