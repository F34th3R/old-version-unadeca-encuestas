@extends('layouts.home')
@section('home_content')
    <div class="body-header feather-card">
        <span>Role</span>
    </div>
    <div class="body-content feather-card">
        <div class="body-content-item">
            <div class="body-content-item-title">
                <span>Create a new Role</span>
            </div>
            <div class="body-content-item-body">
                {!! Form::open(['route' => 'roles.store']) !!}
                    @include('roles.partials.form')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection