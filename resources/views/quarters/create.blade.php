@extends('layouts.home')
@section('home_content')
    <div class="body-header feather-card">
        <span>Cuatrimestre</span>
    </div>
    <div class="body-content feather-card">
        <div class="body-content-item">
            <div class="body-content-item-title">
                <span>Crear un nuevo Cuatrimestre</span>
            </div>
            <div class="body-content-item-body">
                {!! Form::open(['route' => 'quarters.store']) !!}
                    @include('quarters.partials.form')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection