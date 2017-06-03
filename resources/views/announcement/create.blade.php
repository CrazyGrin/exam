<div>发布一份公告</div>
@if (count($errors) > 0)
<div class="alert alert-danger"> <strong>新增失败</strong>
    输入不符合要求
    <br>
    <br>
    {!! implode('
    <br>', $errors->all()) !!}</div>
@endif
<form action="{{ url('/announcement') }}" method="POST">
    {!! csrf_field() !!}
    <input type="text" name="title" required="required" placeholder="请输入标题" style="width: 300px;height: 40px;padding: 0 10px;margin: 20px 0;">
    <br>
    <textarea name="body" rows="10" required="required" placeholder="请输入内容" style="resize: none; width: 300px;height: 500px;padding: 20px"></textarea>
    <br>
    <button type="submit">发布公告</button>
</form>