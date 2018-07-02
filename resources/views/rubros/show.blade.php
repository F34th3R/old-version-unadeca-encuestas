@extends('layouts.home')
@section('home_content')
    <div class="body-header feather-card">
        <span>Rubros</span>
    </div>
    <div class="body-content feather-card">
        <div class="body-content-item">
            <div class="body-content-item-title">
                <div class="row">
                    <div class="col s10 left-align">
                        <span>Datos de la materia</span>
                    </div>
                    <div class="right-align">
                        <div class="col s1">
                            @can('rubros.edit')
                                <a href="{{ route('rubros.edit', $item->id) }}" class="btn-flat">
                                    <i class="material-icons">create</i>
                                </a>
                            @endcan
                        </div>
                        <div class="col s1">
                            @can('rubros.destroy')
                                {!! Form::open(['route' => ['rubros.destroy', $item->id], 'method' => 'DELETE']) !!}
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
                <p><strong>Name:</strong> {{ $item->name }}</p>
            </div>
        </div>
        <div class="body-content-item">
            <div class="body-content-item-title">
                <span>Preguntas que pertenecen a los rubros</span>
            </div>
            <div class="body-content-item-body">
                <ul class="collection">
                    @foreach($questions as $question)
                        <li class="collection-item">{{ $question->question }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection