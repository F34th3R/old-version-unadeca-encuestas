@extends('layouts.home')
@section('home_content')
    <div class="body-header feather-card">
        <span>Cuatrimestre</span>
    </div>
    <div class="body-content feather-card">
        <div class="body-content-item">
            <div class="body-content-item-title">
                <span>Datos del Cuatrimestre</span>
                @can('quarters.edit')
                    <div class="right-align">
                        <a href="{{ route('quarters.edit', $quarter->id) }}" class="btn-flat">
                            <i class="material-icons">create</i>
                        </a>
                    </div>
                @endcan
            </div>
            <div class="body-content-item-body">
                <p><strong>Name:</strong> {{ $quarter->name }}</p>
                <p><strong>Fecha de inicio:</strong> {{ $quarter->name }}</p>
                <p><strong>Fecha final:</strong> {{ $quarter->name }}</p>
            </div>
        </div>
    </div>
@endsection