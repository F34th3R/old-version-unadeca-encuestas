@extends('layouts.home')
@section('home_content')
    <div class="body-header feather-card">
        <span>Preguntas</span>
    </div>
    <div class="body-content feather-card">
        <div class="body-content-item">
            <div class="body-content-item-title">
                <div class="row">
                    <div class="col s10 left-align">
                        <span>Datos de la pregunta</span>
                    </div>
                    <div class="right-align">
                        <div class="col s1">
                            @can('questions.edit')
                                <a href="{{ route('questions.edit', $question->id) }}" class="btn-flat">
                                    <i class="material-icons">create</i>
                                </a>
                            @endcan
                        </div>
                        <div class="col s1">
                            @can('questions.destroy')
                                {!! Form::open(['route' => ['questions.destroy', $question->id], 'method' => 'DELETE']) !!}
                                    <button class="waves-effect waves-light btn btn-flat">
                                        <i class="material-icons">delete</i>
                                    </button>
                                {!! Form::close() !!}
                            @endcan
                        </div>
                    </div>
                </div>
                @include('errors.message')
            </div>
            <div class="body-content-item-body">
                <p><strong>Nombre:</strong> {{ $question->name }}</p>
            </div>
        </div>
        <div class="body-content-item">
            <div class="body-content-item-title">
                <span>Pertenece al Rubro</span>
            </div>
            <div class="body-content-item-body">
                <ul class="collection">
                    @foreach($items as $item)
                        <li class="collection-item">{{ $item->name }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection