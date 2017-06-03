<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <div class="nav"></div>
    <div class="main">
        <form action="./login" method="POST">
            <input type="text" name="username">
            <input type="password" name="password">
            <button type="submit">test</button>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </form>
    </div>
</body>
</html>