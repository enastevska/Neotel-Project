@extends('layouts.app')
@extends('layouts.layout')
@section('content')

<head>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>



<div class=”row” style="margin-left:36%">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <h1>Destination options</h1>
            <br>
            <?php
            $url = url()->current();
            $urlParts = explode("/", $url);
            ?>
        <form method="POST" action="/home/stream/{{$urlParts[6]}}" >
            <h3>Protocol</h3>
            @csrf
            <select id="protocol" name="protcols" style=" font-size: 13px;padding: 5px; background: #fff;border: 1px solid #ccc; border-radius: 6px;overflow: hidden;position: relative;width:30%; margin-left:7.7%">
                <option id="0" value="0">Select ...</option>
                <option value="udp" name="udp" id="udp">UDP </option>
                <option value="rtsp" name="rtsp" id="rtsp">RTSP </option>
                <option value="rtmp" name="rtmp" id="rtmp">RTMP </option>
            </select>

        <div id="udp1" style="display: none">
            <br>
            <h4>UDP Options</h4>
            <div>
                IP address:  <input type="number" min="0" max="255" maxlength="3" name="13" style=" font-size: 13px;padding: 5px; background: #fff;border: 1px solid #ccc; border-radius: 6px;overflow: hidden;position: relative; margin-left:12%">.<input type="number" min="0" max="255" maxlength="3" name="1" style=" font-size: 13px;padding: 5px; background: #fff;border: 1px solid #ccc; border-radius: 6px;overflow: hidden;position: relative;">.<input type="number" min="0" max="255" maxlength="3" name="2" style=" font-size: 13px;padding: 5px; background: #fff;border: 1px solid #ccc; border-radius: 6px;overflow: hidden;position: relative;">.<input type="number" min="0" max="255" maxlength="3" name="3" style=" font-size: 13px;padding: 5px; background: #fff;border: 1px solid #ccc; border-radius: 6px;overflow: hidden;position: relative;">
            </div>
            <br>
            <div>
                Port:  <input type="text" name="port_udp" style=" font-size: 13px;padding: 5px; background: #fff;border: 1px solid #ccc; border-radius: 6px;overflow: hidden;position: relative;width:30%; margin-left:17.5%">
            </div>
            <br>
            <button type="submit" style="width: 10%;background-color: #4CAF50;color: white;padding: 10px;border: none;border-radius: 4px;cursor: pointer;margin-left:39.4%">Save</button>
        </div>



            <div id="rtsp1"  style="display: none">

                <h4>RTSP Options</h4>
                <div>
                    IP address: <input type="number" min="0" max="255" maxlength="3" name="14" style=" font-size: 13px;padding: 5px; background: #fff;border: 1px solid #ccc; border-radius: 6px;overflow: hidden;position: relative; margin-left:12%">.<input type="number" min="0" max="255" maxlength="3" name="5" style=" font-size: 13px;padding: 5px; background: #fff;border: 1px solid #ccc; border-radius: 6px;overflow: hidden;position: relative;">.<input type="number" min="0" max="255" maxlength="3" name="6" style=" font-size: 13px;padding: 5px; background: #fff;border: 1px solid #ccc; border-radius: 6px;overflow: hidden;position: relative;">.<input type="number" min="0" max="255" maxlength="3" name="7" style=" font-size: 13px;padding: 5px; background: #fff;border: 1px solid #ccc; border-radius: 6px;overflow: hidden;position: relative;">
                </div>
                <br>
                <div>   <br>
                    Port:  <input type="text" name="port" value="1935" style=" font-size: 13px;padding: 5px; background: #fff;border: 1px solid #ccc; border-radius: 6px;overflow: hidden;position: relative;width:30%; margin-left:17.5%">
                </div>
                <br>
                <div>
                    Publishing Point:  <input type="text" name="publishingpoint"  style=" font-size: 13px;padding: 5px; background: #fff;border: 1px solid #ccc; border-radius: 6px;overflow: hidden;position: relative;width:30%; margin-left:7%">
                </div>
                <br>
                <button type="submit" style="width: 10%;background-color: #4CAF50;color: white;padding: 10px;border: none;border-radius: 4px;cursor: pointer;margin-left:39.4%">Save</button>
            </div>


            <div id="rtmp1"  style="display: none">
                <br>
                <h4>RTMP Options</h4>
                <div>
                    IP address:  <input type="number" min="0" max="255" maxlength="3" name="8" style=" font-size: 13px;padding: 5px; background: #fff;border: 1px solid #ccc; border-radius: 6px;overflow: hidden;position: relative; margin-left:12%">.<input type="number" min="0" max="255" maxlength="3" name="9" style=" font-size: 13px;padding: 5px; background: #fff;border: 1px solid #ccc; border-radius: 6px;overflow: hidden;position: relative;">.<input type="number" min="0" max="255" maxlength="3" name="10" style=" font-size: 13px;padding: 5px; background: #fff;border: 1px solid #ccc; border-radius: 6px;overflow: hidden;position: relative;">.<input type="number" min="0" max="255" maxlength="3" name="11" style=" font-size: 13px;padding: 5px; background: #fff;border: 1px solid #ccc; border-radius: 6px;overflow: hidden;position: relative;">
                </div>
                <br>
                <div>
                    Port:  <input type="text" name="port" value="1935" style=" font-size: 13px;padding: 5px; background: #fff;border: 1px solid #ccc; border-radius: 6px;overflow: hidden;position: relative;width:30%; margin-left:17.5%">
                </div>
                <br>
                <div>
                    Publishing Point:  <input type="publishingpoint" name="height"  style=" font-size: 13px;padding: 5px; background: #fff;border: 1px solid #ccc; border-radius: 6px;overflow: hidden;position: relative;width:30%; margin-left:7%">
                </div>
                <br>
                <button type="submit" style="width: 10%;background-color: #4CAF50;color: white;padding: 10px;border: none;border-radius: 4px;cursor: pointer;margin-left:39.4%">Save</button>

            </div>
        </form>

    </div>
</div>
</div>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

<script>
    /*$(document).ready(function(){
        $('#protocol').on('change', function() {
            if ( this.value == 'udp')
            //.....................^.......
            {
                $("#udp1").show();
            }
            else
            {
                $("#udp1").hide();
            }
        });
    });*/
    $(document).ready(function() {
        $('#protocol').on('change', function() {
            $("#protocol option[value='0']").hide();
            if($(this).val() == 'udp')
            {$("#udp1").show();


            }
    else
        $("#udp1").hide();
        }).trigger('change');
    });
    $(document).ready(function() {
        $('#protocol').on('change', function() {
            if($(this).val() == 'rtmp')
            {$("#rtmp1").show();}
            else
                $("#rtmp1").hide();
        }).trigger('change');
    });
    $(document).ready(function() {
        $('#protocol').on('change', function() {
            if($(this).val() == 'rtsp')
            {$("#rtsp1").show();}
            else
                $("#rtsp1").hide();
        }).trigger('change');
    });


</script>


@endsection
