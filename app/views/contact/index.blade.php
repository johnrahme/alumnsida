

<div class = "modal fade" id = "contact">
    <div class = "modal-dialog">
        <div class = "modal-content">
        {{Form::open(array('url'=> 'contact/send', 'method' => 'post', 'class' => 'form-horizontal'))}}
             {{--Head--}}
            <div class = "modal-header">
                <p>Kontakt</p>

            </div>
            {{--Body--}}
            <div class = "modal-body">
                <div class = "form-group">

					<label for = "contact-name" class = "col-lg-2" control-label>Name:</label>
						<div class = "col-lg-10">
							<input type = "text" class = "form-control" id = "contact-name" name="contact-name" placeholder = "Full name" value = "">

						</div>

				</div>
				<div class = "form-group">
					<label for = "contact-email" class = "col-lg-2" control-label>Email:</label>
						<div class = "col-lg-10">
								<input type = "email" class = "form-control" id = "contact-email" name = "contact-email" placeholder = "u@example.com">

						</div>

				</div>

				<div class = "form-group">
					<label for = "contact-text" class = "col-lg-2" control-label>Text: </label>
						<div class = "col-lg-10">
							<textarea class = "form-control" rows = "7" id = "contact-text" name = "contact-text" style="resize:none"></textarea>

						</div>

				</div>

            </div>
            {{--Footer--}}
            <div class = "modal-footer">
                <a href = "#" data-dismiss = "modal" class = "btn">Close</a>
                {{Form::submit('Send', array('class' => 'btn btn-primary'))}}

            </div>
           {{Form::close()}}
        </div>
    </div>
</div>
