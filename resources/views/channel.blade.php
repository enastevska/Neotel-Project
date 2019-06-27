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
                <div>
                    <form action="" method="get">
                        <div><button type="submit" name="start" value="start" ><img src="/img/start1.png" width="20px" height="20px"> </button>


                        <button type="submit" name="stop" value="stop" > <img src="/img/stop.png" width="20px" height="20px"> </button></div>
                    </form>


                    <?php
                    if (isset($_GET['start'])) {
                        shell_exec("$link >/dev/null 2>&1 &");
                        #</dev/null >/dev/null 2>/var/log/ffmpeg.log &
                        #2> /tmp/ffmpeg_error$$.log
                    }

                    if (isset($_GET['stop'])) {
                        shell_exec("./scriptStop.sh");
                    }
                    ?>
                </div>
               <form method="POST" action="/home/channel/{{$channel->id}}">
                   {{method_field('PATCH')}}
                   @csrf

                   <h1>Input options</h1>
                   <br>
                   <div class="channelInput">

                       Channel input  <select name="interfaces" id="interface" style=" font-size: 13px;padding: 5px; background: #fff;border: 1px solid #ccc; border-radius: 6px;overflow: hidden;position: relative;width:30%; margin-left:7%">
                           <option id="0" value="0">{{$channel->channelInput}}</option>
                           <option value="Capture Card" name="captureCard" >Capture Card</option>
                           <option value="Webcamera" name="WebCamera" >Webcamera</option>
                           <option value="URL" name="Url">URL</option>
                       </select>
                   </div>
                   <br>
                    <div class="channelName">
                   Channel name <input type="text" name="channelName" required  style=" font-size: 13px;padding: 5px; background: #fff;border: 1px solid #ccc; border-radius: 6px;overflow: hidden;position: relative;width:30%; margin-left:6.3%" value="{{$channel->title}}">
                    </div>
                    <br/>

                   <br/>
                   <div id="urlName">
                       @if($channel->channelInput != "Webcamera")
                           URL <input type="text" name="urlName" style=" font-size: 13px;padding: 5px; background: #fff;border: 1px solid #ccc; border-radius: 6px;overflow: hidden;position: relative;width:30%; margin-left:15.3%" value="{{$channel->urlName}}">
                           @endif
                   </div>

    @if($channel->channelInput == "Capture Card")

                   <div id="captureCardsShow" style="display: none">
                       Capture Cards <select name="captureCards" style=" font-size: 13px;padding: 5px; background: #fff;border: 1px solid #ccc; border-radius: 6px;overflow: hidden;position: relative;width:30%; margin-left:6.3%">
                           <option id="0" value="SelectCaptureCard">{{$channel->captureCard}}</option>
                           <?php $file = fopen(storage_path("CaptureCard"), "r");
                           while(!feof($file)) {
                           $line = fgets($file);
                           if(strcmp(trim($line),'')!=0){
                           ?>
                           <option><?php echo $line; ?></option>
                               <?php
                           }}

                           fclose($file);
                           ?>
                       </select>
                   </div>
                   @endif
                   @if($channel->channelInput != "Capture Card")
                       <div id="captureCardsShow" style="display: none">
                           Capture Cards <select name="captureCards" style=" font-size: 13px;padding: 5px; background: #fff;border: 1px solid #ccc; border-radius: 6px;overflow: hidden;position: relative;width:30%; margin-left:6.3%">
                               <option id="0" value="0">Select ...</option>
                               <?php $file = fopen(storage_path("CaptureCard"), "r");
                               while(!feof($file)) {
                               $line = fgets($file);
                               if(strcmp(trim($line),'')!=0){
                               ?>
                               <option><?php echo $line; ?></option>
                               <?php
                               }}

                               fclose($file);
                               ?>
                           </select>
                       </div>
                   @endif
                   <br>
                   @if($channel->channelInput == "Capture Card")
                   <div id="captureCardsFormats" style="display: none">
                       Capture Cards Formats <select name="cardFormats" style=" font-size: 13px;padding: 5px; background: #fff;border: 1px solid #ccc; border-radius: 6px;overflow: hidden;position: relative;width:30%; margin-left:3.3%">
                           <option id="0" value="0">{{$channel->captureCardFormat}}</option>
                           <?php $file = fopen(storage_path("CaptureCardFormat"), "r");
                           while(!feof($file)) {
                           $line = fgets($file);
                           if(strcmp(trim($line),'')!=0)
                               {
                           ?>

                           <option><?php echo $line; ?></option>
                           <?php
                           }
                           }
                           fclose($file);
                           ?>
                       </select>
                   </div>
                   <br>
                       <div id="videoInput" style="display: none">
                           Video Input <select name="videoInput" style=" font-size: 13px;padding: 5px; background: #fff;border: 1px solid #ccc; border-radius: 6px;overflow: hidden;position: relative;width:30%; margin-left:9.4%">
                               <option id="0" value="0">{{$channel->videoInput}}</option>
                               <option name="sdi" value="sdi">Sdi</option>
                               <option name="hdmi" value="hdmi">Hdmi</option>
                           </select>


                       </div>
                   @endif
                   @if($channel->channelInput != "Capture Card")
                       <div id="captureCardsFormats" style="display: none">
                           Capture Cards Formats <select name="cardFormats" style=" font-size: 13px;padding: 5px; background: #fff;border: 1px solid #ccc; border-radius: 6px;overflow: hidden;position: relative;width:30%; margin-left:3.3%">
                               <option id="0" value="0">Select...</option>
                               <?php $file = fopen(storage_path("CaptureCardFormat"), "r");
                               while(!feof($file)) {
                               $line = fgets($file);
                               if(strcmp(trim($line),'')!=0)
                               {
                               ?>

                               <option><?php echo $line; ?></option>
                               <?php
                               }
                               }
                               fclose($file);
                               ?>
                           </select>
                       </div>
                       <br>
                       <div id="videoInput" style="display: none">
                           Video Input <select name="videoInput" style=" font-size: 13px;padding: 5px; background: #fff;border: 1px solid #ccc; border-radius: 6px;overflow: hidden;position: relative;width:30%; margin-left:9.4%">
                               <option id="0" value="0">Select ...</option>
                               <option name="sdi" value="sdi">Sdi</option>
                               <option name="hdmi" value="hdmi">Hdmi</option>
                           </select>


                       </div>
                   @endif


                   <br>



                   <br>

                   <button type="submit" style="width: 10%;background-color: #4CAF50;color: white;padding: 10px;border: none;border-radius: 4px;cursor: pointer;margin-left:39.4%">Edit</button>
               </form>

            </div>

        </div>
    </div>
    </div>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#interface').on('change', function() {

            $("#interface option[value='0']").hide();
            $("#captureCardsShow option[value='0']").hide();
            if($(this).val() == 'Capture Card')
            {$("#captureCardsShow").show();

            }
            else
                $("#captureCardsShow").hide();
        }).trigger('change');
    });

    $(document).ready(function() {
        $('#interface').on('change', function() {

            $("#interface option[value='0']").hide();
            $("#captureCardsFormats option[value='0']").hide();
            if($(this).val() == 'Capture Card')
            {$("#captureCardsFormats").show();

            }
            else
                $("#captureCardsFormats").hide();
        }).trigger('change');
    });


    $(document).ready(function() {
        $('#interface').on('change', function() {

            $("#interface option[value='0']").hide();
            $("#videoInput option[value='0']").hide();

            if($(this).val() == 'Capture Card')
            {
                $("#videoInput").show();

            }
            else
                $("#videoInput").hide();
        }).trigger('change');
    });

    $(document).ready(function() {
        $('#interface').on('change', function() {

            $("#interface option[value='0']").hide();
            if($(this).val() == 'URL')
            {
                $("#urlName").show();

            }
            else
                $("#urlName").hide();
        }).trigger('change');
    });

</script>


@endsection
