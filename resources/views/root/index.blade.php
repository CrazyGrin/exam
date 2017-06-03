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
        <button type="button" id="outputxls">
            导出
        </button>
    <table id="firm_table" class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th>id</th>
                <th>姓名</th>
                <th>密码</th>
                <th>权限等级</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->password }}</td>
                <td>{{ $user->auth }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
    <script src="{{ URL::asset('/') }}/plug/tableExporter.js"></script>
    <script type="text/javascript">
    document.querySelector('#outputxls').onclick = ()=>{
        $('.table').tableExport({
            filename: 'table',
            format: 'xls'
        });
    }
    </script>
</html>