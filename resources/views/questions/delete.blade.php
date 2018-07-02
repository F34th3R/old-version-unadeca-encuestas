@extends('layouts.home')
@section('home_content')
    <div class="body-header feather-card">
        <span>Preguntas</span>
    </div>
    <div class="body-content feather-card">
        <div class="body-content-item">
            <div class="body-content-item-title">
                <div class="row">
                    <div class="col s11 left-align">
                        <span>Eliminar Pregunta</span>
                    </div>
                    <div class="right-align">
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
                <p><strong>Pregunta:</strong> {{ $question->question }}</p>
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