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

<div id="id_företag" style="padding-top: 20px; display:none;">
    <div class="panel panel-default">
        <h4 style="text-align: center; ">Samarbetspartners</h4>
        <div>
            <table style="width: 100%">
                <?php $samarbetspartners = Samarbetspartners::orderBy('created_at', 'desc')->get(); ?>
                @foreach($samarbetspartners as$key => $currSp)
                    <tr>
                        <th @if($currSp->url != 'empty')style="width: 200px; height: 200px"@endif>@if($currSp->url != 'empty'){{HTML::image($currSp->url, '', array('class' => 'img-responsive'))}}@endif</th>
                    </tr>
                @endforeach
            </table>
            <div @if(Auth::check()) id="dynamicCompany" @else @endif>
            </div>
        </div>
    </div>
</div>