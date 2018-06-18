@extends('layouts.home')
@section('home_content')
    <div class="body-header feather-card">
        <span>Rubros</span>
    </div>
    <div class="body-content feather-card">
        <div class="body-content-item">
            <div class="body-content-item-title">
                <span>Crear un nuevo Rubro</span>
            </div>
            <div class="body-content-item-body">
                {!! Form::open(['route' => 'rubros.store']) !!}
                    @include('rubros.partials.form')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection