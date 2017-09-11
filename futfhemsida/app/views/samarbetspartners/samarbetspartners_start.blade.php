<?php
/**
 * Created by PhpStorm.
 * User: jhara
 * Date: 2017-04-02
 * Time: 12:45
 */

?>
        <!DOCTYPE html>
<html>
<head>
    <title> {{$title}} </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <style>
        @media (max-width: 768px) {
            .samarbetspartners_slideshow {
                display: none;
                margin-top: 30px;
                margin-bottom: 30px;
            }

            .animate-right {
                position: relative;
                animation: animateright 0.4s
            }

            @keyframes animateright {
                from {
                    right: -300px;
                    opacity: 0
                }
                to {
                    right: 0;
                    opacity: 1
                }
            }
        }

        @media (min-width: 768px) {
            .page-header_samarbetspartners {
                padding-bottom: 9px;
                margin: 40px 0 20px;
                border-bottom: 1px solid #eee
            }
        }
    </style>
</head>
<div id="id_företag" style="display:none;">
    <div class="panel panel-default">
        <h4 style="text-align: center; margin-bottom: -25px">Samarbetspartners</h4>
        <div>
            <table style="width: 100%">
                <?php $samarbetspartners = Samarbetspartners::orderBy('created_at', 'desc')->get(); ?>
                @foreach($samarbetspartners as $key => $currSp)
                    <tr class="samarbetspartners_slideshow animate-right">
                        <th @if($currSp->url != 'empty')@endif>
                            <div class="page-header_samarbetspartners" style="margin-bottom: -30px">
                                <a href="samarbetspartners/{{$currSp->id}}"> @if($currSp->url != 'empty'){{HTML::image($currSp->url, '', array('class' => 'img-responsive'))}}@endif</a>
                            </div>
                        </th>
                    </tr>
                @endforeach
            </table>
            <div @if(Auth::check()) id="dynamicCompany" @else @endif>
            </div>
            <div style="margin-bottom: 30px">
            </div>
        </div>
    </div>
</div>

<script>
    var index = 0;
    //window.addEventListener("resize", carousel);
    window.addEventListener("load", carousel);
    function carousel() {
        console.log("partner change");
        if (window.innerWidth <= 768) {
            var i;
            var x = document.getElementsByClassName("samarbetspartners_slideshow");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            index++;
            if (index > x.length) {
                index = 1
            }
            x[index - 1].style.display = "block";
            setTimeout(carousel, 10000); // Change image every 10 seconds
        }
        else {
            var i;
            var x = document.getElementsByClassName("samarbetspartners_slideshow");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "block";
            }
        }
    }
</script>
</html>