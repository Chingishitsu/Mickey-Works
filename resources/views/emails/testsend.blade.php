<div>
    <tabel>
        <tr>
            <th>公司ID</th><th>公司名字</th><th>学生ID</th><th>学生名字</th><th>结果</th>
        </tr>
        @foreach ($matches as $match)
        <tr>
            <th>{{$match->company->id}}</th><th>{{$match->company->name}}</th><th>{{$match->student->id}}</th><th>{{$match->student->name}}</th><th>{{$match->result->name}}</th>
        </tr>
        @endforeach
    </tabel>
</div>