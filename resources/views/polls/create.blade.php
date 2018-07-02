@extends('layouts.home')
@section('home_content')
    <div class="body-header feather-card">
        <span>Encuesta</span>
    </div>
    <div class="body-content feather-card">
        <app-create-poll-template :questions="{{$questions}}" :poll="{{$poll}}" title="{{$poll->titles->title}}" :title_id="{{$poll->titles->id}}"></app-create-poll-template>
    </div>
@endsection