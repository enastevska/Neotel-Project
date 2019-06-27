<?php

namespace App\Http\Controllers;

use App\Protocol;
use App\Stream1;
use Illuminate\Http\Request;
use App\Channel;
use Psy\Util\Str;

class ProtocolController extends Controller
{
    public function  destinationOptions()
    {
        $channels = Channel::all();
        $streams = Stream1::with('channels')->get();
        return view('destinationOptions', compact('channels'))->with('streams');
    }
    public function storeProtocol(int $id)
    {

        $stream1 = Stream1::find($id);
        $newProtocol= new Protocol();
        $newProtocol->stream_id=$stream1->id;
        $newProtocol->name_protocol =request('protcols');
        if($newProtocol->name_protocol == "udp")
            $ipadress=request('13').".".request('1').".".request('2').".".request('3');
        if($newProtocol->name_protocol == "rtsp")
            $ipadress=request('14').".".request('5').".".request('6').".".request('7');
        if($newProtocol->name_protocol == "rtmp")
            $ipadress=request('8').".".request('9').".".request('10').".".request('11');
        $newProtocol->ip_address=$ipadress;

        if($newProtocol->name_protocol == "udp")
            $newProtocol->port=request('port_udp');
        else
            $newProtocol->port = request('port');
        $newProtocol->publishing_point=request('publishingpoint');
        //dd($newProtocol);
        if($newProtocol->publishing_point == null)
            $newProtocol->publishing_point=" ";
        $newProtocol->save();
        return redirect('/home');
    }


}
