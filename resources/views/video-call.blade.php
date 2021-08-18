<?php $page="video-call";?>
@extends('layout.mainlayout')
@section('content')
<video-chat :allusers="{{ $users }}" :authUserId="{{ auth()->id() }}" turn_url="{{ env('TURN_SERVER_URL') }}"
        turn_username="{{ env('TURN_SERVER_USERNAME') }}" turn_credential="{{ env('TURN_SERVER_CREDENTIAL') }}" />
         
         


			<!-- /Page Content -->	

			
@endsection