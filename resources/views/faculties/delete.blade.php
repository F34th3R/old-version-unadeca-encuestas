@extends('layouts.home')
@section('home_content')
    <div class="body-header feather-card">
        <span>Facultad</span>
    </div>
    <div class="body-content feather-card">
        <div class="body-content-item">
            <div class="body-content-item-title">
                <div class="row">
                    <div class="col s11 left-align">
                        <span>Eliminar Facultad</span>
                    </div>
                    <div class="right-align">
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
                <p><strong>Name:</strong> {{ $faculty->name }}</p>
            </div>
        </div>
        <div class="body-content-item">
            <div class="body-content-item-title">
                <span>Profesores</span>
            </div>
            <div class="body-content-item-body">
                <ul class="collection">
                    @foreach($professors as $professor)
                        <li class="collection-item">{{$professor->name}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="body-content-item">
            <div class="body-content-item-title">
                <span>Subjects</span>
            </div>
            <div class="body-content-item-body">
                <ul class="collection">
                    @foreach($subjects as $subject)
                        <li class="collection-item">{{$subject->name}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection