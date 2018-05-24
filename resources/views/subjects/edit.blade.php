@extends('layouts.home')
@section('home_content')
    <div class="body-header feather-card">
        <span>Subjects</span>
    </div>
    <div class="body-content feather-card">
        <div class="body-content-item">
            <div class="body-content-item-title">
                <span>Edit</span>
            </div>
            <div class="body-content-item-body">
                {!! Form::model($matter, ['route' => ['subjects', $matter->id], 'method' => 'PUT']) !!}
                    @include('subjects.partials.form')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection