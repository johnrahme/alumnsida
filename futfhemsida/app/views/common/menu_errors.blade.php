@if($errors->has())
    <ul>
        {{$errors->first('name', '<li style = "color: red;">:message </li>')}}
        {{$errors->first('url', '<li style = "color: red;">:message </li>')}}
        {{$errors->first('content', '<li style = "color: red;">:message </li>')}}
    </ul>

@endif