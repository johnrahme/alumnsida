@if($errors->has())
<ul>
    {{$errors->first('password', '<li style = "color: red;">:message </li>')}}
    {{$errors->first('email', '<li style = "color: red;">:message</li>')}}
    {{$errors->first('username', '<li style = "color: red;">:message</li>')}}
</ul>

@endif