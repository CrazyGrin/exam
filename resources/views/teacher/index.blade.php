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
        <form action="./logout" method="GET">
            <button type="submit">退出登录</button>
        </form>
        <form action="./update" method="POST"></form>
        <h1>我的学生</h1>
        <hr>
        @foreach ($data['students'] as $student)
        <p>姓名 : {{ $student->name }}</p>
        <p>学号(密码) : {{ $student->password }}</p>
        <p>性别 : {{ $student->gender }}</p>
        <p>班级号 : {{ $student->class_num }}</p>
        <p>专业号 : {{ $student->major_num }}</p>
        <p>专业名称 : {{ $student->major }}</p>
        <p>年级 : {{ $student->grade }}</p>
        <p>
            <a href="http://jwzx.cqupt.edu.cn/jwzxtmp/kebiao/kb_stu.php?xh={{ $student->password }}">查看他的课表</a>
        </p>
        <hr>
        @endforeach
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
        @foreach ($data['allStudents'] as $allStudent)
        <p>姓名 : {{ $allStudent->name }}</p>
        <p>学号(密码) : {{ $allStudent->password }}</p>
        <p>性别 : {{ $allStudent->gender }}</p>
        <p>班级号 : {{ $allStudent->class_num }}</p>
        <p>专业号 : {{ $allStudent->major_num }}</p>
        <p>专业名称 : {{ $allStudent->major }}</p>
        <p>年级 : {{ $allStudent->grade }}</p>
        <p>
            <a href="http://jwzx.cqupt.edu.cn/jwzxtmp/kebiao/kb_stu.php?xh={{ $student->password }}">查看他的课表</a>
        </p>
        <hr>
        @endforeach
        {{ $data['allStudents']->links() }}
    </div>
</body>
</html>