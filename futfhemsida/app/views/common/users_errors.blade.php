@if($errors->has())
    <ul style="margin-left: 17px;">
        {{$errors->first('password', '<li style = "color: red;">:message </li>')}}
        {{$errors->first('name', '<li style = "color: red;">:message</li>')}}
        {{$errors->first('surname', '<li style = "color: red;">:message</li>')}}
        {{$errors->first('email', '<li style = "color: red;">:message</li>')}}
        {{$errors->first('username', '<li style = "color: red;">:message</li>')}}
        {{$errors->first('agreement', '<li style = "color: red;">:message</li>')}}
        {{$errors->first('data', '<li style = "color: red;">:message</li>')}}
    </ul>

@endif