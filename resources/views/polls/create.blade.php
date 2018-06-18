@extends('layouts.home')
@section('home_content')
    <div class="body-header feather-card">
        <span>Encesta</span>
    </div>
    <div class="body-content feather-card">
        <div class="">

            {{--{{$poll->titles->title}}--}}
            {{--{{$poll->quarters}}--}}
        </div>
        <app-poll-create-template :questions="{{$questions}}" :poll="{{$poll}}" title="{{$poll->titles->title}}"></app-poll-create-template>
    </div>
@endsection