@extends('layouts.home')
@section('home_content')
    <div class="body-header feather-card">
        <span>Preguntas</span>
    </div>
    <div class="body-content feather-card">
        <div class="body-content-item">
            <div class="body-content-item-title">
                <span>Crear una nueva pregunta</span>
            </div>
            <div class="body-content-item-body">
                @include('errors.message')
                {!! Form::open(['route' => 'questions.store']) !!}
                    @include('questions.partials.form')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection