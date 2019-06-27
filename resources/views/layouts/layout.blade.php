<head>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<div ID = "Wrapper" style="margin-top:84px">
    <div class="w3-sidebar w3-bar-block w3-card" style="width:15%;margin-left: 20%;background-color:white;margin-top: -22.5px">
        <div class="dropdown">
            <a href="#" class="w3-bar-item w3-button" onclick="myFunction() " style="text-decoration: none"><img id="slika" src="/img/43.png"  width="15px" height="15px" style="margin-top: -5px; ">Channels</a>
            <div id="myDIV">
                </a>
                @foreach($channels as $channel)
                    <a onclick="myFunction1()" class="w3-bar-item w3-button"  style="padding-left: 20%" href="/home/channel/{{$channel->id}}/edit">
                        <img id="slika1" src="/img/43.png"  width="15px" height="15px" style="margin-top: -5px">{{$channel->title}} </a>

                    @foreach($channel->stream as $stream)

                        <ul style="list-style: none">
                            <ul style="padding-left: 30%"><a  href="/home/stream/{{$stream->id}}/edit" style="text-decoration: none;margin-left:-18% ">{{$stream->name}}</a></input>
                                <ul><a  href="/home/channel/stream/{{$stream->id}}" style="text-decoration: none;margin-left: -34%">Destionation Options</a></ul>
                            </ul>

                        </ul>
                    @endforeach
                    <ul><a  href="/home/channel/{{$channel->id}}/addStream" style="text-decoration: none;padding-left: 13%">Add Stream</a></ul>
                @endforeach

                <div id="myDIV1">

                </div>
                </ul>
                <a  href="/home/channel" class="w3-bar-item w3-button" style="padding-left: 20%;text-decoration: none" >Add Channel</a>
            </div>
        </div>
        <a href="#" class="w3-bar-item w3-button" style="text-decoration: none">Device</a>
        <a href="#" class="w3-bar-item w3-button" style="text-decoration: none">Monitoring</a>
        <a href="#" class="w3-bar-item w3-button" style="text-decoration: none">Alarms</a>


    </div>
</div>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script>


    function myFunction() {
        var x = document.getElementById("myDIV");
        var y = document.getElementById("slika");
        if (x.style.display === "none") {
            x.style.display = "block";
            y.style.display='none';


        } else {
            x.style.display = "none"; y.style.display="inline";


        }
    }
    function myFunction1() {
        var x = document.getElementById("myDIV1");
        var y = document.getElementById("slika1");
        if (x.style.display === "none") {
            x.style.display = "block";
            y.style.display='none';
        } else {
            x.style.display = "none";
            y.style.display="inline";
        }
    }
    var e = document.getElementById("interface");
    var strUser = e.options[e.selectedIndex].value;

</script>
