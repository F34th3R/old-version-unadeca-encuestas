@extends('layouts.home')
@section('home_content')
    <div class="body-header feather-card">
        <span>Faculties</span>
    </div>
    <div class="body-content feather-card">
        <div class="body-content-item">
            <div class="body-content-item-title">
                <span>Edit</span>
            </div>
            <div class="body-content-item-body">
                {!! Form::model($role, ['route' => ['roles.update', $role->id], 'method' => 'PUT']) !!}
                    @include('roles.partials.form')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection