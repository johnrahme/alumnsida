<div class="footer">
    <div class="container">
        <div id="largeElement" class="row">
            <div class="col-sm-4">
                <div style="text-align: center; width:100%;">
                    <h6>Navigering</h6>
                    <ul class="unstyled">
                        <li>{{link_to('/','Start')}}</li>
                        <li>{{link_to_route('events', 'Event')}}</li>
                        <li>{{link_to_route('new_admin', 'Skapa konto')}}</li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-4">
                <div style="text-align: center; width:100%; margin-top: 0px ">
                    <SCRIPT LANGUAGE="JavaScript"
                            TYPE="text/javascript">
                        var date = new Date();
                        var option1 = {weekday: "long"};
                        var option2 = {day: "numeric"};
                        var option3 = {month: "long"};
                        document.write(date.toLocaleString("se-SE", option1), "en den ", date.toLocaleString("se-SE", option2), " ", date.toLocaleString("se-SE", option3), "<br>");
                        function startTime() {
                            var today = new Date();
                            var h = today.getHours();
                            var m = today.getMinutes();
                            var s = today.getSeconds();
                            m = checkTime(m);
                            s = checkTime(s);
                            document.getElementById('time').innerHTML =
                                    h + ":" + m + ":" + s;
                            var t = setTimeout(startTime, 999);
                        }
                        function checkTime(i) {
                            if (i < 10) {
                                i = "0" + i
                            }
                            ;  // add zero in front of numbers < 10
                            return i;
                        }
                    </SCRIPT>
                    <body onload="startTime()">
                    <div id="time"></div>
                    </body>
                    <h6 style="margin-top: -8px"><br> Skapad från <span class="glyphicon glyphicon-heart"></span>
                        av {{ link_to('/','the J-Quad Squad', array('class' => 'colourLink'))}}.</h6>
                    <p><h6>Copyright &copy; {{date("Y")}} FUTF.</h6></p>
                </div>
            </div>
            <div class="col-sm-4">
                <div style="text-align: center; width:100%;">
                    <h6>Följ FUTF</h6>
                    <ul class="unstyled">
                        <li>
                            <a href="https://www.linkedin.com/groups/FUTF-Association-Uppsala-Engineering-Physics-2742358/about">LinkedIn</a>
                        </li>
                        <li><a href="https://www.facebook.com/futf.se?fref=ts">Facebook</a></li>
                        <li><a href="http://futf.se/">Futf.se</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div id="smallElement" class="row">
            <div class="col-sm-4">
                <div style="text-align: center; width:100%;">
                    <h6>Navigering</h6>
                    <ul class="unstyled">
                        <li>{{link_to('/','Start')}}</li>
                        <li>{{link_to_route('events', 'Event')}}</li>
                        <li>{{link_to_route('new_admin', 'Skapa konto')}}</li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-4">
                <div style="text-align: center; width:100%;">
                    <h6>Följ FUTF</h6>
                    <ul class="unstyled">
                        <li>
                            <a href="https://www.linkedin.com/groups/FUTF-Association-Uppsala-Engineering-Physics-2742358/about">LinkedIn</a>
                        </li>
                        <li><a href="https://www.facebook.com/futf.se?fref=ts">Facebook</a></li>
                        <li><a href="http://futf.se/">Futf.se</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-4">
                <div style="text-align: center; width:100%">
                    <h6><br> Skapad från <span class="glyphicon glyphicon-heart"></span>
                        av {{ link_to('/','the J-Quad Squad', array('class' => 'colourLink'))}}.</h6>

                    <p><h6>Copyright &copy; {{date("Y")}} FUTF.</h6></p>
                    <SCRIPT LANGUAGE="JavaScript"
                            TYPE="text/javascript">
                        var date = new Date();
                        var option1 = {weekday: "long"};
                        var option2 = {day: "numeric"};
                        var option3 = {month: "long"};
                        document.write(date.toLocaleString("se-SE", option1), "en den ", date.toLocaleString("se-SE", option2), " ", date.toLocaleString("se-SE", option3), "<br>");
                        function startTime() {
                            var today = new Date();
                            var h = today.getHours();
                            var m = today.getMinutes();
                            var s = today.getSeconds();
                            m = checkTime(m);
                            s = checkTime(s);
                            document.getElementById('time').innerHTML =
                                    h + ":" + m + ":" + s;
                            var t = setTimeout(startTime, 500);
                        }
                        function checkTime(i) {
                            if (i < 10) {
                                i = "0" + i
                            }
                            ;  // add zero in front of numbers < 10
                            return i;
                        }
                    </SCRIPT>
                    <body onload="startTime()">
                    <div style="padding: 2px" id="time"></div>
                    </body>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>