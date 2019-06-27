<?php

namespace App\Http\Controllers;
use App\Stream1;
Use Illuminate\Support\Facades\DB;
use App\Channel;
use Illuminate\Http\Request;

class Stream1Controller extends Controller
{
    /*public function  outputOptions(int $id)
    {
        dd($id);
        $channels = Channel::all();
        $channel = DB::table('channels')->where('id', $id);
        $pid=$channel->id;
        dd($pid);
        return view('outputOptions', compact('channels'))->with('pid',$pid);
    }*/

    public function  outputOptions()
    {

        $channels = Channel::all();

        return view('addOutputOptions', compact('channels'));
    }

    public function edit(int $id)
    {
        $stream1 = Stream1::find($id);
        $channels = Channel::all();
        return View('outputOptions',compact('channels'))->with('stream1',$stream1);
    }

    public function update(int $id)
    {
        $newStream = Stream1::find($id);

        $newStream->name = request('nameStream');
        $newStream->video_pid = request('video_pid');
        $newStream->video_codec = request('vc');
        $newStream->video_bitrate = request('videobitrate');
        $newStream->codec_profile = request('cp');
        $newStream->codec_speed = request('cs');
        $newStream->frame_rate = request('fr');
        $newStream->height = request('height');
        $newStream->width = request('width');
        $newStream->keyframe = request('keyframe');
        $newStream->audio_pid = request('audio_pid');
        $newStream->audio_codec = request('ac');
        $newStream->sample_rate = request('sr');
        $newStream->audio_bitrate = request('audiobitrate');
        $newStream->subtitle_pid = request('subtitle_pid');
        $newStream->subtitle_method = request('sm');
        $newStream->cabac = request('cabac');
        $newStream->scenecut = request('scenecut');
        $newStream->cbr = request('cbr');
        $newStream->deinterlace = request('deinterlace');
        $newStream->numberBFrames = request('bFrames');
        $newStream->mode = request('mode');
        $newStream->parity = request('parity');
        $newStream->deint = request('deint');

        if($newStream->cabac == null)
            $newStream->cabac="off";
        if($newStream->scenecut == null)
            $newStream->scenecut="off";
        if($newStream->cbr == null)
            $newStream->cbr="off";
        if($newStream->deinterlace == null)
            $newStream->deinterlace="off";
        if($newStream->audio_pid == null)
            $newStream->audio_pid="off";
        if($newStream->video_pid == null)
            $newStream->video_pid="off";
        if($newStream->subtitle_pid == null)
            $newStream->subtitle_pid="off";

        dd($newStream);
        $newStream->save();

        return redirect('/home');
    }


    public function storeStream(Channel $channel)
    {

        $newStream = new Stream1();
        $newStream->name = request('nameStream');
        $newStream->channel_id = $channel->id;
        $newStream->video_pid = request('video_pid');
        $newStream->video_codec = request('vc');
        $newStream->video_bitrate = request('videobitrate');
        $newStream->codec_profile = request('cp');
        $newStream->codec_speed = request('cs');
        $newStream->frame_rate = request('fr');
        $newStream->height = request('height');
        $newStream->width = request('width');
        $newStream->keyframe = request('keyframe');
        $newStream->audio_pid = request('audio_pid');
        $newStream->audio_codec = request('ac');
        $newStream->sample_rate = request('sr');
        $newStream->audio_bitrate = request('audiobitrate');
        $newStream->subtitle_pid = request('subtitle_pid');
        $newStream->subtitle_method = request('sm');
        $newStream->cabac = request('cabac');
        $newStream->scenecut = request('scenecut');
        $newStream->cbr = request('cbr');
        $newStream->deinterlace = request('deinterlace');
        $newStream->numberBFrames = request('bFrames');
        $newStream->mode = request('mode');
        $newStream->parity = request('parity');
        $newStream->deint = request('deint');



        if($newStream->cabac == null)
            $newStream->cabac="off";
        if($newStream->scenecut == null)
            $newStream->scenecut="off";
        if($newStream->cbr == null)
            $newStream->cbr="off";
        if($newStream->deinterlace == null)
        {
            $newStream->deinterlace="off";
            $newStream->mode=-2;
            $newStream->parity=-2;
            $newStream->deint = -2;
        }

        if($newStream->audio_pid == null)
            $newStream->audio_pid="off";
        if($newStream->video_pid == null)
            $newStream->video_pid="off";
        if($newStream->subtitle_pid == null)
            $newStream->subtitle_pid="off";

       // dd($newStream);




        $newStream->save();

        return redirect('/home');


    }
}
