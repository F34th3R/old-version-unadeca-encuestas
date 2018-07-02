@extends('layouts.home')
@section('home_content')
    <div class="body-header feather-card">
        <span>Facultades</span>
    </div>
    <div class="body-content feather-card">
        <div class="body-content-item">
            <div class="body-content-item-title">
                <div class="row">
                    <div class="col s10 left-align">
                        <span>Datos de la facultad</span>
                    </div>
                    <div class="right-align">
                        <div class="col s1">
                            @can('faculties.edit')
                                <a href="{{ route('faculties.edit', $faculty->id) }}" class="btn-flat">
                                    <i class="material-icons">create</i>
                                </a>
                            @endcan
                        </div>
                        <div class="col s1">
                            @can('faculties.destroy')
                                {!! Form::open(['route' => ['faculties.destroy', $faculty->id], 'method' => 'DELETE']) !!}
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
                <p><strong>Nombre:</strong> {{ $faculty->name }}</p>
            </div>
        </div>
        <div class="body-content-item">
            <div class="body-content-item-title">
                <span>Profesores</span>
            </div>
            <div class="body-content-item-body">
                <ul class="collection">
                    @foreach($professors as $professor)
                        <li class="collection-item">{{$professor->code}} / {{$professor->name}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="body-content-item">
            <div class="body-content-item-title">
                <span>Materias de la facultad</span>
            </div>
            <div class="body-content-item-body">
                <ul class="collection">
                    @foreach($subjects as $subject)
                        <li class="collection-item">{{$subject->name}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="body-content-item">
            <div class="body-content-item-title">
                <span>Estudiantes suscritos en la facultad</span>
            </div>
            <div class="body-content-item-body">
                <ul class="collection">
                    @foreach($students as $student)
                        <li class="collection-item">{{$student->name}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection