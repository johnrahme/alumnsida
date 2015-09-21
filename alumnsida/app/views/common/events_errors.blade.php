@if($errors->has())
<ul>
    {{$errors->first('name', '<li style = "color: red;">:message </li>')}}
    {{$errors->first('description', '<li style = "color: red;">:message</li>')}}
    {{$errors->first('image', '<li style = "color: red;">:message</li>')}}
    {{$errors->first('dateTimeFrom', '<li style = "color: red;">:message</li>')}}
    {{$errors->first('dateTimeTo', '<li style = "color: red;">:message</li>')}}
    {{$errors->first('place', '<li style = "color: red;">:message</li>')}}
    {{$errors->first('regnr', '<li style = "color: red;">:message</li>')}}
    {{$errors->first('regFrom', '<li style = "color: red;">:message</li>')}}
    {{$errors->first('regTo', '<li style = "color: red;">:message</li>')}}
</ul>

@endif