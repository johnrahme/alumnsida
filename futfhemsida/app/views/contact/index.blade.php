

<div class = "modal fade" id = "contact">
    <div class = "modal-dialog">
        <div class = "modal-content">
        {{Form::open(array('url'=> 'contact/send', 'method' => 'post', 'class' => 'form-horizontal'))}}
             {{--Head--}}
            <div class = "modal-header">
                <h3>Skicka gärna ett mail till oss i FUTF!</h3>

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
                <a href = "#" data-dismiss = "modal" class = "btn btn-default">Stäng</a>
                {{Form::submit('Skicka', array('class' => 'btn btn-success'))}}

            </div>
           {{Form::close()}}
        </div>
    </div>
</div>
