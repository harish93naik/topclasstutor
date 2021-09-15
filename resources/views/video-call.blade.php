<?php $page="video-call";?>
@extends('layout.mainlayout')
@section('content')
  <agora-chat :allusers="{{ $users }}" authuserid="{{ auth()->user()->id }}" authuser="{{ auth()->user()->first_name }}"
        agora_id="{{ env('AGORA_APP_ID') }}" />
         
         


			<!-- /Page Content -->	
			

			
@endsection