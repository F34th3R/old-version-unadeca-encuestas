@extends('layouts.home')
@section('home_content')
    <div class="body-header feather-card">
        <span>Users: {{ $user->code }}</span>
    </div>
    <div class="body-content feather-card">
        <div class="body-content-item">
            <div class="body-content-item-title">
                <span>Edit {{ $user->code }}</span>
            </div>
            <div class="body-content-item-body">
                {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'PUT']) !!}
                    @include('users.partials.form')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection