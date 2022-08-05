<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Classes\AgoraDynamicKey\RtcTokenBuilder;
use App\Events\MakeAgoraCall;
use App\Models\Mentor;
use App\Models\Mentee;
use App\Models\Booking;

class AgoraVideoController extends Controller
{
    public function callMentor(Request $request,Mentor $mentor,Booking $booking,User $user)
    {
        // fetch all users apart from the authenticated user
        $users=[];
        $currentTime = date('H');

        

       //$startTime = date('H',$booking->schedule_time);

       /* $currentDate = date('d/m/Y');
        $startDate = $booking->schedule_date;*///date('d/m/Y', strtotime($booking->schedule_date));
        if($user->id==auth()->user()->id){
        $is_call = Booking::IsCall($booking->schedule_date,$booking->schedule_time);
        if($is_call){
        $user = Mentor::where('mentor_id',$mentor->mentor_id)->first();
        $users = User::where('id',$user->user_id)->get();

        return view('video-call', ['users' => $users,'is_call'=>$is_call,'current_time'=>$currentTime]);
    }
    else{
       return view('video-call', ['users' => $users,'is_call'=>$is_call,'current_time'=>$currentTime]);
    }

    }

    }

    public function callMentee(Request $request,Mentee $mentee,Booking $booking,User $user)
    {
        // fetch all users apart from the authenticated user
        $users=[];
        $currentTime = date('H');

        

       //$startTime = date('H',$booking->schedule_time);

       /* $currentDate = date('d/m/Y');
        $startDate = $booking->schedule_date;*///date('d/m/Y', strtotime($booking->schedule_date));
        if($user->id==auth()->user()->id){
        $is_call = Booking::IsCall($booking->schedule_date,$booking->schedule_time);
        if($is_call){
        $user = Mentee::where('mentee_id',$mentee->mentee_id)->first();
        $users = User::where('id',$user->user_id)->get();

        return view('video-call', ['users' => $users,'is_call'=>$is_call,'current_time'=>$currentTime]);
    }
    else{
       return view('video-call', ['users' => $users,'is_call'=>$is_call,'current_time'=>$currentTime]);
    }

    }

    }

    protected function token(Request $request)
    {

        $appID = env('AGORA_APP_ID');
        $appCertificate = env('AGORA_APP_CERTIFICATE');
        $channelName = $request->channelName;
        $user = Auth::user()->name;
        $role = RtcTokenBuilder::RoleAttendee;
        $expireTimeInSeconds = 3600;
        $currentTimestamp = now()->getTimestamp();
        $privilegeExpiredTs = $currentTimestamp + $expireTimeInSeconds;

        $token = RtcTokenBuilder::buildTokenWithUserAccount($appID, $appCertificate, $channelName, $user, $role, $privilegeExpiredTs);

        return $token;
    }

    public function callUser(Request $request)
    {

        $data['userToCall'] = $request->user_to_call;
        $data['channelName'] = $request->channel_name;
        $data['from'] = Auth::id();

        broadcast(new MakeAgoraCall($data))->toOthers();
    }
}
