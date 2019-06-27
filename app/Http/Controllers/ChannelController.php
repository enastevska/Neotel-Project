<?php

namespace App\Http\Controllers;
use App\Channel;
use App\Stream1;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ChannelController extends Controller
{
    public function addChannel()
    {
        $channels = Channel::all();
        return view('addChannel', compact('channels'));

    }



    public function store()
    {
        $channel = new Channel();
        $channel->title = request('channelName');
        $channel->channelInput = request('interfaces');
        $channel->urlName = request('urlName');
        $channel->captureCard=request('captureCards');
        $channel->captureCardFormat = request('cardFormats');
        $channel->videoInput = request('videoInput');
        if($channel->urlName == null)
            $channel->urlName ="";


        $channel->save();

        //Channel::create(['title'=>request('channelName')]);

        return redirect('/home');
    }

    public function edit(int $id)
    {
        $channel = Channel::find($id);
        $channels = Channel::all();

        $link = "ffmpeg ";


        if($channel->channelInput == "Capture Card")

        {
            $link = $link  . "-format_code " . $channel->captureCardFormat . " -f decklink " . "-video_input " . $channel->videoInput;

        }

        if($channel->channelInput == "Webcamera")
        {
            $link = $link . "-f video4linux2 ";
        }

        $link = $link . "-re " . "-rtbufsize 1073741824 " ."-i ";

        if($channel->channelInput == "Capture Card")
        {
            $link = $link ."'" .$channel->captureCard ."'";

        }
        if($channel->channelInput == "URL")
        {
            $link = $link . $channel->urlName;
        }

        if($channel->channelInput == "Webcamera")
        {
            $link = $link . "/dev/video0";
        }

        $streams = DB::table('stream1s')->where('channel_id','=', $channel->id)->get();

        foreach( $streams as $stream1)
        {

            $protocols = DB::table('protocols')->where('stream_id','=', $stream1->id)->get();
            $product = $stream1->frame_rate * $stream1->keyframe;
            $bufsize = $stream1->video_bitrate * 2;
            $link = $link . " -s " . $stream1->width ."x" . $stream1->height . " -r " . (int)$stream1->frame_rate ." -g " . $product . " -bf 3 " . "-keyint_min " . $product . " -sc_threshold 0 " ."-c:a " . $stream1->audio_codec ." -b:a " . $stream1->audio_bitrate ." -strict -2 " . "-ar " . $stream1->sample_rate  . " -vcodec " . $stream1->video_codec . " -preset " . $stream1->codec_speed ." -b:v " . $stream1->video_bitrate ."k " . "-maxrate ". $stream1->video_bitrate ."k " . "-bufsize:v " .$bufsize ."k";
            if($stream1->deinterlace ==  "on")
            {
                $link = $link . " -vf yadif=" . $stream1->mode . ":" . $stream1->parity . ":" .$stream1->deint;
            }

            $link = $link . " -pix_fmt yuv420p " ."-profile:v " . $stream1->codec_profile ." -rc cbr_hq -rc-lookahead 10 -no-scenecut " ;

            if($stream1->scenecut =="on")
            {
                $link = $link . "1";
            }

            else
            {
                $link = $link . "0";
            }

            $link = $link . " -b_adapt " . $stream1->numberBFrames;

            if($stream1->cabac == "on")
            {
                $link = $link . " -coder cabac";
            }

            $link = $link . " -2pass 1 ";

            if($stream1->cbr == "on")
            {
                $link = $link . "-cbr 1 ";
            }
            else {
                $link = $link . "-cbr 0 ";
            }

            $link = $link . "-temporal-aq 1 ";

            foreach ($protocols as $protocol)
            {

                if($protocol->name_protocol == "rtmp")
                {
                    $link = $link . "-f flv rtmp://" . $protocol->ip_address . ":" . $protocol->port ."/" . $protocol->publishing_point ."/" .$stream1->name;
                }

                else if($protocol->name_protocol == "udp")
                {
                    $link = $link . "-f mpegts udp://" . $protocol->ip_address . ":". $protocol->port;
                }
                else
                {
                    $link = $link . "-f rtsp rtsp://". $protocol->ip_address . ":" . $protocol->port ."/" . $protocol->publishing_point ."/" .$stream1->name;
                }
            }
        }

        return View('channel',compact('channels'))->with('channel',$channel)->with('link',$link);
    }

    public function update(int $id)
    {
        $channel = Channel::find($id);

        $channel->title = request('channelName');
        $channel->channelInput = request('interfaces');
        $channel->captureCard=request('captureCards');
        $channel->urlName = request('urlName');
        $channel->captureCardFormat = request('cardFormats');
        $channel->videoInput = request('videoInput');

        if($channel->urlName == null)
            $channel->urlName ="";

        $channel->save();

        return redirect('/home');
    }



  /*  public function showLink(Channel $channel)
    {
        $channels = Channel::all();
        $link = "ffmpeg ";


        if($channel->channelInput == "Capture Card")

        {
            $link = $link  . "-format_code " . $channel->captureCardFormat . " -f decklink " . "-video_input " . $channel->videoInput;

        }

        if($channel->channelInput == "Webcamera")
        {
            $link = $link . "-f video4linux2 ";
        }

        $link = $link . "-re " . "-rtbufsize 1073741824 " ."-i ";

        if($channel->channelInput == "Capture Card")
        {
            $link = $link ."'" .$channel->captureCard ."'";

        }
        if($channel->channelInput == "URL")
        {
            $link = $link . $channel->urlName;
        }

        if($channel->channelInput == "Webcamera")
        {
            $link = $link . "/dev/video0";
        }

        $streams = DB::table('stream1s')->where('channel_id','=', $channel->id)->get();

        foreach( $streams as $stream1)
        {

            $protocols = DB::table('protocols')->where('stream_id','=', $stream1->id)->get();
            $product = $stream1->frame_rate * $stream1->keyframe;
            $bufsize = $stream1->video_bitrate * 2;
            $link = $link . " -s " . $stream1->width ."x" . $stream1->height . " -r " . (int)$stream1->frame_rate ." -g " . $product . " -bf 3 " . "-keyint_min " . $product . " -sc_threshold 0 " ."-c:a " . $stream1->audio_codec ." -b:a " . $stream1->audio_bitrate ." -strict -2 " . "-ar " . $stream1->sample_rate  . " -vcodec " . $stream1->video_codec . " -preset " . $stream1->codec_speed ." -b:v " . $stream1->video_bitrate ."k " . "-maxrate ". $stream1->video_bitrate ."k " . "-bufsize:v " .$bufsize ."k";
            if($stream1->deinterlace ==  "on")
            {
                $link = $link . " -vf yadif=" . $stream1->mode . ":" . $stream1->parity . ":" .$stream1->deint;
            }

            $link = $link . " -pix_fmt yuv420p " ."-profile:v " . $stream1->codec_profile ." -rc cbr_hq -rc-lookahead 10 -no-scenecut " ;

            if($stream1->scenecut =="on")
            {
                $link = $link . "1";
            }

            else
            {
                $link = $link . "0";
            }

            $link = $link . " -b_adapt " . $stream1->numberBFrames;

            if($stream1->cabac == "on")
            {
                $link = $link . " -coder cabac";
            }

            $link = $link . " -2pass 1 ";

            if($stream1->cbr == "on")
            {
                $link = $link . "-cbr 1 ";
            }
            else {
                $link = $link . "-cbr 0 ";
            }

            $link = $link . "-temporal-aq 1 ";

            foreach ($protocols as $protocol)
            {

               if($protocol->name_protocol == "rtmp")
               {
                   $link = $link . "-f flv rtmp://" . $protocol->ip_address . ":" . $protocol->port ."/" . $protocol->publishing_point ."/" .$stream1->name;
               }

               else if($protocol->name_protocol == "udp")
               {
                   $link = $link . "-f mpegts udp://" . $protocol->ip_address . ":". $protocol->port;
               }
               else
               {
                   $link = $link . "-f rtsp rtsp://". $protocol->ip_address . ":" . $protocol->port ."/" . $protocol->publishing_point ."/" .$stream1->name;
               }
            }
        }
        return View('showLink',compact('channels'))->with("link",$link);



    }*/
}
