@if($errors->has())
<ul>
    {{$errors->first('name', '<li style = "color: red;">:message </li>')}}
    {{$errors->first('description', '<li style = "color: red;">:message</li>')}}
</ul>

@endif