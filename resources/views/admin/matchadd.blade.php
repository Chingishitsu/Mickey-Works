@extends('layouts.admin_layout')

@section('title','マッチング一覧')
@section("content")
  <div class="container" style="margin-top:50px">
  <h2>マッチング情報新規画面</h2>
  <form action="" method="post">
      {{ csrf_field() }}
    <div class="form-group">
      <span>留学生ID</span><span style="color: #bd2130">{{$errors->first('student_id')}}</span>
        <select class="form-control" name="student_id">
            <option value="">IDを選んでください</option>
            @foreach($students as $student)
                @php
                $select = (old('student_id') == $student->id)? "selected":"";
                @endphp
                <option value="{{$student->id}}" {{$select}}>{{$student->id.'|'.$student->name.'|'.$student->email}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
      <span>企業ID</span><span style="color: #bd2130">{{$errors->first('company_id')}}</span>
        <select class="form-control" name="company_id">
            <option value="">IDを選んでください</option>
            @foreach($companies as $company)
                @php
                    $select = (old('company_id') == $company->id)? "selected":"";
                @endphp
                <option value="{{$company->id}}" {{$select}}>{{$company->id.'|'.$company->name}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
      <span>学生アピール</span><span style="color: #bd2130">{{$errors->first('student_comment')}}</span>
      <textarea class="form-control" rows="5"  name="student_comment">{{old('student_comment')}}</textarea>
    </div>

    <div class="form-group">
      <label>企業コメント</label>
      <textarea class="form-control" rows="5" name="company_comment">{{old('company_comment')}}</textarea>
    </div>

    <div class="form-group">
      <label>マッチング結果</label>
      <select class="form-control" name="result_id">
          @foreach($items as $item)
            <option value="{{$item->id}}">{{$item->name}}</option>
          @endforeach
      </select>
    </div>

    <button class="btn btn-primary"><input type="submit" value="submit"></button>
    <button><a href="{{url('admin/matchindex')}}">back</a></button>
  </form>
</div>

@endsection
