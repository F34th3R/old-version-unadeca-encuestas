@extends('layouts.home')
@section('home_content')
    <div class="body-header feather-card">
        <span>Cuatrimestre</span>
    </div>
    <div class="body-content feather-card">
        <div class="body-content-item">
            <div class="row">
                <div class="col s10 left-align">
                    <span>Datos de la materia</span>
                </div>
                <div class="right-align">
                    <div class="col s1">
                        @can('quarters.edit')
                            <a href="{{ route('quarters.edit', $quarter->id) }}" class="btn-flat">
                                <i class="material-icons">create</i>
                            </a>
                        @endcan
                    </div>
                    <div class="col s1">
                        @can('quarters.destroy')
                            {!! Form::open(['route' => ['quarters.destroy', $quarter->id], 'method' => 'DELETE']) !!}
                            <button class="waves-effect waves-light btn btn-flat">
                                <i class="material-icons">delete</i>
                            </button>
                            {!! Form::close() !!}
                        @endcan
                    </div>
                </div>
                @include('errors.message')
            </div>
            <div class="body-content-item-body">
                <p><strong>Name:</strong> {{ $quarter->name }}</p>
                <p><strong>Fecha de inicio:</strong> {{ $quarter->init_date }}</p>
                <p><strong>Fecha final:</strong> {{ $quarter->end_date }}</p>
            </div>
        </div>
    </div>
@endsection