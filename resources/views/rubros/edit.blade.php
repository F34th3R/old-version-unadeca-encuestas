@extends('layouts.home')
@section('home_content')
    <div class="body-header feather-card">
        <span>Rubros</span>
    </div>
    <div class="body-content feather-card">
        <div class="body-content-item">
            <div class="body-content-item-title">
                <span>Editar</span>
            </div>
            <div class="body-content-item-body">
                {!! Form::model($item, ['route' => ['rubros.update', $item->id], 'method' => 'PUT']) !!}
                    @include('rubros.partials.form')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection