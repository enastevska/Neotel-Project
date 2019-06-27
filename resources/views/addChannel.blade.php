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
                    <form method="POST" action="/home">
                        @csrf
                        <h1>Input options</h1>
                        <br>
                        <div class="channelInput">

                            Channel input  <select name="interfaces" id="interface" style=" font-size: 13px;padding: 5px; background: #fff;border: 1px solid #ccc; border-radius: 6px;overflow: hidden;position: relative;width:30%; margin-left:7%">
                                <option id="0" value="0">Select ...</option>
                                <option value="Capture Card" name="captureCard" >Capture Card</option>
                                <option value="Webcamera" name="WebCamera" >Webcamera</option>
                                <option value="URL" name="Url">URL</option>
                            </select>
                        </div>
                        <br>
                        <div class="channelName">
                            Channel name <input type="text" name="channelName" required  style=" font-size: 13px;padding: 5px; background: #fff;border: 1px solid #ccc; border-radius: 6px;overflow: hidden;position: relative;width:30%; margin-left:6.3%">
                        </div>
                        <br/>

                        <div id="urlName">
                            URL <input type="text" name="urlName" style=" font-size: 13px;padding: 5px; background: #fff;border: 1px solid #ccc; border-radius: 6px;overflow: hidden;position: relative;width:30%; margin-left:15.3%">
                        </div>

                        <br/>

                        <div id="captureCardsShow" style="display: none">
                            Capture Cards <select name="captureCards" style=" font-size: 13px;padding: 5px; background: #fff;border: 1px solid #ccc; border-radius: 6px;overflow: hidden;position: relative;width:30%; margin-left:6.3%">
                                <option id="0" value="0">Select ...</option>
                                <?php $file = fopen(storage_path("CaptureCard"), "r");
                                while(!feof($file)) {
                                $line = fgets($file);
                                if(strcmp(trim($line),'')!=0){
                                ?>
                                <option><?php  echo $line; ?></option>
                                <?php
                                }}

                                fclose($file);
                                ?>
                            </select>
                        </div>
                        <br>

                        <div id="captureCardsFormats" style="display: none">
                            Capture Cards Formats <select name="cardFormats" style=" font-size: 13px;padding: 5px; background: #fff;border: 1px solid #ccc; border-radius: 6px;overflow: hidden;position: relative;width:30%; margin-left:3.3%">
                                <option id="0" value="0">Select ...</option>
                                <?php $file = fopen(storage_path("CaptureCardFormat"), "r");
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

                        <br>
                        <div id="videoInput" style="display: none">
                            Video Input <select name="videoInput" style=" font-size: 13px;padding: 5px; background: #fff;border: 1px solid #ccc; border-radius: 6px;overflow: hidden;position: relative;width:30%; margin-left:9.4%">
                                <option id="0" value="0">Select ...</option>
                                <option name="sdi" value="sdi">Sdi</option>
                                <option name="hdmi" value="hdmi">Hdmi</option>
                            </select>


                        </div>

                        <br>

                        <button type="submit" style="width: 10%;background-color: #4CAF50;color: white;padding: 10px;border: none;border-radius: 4px;cursor: pointer;margin-left:39.4%">Save</button>
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
                {$("#videoInput").show();

                }
                else
                    $("#videoInput").hide();
            }).trigger('change');
        });


        $(document).ready(function() {
            $('#interface').on('change', function() {

                $("#interface option[value='0']").hide();
                if($(this).val() == 'URL')
                {$("#urlName").show();

                }
                else
                    $("#urlName").hide();
            }).trigger('change');
        });



    </script>

@endsection
