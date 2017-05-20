{{ HTML::script('js/footerDate.js')}}

<div class="pre-footer">
    <div class="pre-footer-logo">
    </div>
    <div class="backgroundFooter footer">
        <div class="container" style="padding-top: 50px">
            <div id="largeElement" class="row">
                <div class="col-sm-4">
                    <div style="text-align: center; width:100%;">
                        <h4>Postadress</h4>
                        <ul class="unstyled" style="margin-top: -10px">
                            <li>FUTF, Uthgård</li>
                            <li>752 37 Uppsala</li>
                        </ul>
                        <h4>Besöksadress</h4>
                        <ul class="unstyled" style="margin-top: -10px">
                            <li>Polacksbacken ITC</li>
                            <li>Hus 1, rum 1153</li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div style="text-align: center; width:100%; margin-top: 5px ">

                        <body onmousemove="startTime()">
                        <span id="date_timer"></span>
                        </body>

                        <h6 style="margin-top: -8px"><br> Skapad från <span class="glyphicon glyphicon-heart"></span>
                            av {{ link_to('creators','FUTF:s IT-grupp 2015-2017', array('class' => 'colourLink'))}}.</h6>
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
                            av {{ link_to('creators','FUTF:s IT-grupp 2015-2017', array('class' => 'colourLink'))}}.</h6>
                        <p><h6>Copyright &copy; {{date("Y")}} FUTF.</h6></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>