@extends('layouts.home')
@section('home_content')
    <div class="body-header feather-card">
        <span>Preguntas</span>
    </div>
    <div class="body-content feather-card">
        <div class="body-content-item">
            <div class="body-content-item-title">
                <span>Editar</span>
            </div>
            <div class="body-content-item-body">
                {!! Form::model($question, ['route' => ['questions.update', $question->id], 'method' => 'PUT']) !!}
                    @include('questions.partials.form')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection