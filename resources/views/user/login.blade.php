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
        <form action="./login" method="POST">
            <input type="text" required="required" name="username">
            <input type="password" required="required" name="password">
            <button type="submit">学生登录</button>
            <input type="hidden" name="auth" value="1">
            <input type="hidden" name="_token" value="{{ csrf_token() }}"></form>
        <form action="./login" method="POST">
            <input type="text" name="username">
            <input type="password" name="password">
            <button type="submit">管理员登录</button>
            <input type="hidden" name="auth" value="3">
            <input type="hidden" name="_token" value="{{ csrf_token() }}"></form>
    </div>
</body>
</html>