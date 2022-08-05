<?php
namespace App\Http\Controllers;

use App\Models\ZoomMeeting;
use App\Traits\ZoomMeetingTrait;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Http\Controllers\HomeController;

class ZoomMeetingController extends Controller
{
    
    use ZoomMeetingTrait;
    const MEETING_TYPE_INSTANT = 1;
    const MEETING_TYPE_SCHEDULE = 2;
    const MEETING_TYPE_RECURRING = 3;
    const MEETING_TYPE_FIXED_RECURRING_FIXED = 8;

    public function show($id)
    {
        $meeting = $this->get($id);

        return view('meetings.index', compact('meeting'));
    }

     public function generateZoomToken()
    {
        $key = env('ZOOM_API_KEY', '');
        $secret = env('ZOOM_API_SECRET', '');
        $payload = [
            'iss' => $key,
            'exp' => strtotime('+1 minute'),
        ];


        return \Firebase\JWT\JWT::encode($payload, $secret, 'HS256');
    }

    public function store($start,$end,$duration)
    {
        /*$schedule_this_time = $schedule_time;
        $schedule_this_date = str_replace('/', '-', $schedule_date);
        $time = $schedule_time;
        $original_time = substr($time, 0, 1);
        $time = $this->getActualTime($original_time);

        $original_date = date('Y-m-d', strtotime($schedule_this_date));

        $s = $original_date.' '.$time.':00:00';
        
      
        $date_dd = strtotime($s);*/

        $date_dd = strtotime($start);
        
        $date = date('Y-m-d\TH:i:s',$date_dd);

      

        $zoom_meeting_date = $date;

        //echo $zoom_meeting_date;

       //echo $date;
        $request['topic'] = "December-min-meeting";
        $request['start_time'] = $zoom_meeting_date; 
        //$request['end_time']= "2012-11-25T18:00:00Z";//$zoom_meeting_date;
        $request['duration'] = $duration;
        $request['agenda'] = "API-CALLING";
        $request['host_video'] = 1;
        $request['participant_video'] = 1;
        $request['host_email'] = 'harishknaik93@gmail.com';
        $data=$this->create($request);

       //$zoom_data = json_encode($data);

        //var_dump($data);

      return $data;

      /*  var_dump($data['data']['uuid']);
        var_dump($data['data']['id']);
        var_dump($data['data']['join_url']);*/


       //echo $zoom_data->data;

      // var_dump(json_encode($data->uuid));

       // return view('meeting',$data);
    }

    public function update($meeting, Request $request)
    {
        $this->update($meeting->zoom_meeting_id, $request->all());

        return redirect()->route('meetings.index');
    }

    public function destroy(ZoomMeeting $meeting)
    {
        $this->delete($meeting->id);

        return $this->sendSuccess('Meeting deleted successfully.');
    }
}