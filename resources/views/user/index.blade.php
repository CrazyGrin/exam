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
        <form action="http://localhost/RedrockExam/public/user/update" method="POST">
            <input type="hidden" name="user_id" value="{{ $data['me'][0]->
            id }}" readonly>
            <input type="text" name="username" value="{{ $data['me'][0]->
            name }}">
            <br>
            <input type="text" name="password" value="{{ $data['me'][0]->
            password }}" readonly>
            <br>
            <input type="text" name="gender" value="{{ $data['me'][0]->
            gender }}">
            <br>
            <input type="text" name="class_num" value="{{ $data['me'][0]->
            class_num }}">
            <br>
            <input type="text" name="major_num" value="{{ $data['me'][0]->
            major_num }}">
            <br>
            <input type="text" name="major" value="{{ $data['me'][0]->
            major }}">
            <br>
            <input type="text" name="grade" value="{{ $data['me'][0]->
            grade }}">
            <br>
            <button type="submit">修改个人信息</button>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <hr></form>
        <form action="http://localhost/RedrockExam/public/user/logout" method="GET">
            <button type="submit">退出登录</button>
        </form>
        <h1>本班学生</h1>
        <hr>
        @foreach ($data['students'] as $student)
        <p>id : {{ $student->id }}</p>
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

        <h1>公告</h1>
        @foreach ($data['announcements'] as $announcement)
        <p>第一 : {{ $announcement->id }}</p>
        <p>标题 : {{ $announcement->title }}</p>
        <p>内容 : {{ $announcement->content }}</p>
        <hr>
        @endforeach
        <a href="http://jwzx.cqupt.edu.cn/jwzxtmp/kebiao/kb_stu.php?xh={{ $data['me'][0]->password }}">查看我的课表</a>
    </div>
</body>
</html>