<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
    <div class="nav"></div>
    <div class="main">
        <form action="http://localhost/RedrockExam/public/teacher/update" method="POST">
            <input type="hidden" name="user_id" value="{{ $data['me'][0]->
            id }}" readonly>
            <input type="text" name="username" value="{{ $data['me'][0]->
            name }}">
            <br>
            <input type="text" name="teacher_num" value="{{ $data['me'][0]->
            teacher_num }}" readonly>
            <br>
            <input type="text" name="class_num" value="{{ $data['me'][0]->
            class_num }}" readonly>
            <br>
            <input type="text" name="gender" value="{{ $data['me'][0]->
            gender }}">
            <br>
            <button type="submit">修改个人信息</button>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <hr></form>
        <form action="./logout" method="GET">
            <button type="submit">退出登录</button>
        </form>
        <form action="./update" method="POST"></form>
        <h1>我的学生</h1>
        <table id="firm_table" class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>姓名</th>
                    <th>学号(密码)</th>
                    <th>性别</th>
                    <th>班级号</th>
                    <th>专业号</th>
                    <th>专业名称</th>
                    <th>年级</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data['students'] as $student)
                <tr>
                    <td>
                        {{ $student->name }}
                        <a href="http://jwzx.cqupt.edu.cn/jwzxtmp/kebiao/kb_stu.php?xh={{ $student->password }}">课表</a>
                    </td>
                    <td>{{ $student->password }}</td>
                    <td>{{ $student->gender }}</td>
                    <td>{{ $student->class_num }}</td>
                    <td>{{ $student->major_num }}</td>
                    <td>{{ $student->major }}</td>
                    <td>{{ $student->grade }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <hr>
        <div>发布一份公告</div>
        <form action="{{ url('/announcement') }}" method="POST">
            {!! csrf_field() !!}
            <input type="hidden" name="publisher_id" value="{{$data['me'][0]->
            id}}">
            <input type="text" name="title" required="required" placeholder="请输入标题" style="width: 300px;height: 40px;padding: 0 10px;margin: 20px 0;">
            <br>
            <textarea name="body" rows="10" required="required" placeholder="请输入内容" style="resize: none; width: 300px;height: 500px;padding: 20px"></textarea>
            <br>
            <button type="submit">发布公告</button>
        </form>
        <h1>公告</h1>
        @foreach ($data['announcements'] as $announcement)
        <p>第一 : {{ $announcement->id }}</p>
        <p>标题 : {{ $announcement->title }}</p>
        <p>内容 : {{ $announcement->content }}</p>
        <hr>
        @endforeach
        <h1>所有学生</h1>
        <hr>

        <button type="button" id="outputxls">导出</button>

        <table id="firm_table" class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>姓名</th>
                    <th>学号(密码)</th>
                    <th>性别</th>
                    <th>班级号</th>
                    <th>专业号</th>
                    <th>专业名称</th>
                    <th>年级</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data['allStudents'] as $allStudent)
                <tr>
                    <td>{{ $allStudent->name }}</td>
                    <td>{{ $allStudent->password }}</td>
                    <td>{{ $allStudent->gender }}</td>
                    <td>{{ $allStudent->class_num }}</td>
                    <td>{{ $allStudent->major_num }}</td>
                    <td>{{ $allStudent->major }}</td>
                    <td>{{ $allStudent->grade }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <hr></div>
    <script src="{{ URL::asset('/') }}/plug/tableExporter.js"></script>
    <script type="text/javascript">
    document.querySelector('#outputxls').onclick = ()=>{
        $('.table').tableExport({
            filename: 'table',
            format: 'xls'
        });
    }
    </script>
</body>
</html>