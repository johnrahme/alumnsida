<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-2">
                <div style="text-align: center; width:100%;">
                    <h6>Navigering</h6>
                    <ul class="unstyled">
                        <li>{{link_to('/','Start')}}</li>
                        <li>{{link_to_route('events', 'Event')}}</li>
                        <li>{{link_to_route('new_admin', 'Skapa konto')}}</li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-2">
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
            <div class="col-sm-5">
                <!-- För att få elementen centrerade, och ändå vara till höger och vänster. Detta för att det ska vara snyggt på mobila enheter-->
            </div>
            <div class="col-sm-3">
                <div style="text-align: center; width:100%;">
                    <h6> Skapad från <span class="glyphicon glyphicon-heart"></span>
                        av {{ link_to('/','the J-Quad Squad', array('class' => 'colourLink'))}}.</h6>

                    <p><h6>Copyright &copy; {{date("Y")}} FUTF.</h6></p>
                </div>
            </div>
        </div>
    </div>
</footer>
