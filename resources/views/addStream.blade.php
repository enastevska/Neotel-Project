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
                    <?php
                    $url = url()->current();
                    $urlParts = explode("/", $url);
                    ?>
                    <form method="POST" action="/home/channel/{{$urlParts[5]}}">
                        @csrf

                        <h1>Output options</h1>
                        <br>
                        <ul>
                            Stream name : <input  type="text" name="nameStream" style=" font-size: 13px;padding: 5px; background: #fff;border: 1px solid #ccc; border-radius: 6px;overflow: hidden;position: relative;width:30%; margin-left:6.3%">
                            <br>
                            <h3>Video</h3>

                            <uL>
                                <div>
                                    <li>
                                        Video PID <input type="checkbox" name="video_pid" style=" font-size: 13px;padding: 5px; background: #fff;border: 1px solid #ccc; border-radius: 6px;overflow: hidden;position: relative;width:30%; margin-left:6%">
                                    </li>
                                </div>
                                <br>
                                <div>
                                    <li> Video codec :
                                        <select name="vc" style=" font-size: 13px;padding: 5px; background: #fff;border: 1px solid #ccc; border-radius: 6px;overflow: hidden;position: relative;width:30%; margin-left:6.9%">
                                            <option value="h264" name="h264" selected>h264</option>
                                            <option value="MPEG-2" name="MPEG-2">MPEG-2</option>
                                            <option value="MPEG-5" name="MPEG-4">MPEG-4</option>
                                            <option value="HEVC" name="HEVC">HEVC</option>
                                        </select>
                                    </li>
                                </div>
                                <br>
                                <div>
                                    <li>
                                        Video Bitrate : <input value="3000" type="text" name="videobitrate" style=" font-size: 13px;padding: 5px; background: #fff;border: 1px solid #ccc; border-radius: 6px;overflow: hidden;position: relative;width:30%; margin-left:6.3%">  kbps
                                    </li>
                                </div>
                                <br>
                                <div>
                                    <li> Codec Profile :
                                        <select name="cp" style=" font-size: 13px;padding: 5px; background: #fff;border: 1px solid #ccc; border-radius: 6px;overflow: hidden;position: relative;width:30%; margin-left:5.4%">
                                            <option value="Baseline" name="Baseline" selected>Baseline</option>
                                            <option value="Main" name="Main">Main</option>
                                            <option value="High" name="High">High</option>
                                        </select>
                                    </li>
                                </div>
                                <br>
                                <div>
                                    <li> Codec Speed :
                                        <select name="cs" style=" font-size: 13px;padding: 5px; background: #fff;border: 1px solid #ccc; border-radius: 6px;overflow: hidden;position: relative;width:30%; margin-left:5.2%">
                                            <option value="veryslow" name="veryslow" selected>veryslow</option>
                                            <option value="slower" name="slower">slower</option>
                                            <option value="slow" name="slow">slow</option>
                                            <option value="medium" name="medium">medium</option>
                                            <option value="fast" name="fast">fast</option>
                                            <option value="faster" name="faster">faster</option>
                                            <option value="very fast" name="very fast">very fast</option>
                                            <option value="superfast" name="superfast">superfast</option>
                                            <option value="ultrafast" name="ultrafast">ultrafast</option>
                                        </select>
                                    </li>
                                </div>
                                <br>
                                <div>
                                    <li> Frame rate :

                                        <select name="fr" style=" font-size: 13px;padding: 5px; background: #fff;border: 1px solid #ccc; border-radius: 6px;overflow: hidden;position: relative;width:30%; margin-left:7.7%">
                                            <option value="1" name="1" selected>1 </option>
                                            <option value="2" name="2">2 </option>
                                            <option value="4" name="4">4 </option>
                                            <option value="5" name="5">5 </option>
                                            <option value="6" name="6">6 </option>
                                            <option value="8" name="8">8 </option>
                                            <option value="10" name="10">10 </option>
                                            <option value="12" name="12">12 </option>
                                            <option value="15" name="15">15 </option>
                                            <option value="23.98" name="23.98">23.98 </option>
                                            <option value="23.976" name="23.976">23.976 </option>
                                            <option value="24" name="24">24 </option>
                                            <option value="25" name="25">25 </option>
                                            <option value="29.97" name="29.97">29.97 </option>
                                            <option value="30" name="30">30 </option>
                                            <option value="50" name="50">50 </option>
                                            <option value="59.94" name="59.94">59.94 </option>
                                            <option value="60" name="60">60</option>
                                        </select> fps
                                    </li>
                                </div>
                                <br>
                                <div>
                                    <li> Resolution
                                        <br>
                                        <div>
                                            Height : <input type="text" name="height" value="720" style=" font-size: 13px;padding: 5px; background: #fff;border: 1px solid #ccc; border-radius: 6px;overflow: hidden;position: relative;width:30%; margin-left:12%">
                                        </div>
                                        <br>
                                        Width :  <input type="text" name="width" value="576" style=" font-size: 13px;padding: 5px; background: #fff;border: 1px solid #ccc; border-radius: 6px;overflow: hidden;position: relative;width:30%; margin-left:12.7%">
                                    </li>
                                </div>
                                <br>
                                <div>
                                    <li>
                                        Keyframe : <input required type="text" name="keyframe" style=" font-size: 13px;padding: 5px; background: #fff;border: 1px solid #ccc; border-radius: 6px;overflow: hidden;position: relative;width:30%; margin-left:8.9%">
                                    </li>
                                </div>
                                <br>
                                <div>
                                    <li>
                                        Number of B frames : <input value="{{$stream1->numberBFrames}}" type="number" name="bFrames" style=" font-size: 13px;padding: 5px; background: #fff;border: 1px solid #ccc; border-radius: 6px;overflow: hidden;position: relative;width:30%; margin-left:2.9%">
                                    </li>
                                </div>
                                <br>
                                <div>
                                    @if($stream1->cabac == "on")
                                        <li>
                                            Cabac <input id="cabac" type="checkbox" name="cabac" style=" font-size: 13px;padding: 5px; background: #fff;border: 1px solid #ccc; border-radius: 6px;overflow: hidden;position: relative;width:30%; margin-left:10.1%"checked>
                                        </li>
                                    @else
                                        <li>
                                            Cabac <input id="cabac" type="checkbox" name="cabac" style=" font-size: 13px;padding: 5px; background: #fff;border: 1px solid #ccc; border-radius: 6px;overflow: hidden;position: relative;width:30%; margin-left:10.1%">
                                        </li>
                                    @endif

                                </div>
                                <br>
                                <div>
                                    @if($stream1->cbr == "on")
                                        <li>
                                            CBR <input id="cbr" type="checkbox" name="cbr" style=" font-size: 13px;padding: 5px; background: #fff;border: 1px solid #ccc; border-radius: 6px;overflow: hidden;position: relative;width:30%; margin-left:11.9%" checked>
                                        </li>
                                    @else
                                        <li>
                                            CBR <input id="cbr" type="checkbox" name="cbr" style=" font-size: 13px;padding: 5px; background: #fff;border: 1px solid #ccc; border-radius: 6px;overflow: hidden;position: relative;width:30%; margin-left:11.9%">
                                        </li>
                                    @endif

                                </div>
                                <br>
                                <div>
                                    @if($stream1->scenecut == "on")
                                        <li>
                                            Scenecut <input id="scenecut" type="checkbox" name="scenecut" style=" font-size: 13px;padding: 5px; background: #fff;border: 1px solid #ccc; border-radius: 6px;overflow: hidden;position: relative;width:30%; margin-left:7.1%" checked>
                                        </li>
                                    @else
                                        <li>
                                            Scenecut <input id="scenecut" type="checkbox" name="scenecut" style=" font-size: 13px;padding: 5px; background: #fff;border: 1px solid #ccc; border-radius: 6px;overflow: hidden;position: relative;width:30%; margin-left:7.1%">
                                        </li>
                                    @endif

                                </div>
                                <br>
                                <div>
                                    @if($stream1->deinterlace == "on")
                                        <li>
                                            Deinterlace <input id="deinterlace" type="checkbox" name="deinterlace" style=" font-size: 13px;padding: 5px; background: #fff;border: 1px solid #ccc; border-radius: 6px;overflow: hidden;position: relative;width:30%; margin-left:5.1%" checked>
                                        </li>
                                    @else
                                        <li>
                                            Deinterlace <input id="deinterlace" type="checkbox" name="deinterlace" style=" font-size: 13px;padding: 5px; background: #fff;border: 1px solid #ccc; border-radius: 6px;overflow: hidden;position: relative;width:30%; margin-left:5.1%">
                                        </li>
                                    @endif
                                </div>
                                <br>


                                <div id="mode" style="display: none">
                                    Mode <select name="mode" style=" font-size: 13px;padding: 5px; background: #fff;border: 1px solid #ccc; border-radius: 6px;overflow: hidden;position: relative;width:30%; margin-left:9.4%">
                                        <option id="0" value="00">{{$stream1->mode}}</option>
                                        <option name="send_frame" value="0">send_frame</option>
                                        <option name="send_field" value="1">send_field</option>
                                        <option name="send_frame_nospatial" value="2">send_frame_nospatial</option>
                                        <option name="send_field_nospatial" value="3">send_field_nospatial</option>
                                    </select>
                                </div>
                                <br>

                                <div id="parity" style="display: none">
                                    Parity <select name="parity" style=" font-size: 13px;padding: 5px; background: #fff;border: 1px solid #ccc; border-radius: 6px;overflow: hidden;position: relative;width:30%; margin-left:9.4%">
                                        <option id="0" value="00">{{$stream1->parity}}</option>
                                        <option name="tff" value="0">tff</option>
                                        <option name="bff" value="1">bff</option>
                                        <option name="auto" value="-1">auto</option>
                                    </select>
                                </div>

                                <br>
                                <div id="deint" style="display: none">
                                    Deint <select name="deint" style=" font-size: 13px;padding: 5px; background: #fff;border: 1px solid #ccc; border-radius: 6px;overflow: hidden;position: relative;width:30%; margin-left:9.4%">
                                        <option id="0" value="00">{{$stream1->deint}}</option>
                                        <option name="all" value="0">all</option>
                                        <option name="interlaced" value="1">interlaced</option>
                                    </select>
                                </div>
                                <br>

                                <br>
                            </uL>
                            <h3>Audio</h3>
                            <UL>
                                <div>
                                    <li>
                                        Audio PID <input type="checkbox"  name="audio_pid" style=" font-size: 13px;padding: 5px; background: #fff;border: 1px solid #ccc; border-radius: 6px;overflow: hidden;position: relative;width:30%; margin-left:6.3%">
                                    </li>
                                </div>
                                <br>
                                <div>
                                    <li> Audio codec :
                                        <select name="ac" style=" font-size: 13px;padding: 5px; background: #fff;border: 1px solid #ccc; border-radius: 6px;overflow: hidden;position: relative;width:30%; margin-left:7%">
                                            <option value="MPEG1/L2" name="MPEG1/L2" selected>MPEG1/L2</option>
                                            <option value="AAC" name="AAC">AAC</option>
                                            <option value="MP3" name="MP3">MP3</option>
                                        </select>
                                    </li>
                                </div>
                                <br>
                                <div>
                                    <li> Sample rate :

                                        <select name="sr" style=" font-size: 13px;padding: 5px; background: #fff;border: 1px solid #ccc; border-radius: 6px;overflow: hidden;position: relative;width:30%; margin-left:7%">
                                            <option value="8000" name="8000" selected>8000</option>
                                            <option value="11025" name="11025">11025</option>
                                            <option value="16000" name="16000">16000</option>
                                            <option value="22050" name="22050">22050</option>
                                            <option value="24000" name="24000">24000</option>
                                            <option value="32000" name="32000">32000</option>
                                            <option value="44100" name="44100">44100</option>
                                            <option value="48000" name="48000">48000</option>
                                            <option value="96000" name="96000">96000</option>


                                        </select>
                                    </li>
                                </div>
                                <br>
                                <li>
                                    Audio Bitrate : <input value="128" type="text" name="audiobitrate" style=" font-size: 13px;padding: 5px; background: #fff;border: 1px solid #ccc; border-radius: 6px;overflow: hidden;position: relative;width:30%; margin-left:6.3%">  kbps
                                </li>
                            </UL>
                            <br>
                            <h3>Subtitles</h3>
                            <uL>
                                <div>
                                    <li>
                                        Subtitle PID : <input type="checkbox"  name="subtitle_pid" style=" font-size: 13px;padding: 5px; background: #fff;border: 1px solid #ccc; border-radius: 6px;overflow: hidden;position: relative;width:30%; margin-left:6.3%">
                                    </li>
                                </div>
                                <br>
                                <li>
                                    Subtitle method : <select name="sm" style=" font-size: 13px;padding: 5px; background: #fff;border: 1px solid #ccc; border-radius: 6px;overflow: hidden;position: relative;width:30%; margin-left:4.6%">
                                        <option value="burn" name="burn" selected>Burn</option>
                                        <option value="pass" name="pass">Pass</option>
                                    </select>
                                </li>
                            </ul>
                        </ul>
                        <br>
                    <!--<select>
                    <?php /*$file = fopen(storage_path("text.txt"), "r");
                    while(!feof($file)) {
                        ?><option><?php echo fgets($file); ?></option><?php
                    }

                    fclose($file);
                    */?>
                        </select>-->
                        <button type="submit" style="width: 10%;background-color: #4CAF50;color: white;padding: 10px;border: none;border-radius: 4px;cursor: pointer;margin-left:47.1%">Save</button>
                    </form>
                </div>
            </div>

        </div>
    </div>

@endsection
