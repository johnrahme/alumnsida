@if($errors->has())
    <ul style="margin-left: 17px;">
        {{$errors->first('password', '<li style = "color: red;">:message </li>')}}
        {{$errors->first('name', '<li style = "color: red;">:message</li>')}}
        {{$errors->first('surname', '<li style = "color: red;">:message</li>')}}
        {{$errors->first('email', '<li style = "color: red;">:message</li>')}}
        {{$errors->first('username', '<li style = "color: red;">:message</li>')}}
        {{$errors->first('agreement', '<li style = "color: red;">:message</li>')}}
        <?php

        if(isset($extraFields)){

            foreach ($extraFields as $key => $ex){
                echo $errors->first('extras.'.$key, '<li style = "color: red;">The '.$ex->title.' field is required.</li>');
            }
        }
        ?>

    </ul>

@endif