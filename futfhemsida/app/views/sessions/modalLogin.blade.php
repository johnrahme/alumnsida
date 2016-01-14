@include('sessions.linkedIn.loginForm')
<div class="modal fade" id="modalLogin">
    <div class="modal-dialog">
        <div class="modal-content">
            @include('common.users_errors')
            {{Form::open(array('route'=> 'sessions.store','files'=>true))}}
            {{--Head--}}
            <div class="modal-header">
                <h2>Login
                    <small>eller
                        <script type="in/Login"></script>
                    </small>
                </h2>

            </div>
            {{--Body--}}
            <div class="modal-body">
                <div class="form-group">

                    <p>
                        {{Form::label('email', 'Email:')}} <br/>

                        {{Form::text('email', '', array('class' => 'form-control'))}}
                    </p>

                </div>
                <div class="form-group">

                    {{Form::label('password', 'Lösenord')}} <br/>

                    {{Form::password('password', array('class' => 'form-control'))}}

                </div>

                {{link_to_route('forgot', 'Glömt lösenord')}}
            </div>
            {{--Footer--}}
            <div class="modal-footer">
                <a href="#" data-dismiss="modal" class="btn btn-default">Stäng</a>
                {{Form::submit('Login', array('class' => 'btn btn-success'))}}
            </div>
            {{Form::close()}}
        </div>
    </div>
</div>
