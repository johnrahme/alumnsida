<div class="modal fade" id="contact">
    <div class="modal-dialog">
        <div class="modal-content">
            {{Form::open(array('url'=> 'contact/send', 'method' => 'post', 'class' => 'form-horizontal', 'id'=> 'contactForm', 'onsubmit'=>'return validateContact()'))}}
            {{--Head--}}
            <div class="modal-header">
                <h3>Skicka gärna ett mail till oss i FUTF!</h3>

            </div>
            {{--Body--}}
            <div class="modal-body">
                <div class="form-group">


                    <label style="text-align: left" for="contact-name" class="col-lg-3 required control-label" >Namn:</label>

                    <div class="col-lg-9">
                        <input type="text" class="form-control" id="contact-name" name="contact-name"
                               placeholder="Namn" value="">

                    </div>

                </div>
                <div class="form-group">
                    <label style="text-align: left" for="contact-email" class="col-lg-3 required control-label" >Email:</label>

                    <div class="col-lg-9">
                        <input type="email" class="form-control" id="contact-email" name="contact-email"
                               placeholder="futf@example.se">

                    </div>

                </div>

                <div class="form-group">
                    <label style="text-align: left" for="contact-text" class="col-lg-3 required control-label" >Meddelande:  </label>

                    <div class="col-lg-9">
                        <textarea class="form-control" rows="7" id="contact-text" name="contact-text"
                                  style="resize:none"></textarea>

                    </div>

                </div>

            </div>
            {{--Footer--}}
            <div class="modal-footer">
                <a href="#" data-dismiss="modal" class="btn btn-default">Stäng</a>
                {{--<button class = "btn btn-success" onclick="validateContact()">Skicka</button>--}}
                {{Form::submit('Skicka', array('class' => 'btn btn-success'))}}

            </div>
            {{Form::close()}}
        </div>
    </div>
</div>

<script>
    function validateContact() {
        var check = 1;
        if ($("#contact-name").val() == "") {
            check = 0;
            $("#contact-name").parent().parent().addClass("has-error");
        }
        else{
            $("#contact-name").parent().parent().removeClass("has-error");
            $("#contact-name").parent().parent().addClass("has-success");
        }
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

        if (!re.test($("#contact-email").val())) {
            check = 0;
            $("#contact-email").parent().parent().addClass("has-error");
        }
        else{
            $("#contact-email").parent().parent().removeClass("has-error");
            $("#contact-email").parent().parent().addClass("has-success");
        }
        if ($("#contact-text").val() == "")
        {
            $("#contact-text").parent().parent().addClass("has-error");
            check = 0;
        }
        else{
            $("#contact-text").parent().parent().removeClass("has-error");
            $("#contact-text").parent().parent().addClass("has-success");
        }
        if (!check) {
            return false;
        }


    }
</script>
