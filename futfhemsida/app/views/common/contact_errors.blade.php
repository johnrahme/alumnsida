@if($errors->has())
<ul>
    {{$errors->first('name', '<li style = "color: red;">:message </li>')}}
    {{$errors->first('email', '<li style = "color: red;">:message</li>')}}
</ul>

@endif