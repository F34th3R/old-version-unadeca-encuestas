@extends('layouts.home')
@section('home_content')
    <div class="body-header feather-card">
        <span>Materia</span>
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
                            @can('subjects.edit')
                                <a href="{{ route('subjects.edit', $subject->id) }}" class="btn-flat">
                                    <i class="material-icons">create</i>
                                </a>
                            @endcan
                        </div>
                        <div class="col s1">
                            @can('subjects.destroy')
                                {!! Form::open(['route' => ['subjects.destroy', $subject->id], 'method' => 'DELETE']) !!}
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
                <p><strong>Nombre:</strong> {{ $subject->name }}</p>
            </div>
        </div>
        <div class="body-content-item">
            <div class="body-content-item-title">
                <span>Profesores registrados en la materia</span>
            </div>
            <div class="body-content-item-body">
                <ul class="collection">
                    @foreach($professors as $professor)
                        <li class="collection-item">{{ $professor->name }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="body-content-item">
            <div class="body-content-item-title">
                <span>Estudiantes registrados en la materia</span>
            </div>
            <div class="body-content-item-body">
                <ul class="collection">
                    @foreach($students as $student)
                        <li class="collection-item">{{ $student->name }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection