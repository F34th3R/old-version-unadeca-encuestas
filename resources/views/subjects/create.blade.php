@extends('layouts.home')
@section('home_content')
    <div class="body-header feather-card">
        <span>Facultad</span>
    </div>
    <div class="body-content feather-card">
        <div class="body-content-item">
            <div class="body-content-item-title">
                <span>Create a new faculty</span>
            </div>
            <div class="body-content-item-body">
                @include('errors.message')
                {!! Form::open(['route' => 'subjects.store']) !!}
                    @include('subjects.partials.form')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection